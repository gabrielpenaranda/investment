<?php

namespace App\Http\Controllers\system\portal;

use App\Http\Controllers\Controller;
use App\Models\system\AccountStatement;
use App\Models\system\Investment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AccountStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Investment $investment)
    {
        return view('system.portal.account_statements.index', compact('investment'));
    }

    public function print(Investment $investment)
    {
        $account_statements = AccountStatement::where('investment_id', $investment->id)->get();
        $data = [
            'investment' => $investment,
            'account_statements' => $account_statements,
        ];

        $pdf = Pdf::loadView('system.portal.account_statements.print2', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('account-statement.pdf');
       /*  return view('system.admin.account-statements.print', $data); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountStatement $accountStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountStatement $accountStatement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountStatement $accountStatement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountStatement $accountStatement)
    {
        //
    }
}
