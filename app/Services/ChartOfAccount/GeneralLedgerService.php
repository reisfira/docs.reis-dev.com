<?php

namespace App\Services\ChartOfAccount;

use App\Models\ChartOfAccount\GeneralLedger;

class GeneralLedgerService
{
    public static function getSelect2Resource($request)
    {
        $resource = GeneralLedger::get()->pluck('full_code', 'full_code');

        return $resource;
    }
}