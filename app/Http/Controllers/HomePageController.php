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
        $xlsx_file =  $request->file('file')->getClientOriginalName();
        $ext = pathinfo($xlsx_file, PATHINFO_EXTENSION);
       dd( $ext);
        if (!empty($xlsx_file) && $ext == 'xlsx' ){
            Excel::import(new AccountingsImport, $request->file('file'));
            $request->file('file')->store('temp');
            echo 'success';
        }
        else echo 'error';

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
