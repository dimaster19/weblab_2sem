<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CabinetPageController extends Controller
{
    public function __invoke(Request $request) {
        if (Auth::check()) {
            return view('cabinet');

        }
        else return view('signin');
    }


    public function getName(Request $request) {

            $name = auth()->user()->name;
            return $name;
    }

}
