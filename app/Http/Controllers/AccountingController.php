<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AccountingsImport;

class AccountingController extends Controller
{
    public function fileImport(Request $request)
    {
        Excel::import(new AccountingsImport, $request->file('file')->store('temp'));
        return view("home");
    }
}
