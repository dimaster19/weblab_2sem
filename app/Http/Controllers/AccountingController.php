<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AccountingsImport;
use App\Models\Accounting;
use Illuminate\Support\Facades\Log;

class AccountingController extends Controller
{
    public function fileImport(Request $request)
    {
        Excel::import(new AccountingsImport, $request->file('file')->store('temp'));
        return view("home");
    }


    public function add(Request $request)
    {
        Log::debug($request);

        Accounting::create([
            'Course' => $request->course,
            'Group' => $request->group,
            'Subject' => $request->subject,

    ]);

    return 'added';
    }

}
