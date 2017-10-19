<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Role;
use App\User;
use Auth;
use File;
use Image;
use Illuminate\Http\Request;
use Session;

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

            $userName = implode('_', explode(' ', $user->username));

            $directoryName = 'uploads/users/avatars/'. $userName. '/';
            $fileName = $userName. '_'. $user->id. '_avatar.'. $avatar->getClientOriginalExtension();

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

    public function destroy(User $user){

        Session::flush();
        Auth::logout();

        $user->delete();

        flashy()->success('You have completely removed an account with all data');
        return redirect()->to(route('main-page'));
    }

    public function createdContracts(User $user){

        $contracts = Contract::where('user_id', $user->id)
            ->where('status', 'created')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

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

    // Search footballers - search, filters and sort

    public function listAndSearch(Request $request){

        $footballers = User::where('role_id', Role::Footballer)->paginate(5);

        if ($request->sortBy === 'username'){

            if ($request->direction === 'desc'){
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('username', 'desc')->paginate(5);
            }
            else{
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('username', 'asc')->paginate(5);
            }
        }
        if ($request->sortBy === 'main_football_position'){

            if ($request->direction === 'desc'){
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('main_football_position', 'desc')->paginate(5);
            }
            else{
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('main_football_position', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'country'){

            if($request->direction === 'desc'){
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('country', 'desc')->paginate(5);
            }
            else{
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('country', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'city'){

            if($request->direction === 'desc'){
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('city', 'desc')->paginate(5);
            }
            else{
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('city', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'trophies'){

            if($request->direction === 'desc'){
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('won_trophies', 'desc')->paginate(5);
            }
            else{
                $footballers = User::where('role_id', Role::Footballer)
                    ->orderBy('won_trophies', 'asc')->paginate(5);
            }
        }

        if (request()->ajax()){

            $firstView = view('layouts.elements.users.footballers.search.search')->render();
            $secondView = view('dynamic-content.users.footballers.list', compact('footballers'))->render();

            return response()->json([
                'search' => $firstView,
                'list' => $secondView
            ]);
        }
        else{
            return view('users.footballers.list', compact('footballers'));
        }
    }

    public function search(Request $request)
    {

        if (request()->ajax()) {

            $footballers = User::where('role_id', Role::Footballer)
                ->where('username', 'like', $request->footballerUsernameValue . '%')
                ->where('country', 'like', $request->footballerCountryValue . '%')
                ->where('city', 'like', $request->footballerCityValue . '%')
                ->paginate(3);

            $view = view('dynamic-content.users.footballers.searchable-cards', compact('footballers'))->render();
            return response()->json($view);

        }
    }

    private function computeRemainingContractDuration($dateOfEnd){

        $currentDate = date_create(date('Y-m-d'));
        $endDate = date_create($dateOfEnd);
        $remainingContractDuration = $endDate->diff($currentDate)->format('%a');

        return $remainingContractDuration;
    }
}
