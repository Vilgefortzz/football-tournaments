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
        $remainingContractDuration = $this->computeRemainingContractDuration($contract->date_and_time_of_end);

        if (request()->ajax()){

            $view = view('dynamic-content.contracts.binding-contract',
                compact('contract', 'remainingContractDuration'))->render();
            return response()->json($view);
        }
        else{
            return view('contracts.binding-contract', compact('contract', 'remainingContractDuration'));
        }
    }

    public function rejectedContracts(User $user){

        $contracts = $user->contracts->where('status', 'rejected');
        return view('users.contracts', compact('contracts'));
    }

    private function computeRemainingContractDuration($dateOfEnd){

        $currentDate = date_create(date('Y-m-d'));
        $endDate = date_create($dateOfEnd);
        $remainingContractDuration = $endDate->diff($currentDate)->format('%a');

        return $remainingContractDuration;
    }

    private function computeEndContractDate($dateOfSigning, string $duration){

        $contractDuration = '';

        switch ($duration){
            case '1 week':
                $contractDuration = '7 days';
                break;
            case '2 weeks':
                $contractDuration = '14 days';
                break;
            case '1 month':
                $contractDuration = '31 days';
                break;
            case '2 months':
                $contractDuration = '62 days';
                break;
        }

        $dateOfEnd = date_create(date('Y-m-d', strtotime($dateOfSigning. ' + '. $contractDuration)));

        return $dateOfEnd;
    }
}
