<?php

namespace App\Http\Controllers;

use App\User;
use File;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile(User $user){

        if (request()->ajax()){

            $view = view('dynamic-content.users.profile', compact('user'))->render();
            return response()->json($view);
        }
        else{
            return view('users.profile', compact('user'));
        }
    }

    public function update(User $user, Request $request){

        if ($request->hasFile('avatar')){

            $avatar = $request->file('avatar');

            $directoryName = 'uploads/users/avatars/'. $user->username. '/';
            $fileName = $user->username. '_'. $user->id. '_avatar.'. $avatar->getClientOriginalExtension();

            if(!File::exists(public_path($directoryName))) {
                File::makeDirectory(public_path($directoryName));
            }
            else{
                File::deleteDirectory(public_path($directoryName), true);
            }

            Image::make($avatar)->resize(150, 150)->save(public_path($directoryName. $fileName));

            $user->avatar_dir = $directoryName;
            $user->avatar = $fileName;
            $user->save();
            flashy()->success('Your profile image was successfully updated');
            return redirect()->back();
        }

        if ($request->has('password')){

            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = bcrypt($request->password);
            $user->save();
            flashy()->success('Your password was changed');
            return redirect()->back();
        }

        flashy()->error('Nothing has changed');
        return redirect()->back();
    }

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
