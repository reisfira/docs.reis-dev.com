<?php

namespace App\Actions\Setting;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use DB, Artisan;

class PermissionAction
{
    public function permissions()
    {
        $actions = [ 'Create', 'Update', 'Read', 'Delete', 'Print' ];
        $modules_by_group = [
            'File Maintenance' => [
                'Cost Centre',
                'Debtor',
                'Area',
                'Salesman',
            ],
            'Setting' => [
                'User',
                'User Group',
            ],
        ];

        $permissions_by_module = [];
        $permissions_slugs = [];
        $permissions_insert_array = [];
        foreach ($modules_by_group as $group => $modules) {
            // > group: File Maintenance
            $permissions_by_module[$group] = [];

            foreach ($modules as $module) {
                // > module: Debtor
                $permissions_by_module[$group][$module] = [];

                foreach ($actions as $action) {
                    // > group: Create
                    $permission_name = "{$action} {$module}";
                    $permissions_by_module[$group][$module][] = $permission_name;
                    $permissions_slugs[$permission_name] = strtolower(str_replace(' ', '-', $permission_name));

                    $permissions_insert_array[] = [
                        'name' => $permission_name,
                        'guard_name' => 'web',
                    ];
                }
            }
        }

        $data = [];
        $data['actions'] = $actions;
        $data['modules'] = $modules;
        $data['permissions_slugs'] = $permissions_slugs;
        $data['permissions_by_module'] = $permissions_by_module;
        $data['permissions_insert_array'] = $permissions_insert_array;

        return $data;
    }

    public static function regenerate()
    {
        $permissions = self::permissions();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insertOrIgnore($permissions['permissions_insert_array']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Artisan::call('optimize:clear');

        return Permission::all();
    }
}