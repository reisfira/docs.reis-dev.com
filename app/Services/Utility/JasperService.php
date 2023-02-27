<?php

namespace App\Services\Utility;

use File, PHPJasper\PHPJasper;

class JasperService
{
    /**
     * @param module            determines the name of the json file generated
     * @param resources         after query, from the database, just pluck in this value into a file
     * @param download :bool    if true, will return file download response, otherwise just return path to generated file
     *
     * @return file-download|file-path
     * */
    public static function json($module, $resources, $download = false)
    {
        $file_name = !env('DEBUG_JASPER', false) ? strtolower(time()."_{$module}") : strtolower($module);
        $datasource_location = public_path('jasper/datasource/');
        $datasource_json = "{$datasource_location}{$file_name}.json";

        if (!file_exists(public_path('jasper/datasource/'))) {
            mkdir(public_path('jasper/datasource/'));
        }

        // actually fill in the json file
        $file = fopen($datasource_json, 'w');
        fwrite($file, json_encode(['data' => $resources]));
        fclose($file);

        return $download ? response()->download($datasource_json) : $datasource_json;
    }

    /**
     *
     * */
    public static function generate($extension, $datasource, $jrxml, $output_filename, $params = [], $put_in_storage = false)
    {
        $jasper = new PHPJasper();
        $options = [
            'format' => [ $extension ],
            'locale' => 'en',
            'params' => $params,
            'db_connection' => [
                'driver' => 'json',
                'data_file' => $datasource,
                'json_query' => 'data',
            ]
        ];

        // preparing the output location in case its not yet initialized
        // ! important to do php artisan storage:link
        $output_location = public_path('storage/reports/');
        if (!file_exists($output_location))
            mkdir($output_location);

        $output = "{$output_location}/{$output_filename}";

        !env('DEBUG_JASPER', false) ?
            $jasper->process($jrxml, $output, $options)->execute() :
            dd($jasper->process($jrxml, $output, $options)->output()) ;

        if ($extension == 'pdf') {
            if ($put_in_storage) {
                return asset("storage/reports/{$output_filename}.{$extension}");
            } else {
                header("Content-Description: application/pdf");
                header("Content-Type: application/pdf");
                header("Content-Disposition:; filename={$output_filename}.pdf");
                readfile("{$output}.{$extension}");

                // deal with the datasource and generated file
                if (!env('DEBUG_JASPER', false)) {
                    unlink("{$output}.{$extension}");
                    unlink($datasource);
                }

                // for some reason some servers require flush() and exit otherwise it will cause some encoding error
                flush();
                exit;
            }
        }

        return response()->download("{$output}.{$extension}");
    }
}