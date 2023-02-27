<?php

namespace App\Services\Utility;

use App\Models\Transaction\Transaction;
use App\Models\FileMaintenance\CostCentre;
use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\MySQLView\Mastercode;

/**
 * all of the functions within this class only return boolean (true/false)
 * - the purpose of this class is to find out whether or not a selected resource is allowed to be deleted
 *   (depending on the present/absence of transactions for the given resource)
 * */
class DeletableService
{
    /**
     * if this cost centre is used in any general ledgers / dbcr ledgers,
     * and the said ledgers contain transactions,
     *
     * ! don't allow to delete
     *
     * > The way to read the function is:
     *   * DeletableService::costCentre('01', true) : if the cost centre '01' has transactions
     *   * DeletableService::costCentre('02', false) : if the cost centre '01' is deletable
     *
     * @ both the scenarios above returns a boolean value
     * */
    public static function costCentre($cost_centre_code, $has_transaction = true)
    {
        $resource = CostCentre::findByCode($cost_centre_code);
        $account_codes = Mastercode::where('ccentre_code', $cost_centre_code)->pluck('full_code')->toArray();
        $transactions_count = Transaction::whereIn('account_code', $account_codes)->count();

        return $has_transaction ? $transactions_count > 0 : $transactions_count <= 0;
    }

    /**
     * if this chart of account is used in any general ledgers,
     * and the said ledgers contain transactions,
     *
     * ! don't allow to delete
     * */
    public static function chartOfAccount($code, $has_transaction = true)
    {
        $resource = ChartOfAccount::where('code', $code)->first();
        $account_codes = GeneralLedger::where('chart_of_account_code', $code)->pluck('full_code')->toArray();
        $transactions_count = Transaction::whereIn('account_code', $account_codes)->count();

        return $has_transaction ? $transactions_count > 0 : $transactions_count <= 0;
    }

    /**
     * if this chart of account is used in any general ledgers,
     * and the said ledgers contain transactions,
     *
     * ! don't allow to delete
     * */
    public static function chartOfAccountSub($code, $has_transaction = true)
    {
        $account_codes = GeneralLedger::where('chart_of_account_code', $code)->pluck('full_code')->toArray();
        $transactions_count = Transaction::whereIn('account_code', $account_codes)->count();
        $transactions_count = 0;

        return $has_transaction ? $transactions_count > 0 : $transactions_count <= 0;
    }


    /**
     * if this debtor/creditor is used in any transaction
     *
     * ! don't allow to delete
     * */
    public static function ledger($account_code, $has_transaction = true)
    {
        $transactions_count = Transaction::where('account_code', $account_code)->count();

        return $has_transaction ? $transactions_count > 0 : $transactions_count <= 0;
    }
}