<?php

namespace App\Http\Controllers;

use App\Club;
use App\Contract;
use Auth;
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

    public function sign(Contract $contract, Request $request){

        $user = Auth::user();

        if ($request->ajax()){

            if ($request->has('signature')){

                // Check if signature is good
                if ($user->username === $request->signature){

                    $user->club_id = $contract->club_id;
                    $user->save();

                    $club = Club::find($contract->club_id);
                    $club->number_of_footballers++;
                    $club->save();

                    $contract->status = 'signed';
                    $contract->date_and_time_of_signing = date('Y-m-d H:i:s');
                    $contract->date_and_time_of_end =
                        $this->computeEndContractDate($contract->date_and_time_of_signing, $contract->duration);

                    $contract->save();

                    $userWaitingContracts = $user->contracts()->where('status', 'created');
                    $userWaitingContracts->delete();

                    return response()->json([
                        'completed' => true,
                        'message' => 'New contract was signed. Welcome in new club !!'
                    ]);
                }

                return response()->json([
                    'completed' => false,
                    'message' => 'Signature is invalid'
                ]);
            }

            return response()->json([
                'completed' => false,
                'message' => 'Signature is empty'
            ]);
        }
        else{

            if ($request->has('username')){

                // Check if signature is good
                if ($user->username == $request->username){

                    $contract->status = 'signed';

                    $userWaitingContracts = $user->contracts()->where('status', 'created');
                    $userWaitingContracts->delete();

                    flashy()->primary('New contract was signed. Welcome in new club !!');
                    return redirect()->to(route('user-contracts-binding', $user->id));
                }

                flashy()->primary('Signature is invalid');
                return redirect()->back();
            }

            flashy()->primary('Signature is empty');
            return redirect()->back();
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

        $dateOfEnd = date_create(date('Y-m-d H:i:s', strtotime($dateOfSigning. ' + '. $contractDuration)));

        return $dateOfEnd;
    }
}
