<?php

namespace App\Http\Controllers;

use App\Club;
use App\Contract;
use App\RequestToJoinTheClub;
use App\User;
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

        $authUser = Auth::user();

        if ($request->ajax()){

            if ($request->has('signature')){

                // Check if signature is good
                if ($authUser->username === $request->signature){

                    $authUser->club_id = $contract->club_id;
                    $authUser->save();

                    $club = Club::find($contract->club_id);
                    $club->number_of_footballers++;
                    $club->save();

                    $contract->status = 'signed';
                    $contract->date_and_time_of_signing = date('Y-m-d H:i:s');
                    $contract->date_and_time_of_end =
                        $this->computeEndContractDate($contract->date_and_time_of_signing, $contract->duration);

                    $contract->save();

                    // Delete all waiting contracts and requests to join the club if exists
                    $userWaitingContracts = $authUser->contracts()->where('status', 'created');
                    $userWaitingContracts->delete();

                    $userRequestsToJoinTheClub = $authUser->requestsToJoinTheClub();
                    $userRequestsToJoinTheClub->delete();

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
    }

    public function store(User $user, Request $request){

        $authUser = Auth::user();

        if ($request->ajax()){

            if ($request->has('signature')){

                // Check if signature is good
                if ($authUser->username === $request->signature){

                    $contract = new Contract;
                    $contract->duration = $request->duration;

                    $contract->club_id = $authUser->club_id;
                    $contract->user_id = $user->id;
                    $contract->save();

                    // Change status of request to join the club if exists
                    $requestToJoinTheClub = RequestToJoinTheClub::where('club_id', $authUser->club_id)
                        ->where('user_id', $user->id)->first();

                    if ($requestToJoinTheClub){
                        $requestToJoinTheClub->status = 'contract proposed';
                        $requestToJoinTheClub->save();
                    }

                    return response()->json([
                        'message' => 'New contract was created and signed by you. Waiting for footballer to sign it !!'
                    ]);
                }

                return response()->json([
                    'message' => 'Signature is invalid'
                ]);
            }

            return response()->json([
                'message' => 'Signature is empty'
            ]);
        }
    }

    public function destroy(Contract $contract){

        $authUser = Auth::user();

        if (request()->ajax()){

            // Delete request to join the club if exists
            $requestToJoinTheClub = RequestToJoinTheClub::where('club_id', $contract->club_id)
                ->where('user_id', $authUser->id)->first();

            if ($requestToJoinTheClub){
                $requestToJoinTheClub->delete();
            }

            $contract->delete();
            return response()->json('Contract was rejected');
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
