<?php

namespace App\Http\Controllers;

use App\Contract;
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

    public function destroy(Contract $contract){

        if (request()->ajax()){

            $contract->delete();

            return response()->json('Contract was rejected');
        }
        else{

            $contract->delete();

            flashy()->primary('Contract was rejected');
            return redirect()->back();
        }
    }
}
