<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AccountingsImport;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function fileImport(Request $request)
    {


        Excel::import(new AccountingsImport, $request->file('file'));
        $request->file('file')->store('temp');
        return back()->with('success', 'Excel Data Imported successfully.');
    }


    public function load(Request $request)
    {

        return view('home');


    }

    public function load2(Request $request)
    {

        return view('welcome');


    }
}
