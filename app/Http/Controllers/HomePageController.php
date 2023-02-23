<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AccountingsImport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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
             Log::debug($request);



             Excel::import(new AccountingsImport, $request->file('file')->store('temp'));
             Log::debug('error?');

             return redirect()->back();




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
