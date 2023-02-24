<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabinetPageController extends Controller
{
    public function __invoke(Request $request) {
        return view('cabinet');
    }


    public function getName(Request $request) {

            $name = auth()->user()->name;
            return $name;
    }

}
