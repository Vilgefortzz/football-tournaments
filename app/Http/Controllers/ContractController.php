<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function menu(){

        if (request()->ajax()){

            $view = view('dynamic-content.contracts.menu')->render();
            return response()->json($view);
        }
        else{
            return view('contracts.menu');
        }
    }

    public function managementMenu(){

        if (request()->ajax()){

            $view = view('dynamic-content.contracts.management-menu')->render();
            return response()->json($view);
        }
        else{
            return view('contracts.management-menu');
        }
    }
}
