<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createdContracts(User $user){

        $contracts = $user->contracts->where('status', 'created');

        if (request()->ajax()){

            $view = view('dynamic-content.users.contracts', compact('contracts'))->render();
            return response()->json($view);
        }
        else{
            return view('users.contracts', compact('contracts'));
        }
    }

    public function bindingContract(User $user){

        $contract = $user->contracts->where('status', 'signed')->first();

        if (request()->ajax()){

            $view = view('dynamic-content.contracts.binding-contract', compact('contract'))->render();
            return response()->json($view);
        }
        else{
            return view('contracts.binding-contract', compact('contract'));
        }
    }

    public function rejectedContracts(User $user){

        $contracts = $user->contracts->where('status', 'rejected');
        return view('users.contracts', compact('contracts'));
    }
}
