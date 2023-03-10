<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use Illuminate\Http\Request;

class ViewPageController extends Controller
{


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // $accountings = Accounting::paginate(10);
        // $accountings->withPath('/view-data');


        // return view('viewdata', compact('accountings'));

        $accountings = Accounting::paginate(10);
        return view('viewdata', compact('accountings'));

    }

    public function getData(Request $request)
    {

        $accountings = Accounting::paginate(10);
        return $accountings;

    }
}
