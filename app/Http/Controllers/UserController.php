<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createdContracts(User $user){

        $contracts = $user->contracts->where('status', 'created');
        return view('users.contracts', compact('contracts'));
    }

    public function signedContracts(User $user){

        $contracts = $user->contracts->where('status', 'signed');
        return view('users.contracts', compact('contracts'));
    }

    public function rejectedContracts(User $user){

        $contracts = $user->contracts->where('status', 'rejected');
        return view('users.contracts', compact('contracts'));
    }
}
