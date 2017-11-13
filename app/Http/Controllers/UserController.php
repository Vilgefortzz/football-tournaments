<?php

namespace App\Http\Controllers;

use App\Contract;
use App\FootballPosition;
use App\Role;
use App\Tournament;
use App\User;
use Auth;
use File;
use Image;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{

    public function profile(User $user){

        $footballPositions = FootballPosition::all();
        $userFootballPositions = $user->footballPositions;
        $mainFootballPositionId = null;

        if ($user->haveMainFootballPosition()){
            $mainFootballPositionId = FootballPosition::where('name', $user->main_football_position)->first()->id;
        }

        if (request()->ajax()){

            $view = view('dynamic-content.users.profile',
                compact('user', 'userFootballPositions', 'footballPositions', 'mainFootballPositionId'))->render();
            return response()->json($view);
        }
        else{
            return view('users.profile',
                compact('user', 'userFootballPositions', 'footballPositions', 'mainFootballPositionId'));
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
        }

        if ($request->has('password')){

            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = bcrypt($request->password);
            $user->save();
        }

        if ($request->has('main_football_position')){

            if ($user->main_football_position !== $request->main_football_position){

                $user->main_football_position = $request->main_football_position;
                $user->save();
            }
        }

        flashy()->success('Your profile was updated');
        return redirect()->back();
    }

    public function destroy(User $user){

        Session::flush();
        Auth::logout();

        if ($user->isClubPresident()){
            $user->club->delete();
        }

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

            $view = view('dynamic-content.users.waiting-contracts', compact('contracts'))->render();
            return response()->json($view);
        }
        else{
            return view('users.waiting-contracts', compact('contracts'));
        }
    }

    public function bindingContract(User $user){

        $contract = $user->contracts->where('status', 'signed')->first();
        if (!$contract){
            $contract = $user->contracts->where('status', 'extension proposed')->first();
        }

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

    public function openTournaments(User $user){

        $tournaments = $user->tournaments()
            ->where('status', 'open')
            ->orderBy('end_date', 'asc')
            ->paginate(3);

        if (request()->ajax()){

            $view = view('dynamic-content.users.organizers.open-tournaments',
                compact('tournaments'))->render();
            return response()->json($view);
        }
        else{
            return view('users.organizers.open-tournaments', compact('tournaments'));
        }
    }

    public function closedTournaments(User $user){

        $tournaments = $user->tournaments()
            ->where('status', 'closed')
            ->orderBy('end_date', 'asc')
            ->paginate(3);

        if (request()->ajax()){

            $view = view('dynamic-content.users.organizers.closed-tournaments',
                compact('tournaments'))->render();
            return response()->json($view);
        }
        else{
            return view('users.organizers.closed-tournaments', compact('tournaments'));
        }
    }

    public function addFootballPosition(User $user, Request $request){

        if (request()->ajax()){

            if ($request->footballerFootballPositionValue !== '0'){

                if (!$user->footballPositions->contains($request->footballerFootballPositionValue)){

                    $user->footballPositions()->attach($request->footballerFootballPositionValue);
                    $footballPosition = FootballPosition::find($request->footballerFootballPositionValue);

                    $userFootballPosition = view('layouts.elements.users.footballers.football-positions.football-position',
                        compact('footballPosition'))->render();
                    $userMainFootballPosition = view('layouts.elements.users.footballers.football-positions.main-football-position',
                        compact('footballPosition'))->render();

                    return response()->json([
                        'completed' => true,
                        'userFootballPosition' => $userFootballPosition,
                        'userMainFootballPosition' => $userMainFootballPosition,
                        'message' => 'Football position was added'
                    ]);
                }
                else{
                    return response()->json([
                        'completed' => false,
                        'message' => 'This football position is already on your list'
                    ]);
                }
            }
            else{

                return response()->json([
                    'completed' => false,
                    'message' => 'Cannot add football position. Choose the right one again'
                ]);
            }
        }
    }

    public function deleteFootballPosition(User $user, FootballPosition $footballPosition){

        if (request()->ajax()){

            if ($user->haveMainFootballPosition()){
                $mainFootballPositionId = FootballPosition::where('name', $user->main_football_position)->first()->id;

                if ($mainFootballPositionId === $footballPosition->id){
                    $user->main_football_position = null;
                    $user->save();
                }
            }

            $user->footballPositions()->detach($footballPosition->id);
            return response()->json('Football position was deleted');
        }
    }

    // Search footballers - search, filters and sort

    public function listAndSearch(Request $request){

        $footballers = User::where('role_id', Role::Footballer)->paginate(5);
        $footballPositions = FootballPosition::all();

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

            $firstView = view('layouts.elements.users.footballers.search.search',
                compact('footballPositions'))->render();
            $secondView = view('dynamic-content.users.footballers.list',
                compact('footballers'))->render();

            return response()->json([
                'search' => $firstView,
                'list' => $secondView
            ]);
        }
        else{
            return view('users.footballers.list', compact('footballers', 'footballPositions'));
        }
    }

    public function search(Request $request)
    {

        if (request()->ajax()) {

            if ($request->footballerFootballPositionValue !== '0'){

                $footballPosition = FootballPosition::find($request->footballerFootballPositionValue);

                $footballers = $footballPosition->users()
                    ->where('role_id', Role::Footballer)
                    ->where('username', 'like', $request->footballerUsernameValue . '%')
                    ->where('country', 'like', $request->footballerCountryValue . '%')
                    ->where('city', 'like', $request->footballerCityValue . '%')
                    ->paginate(3);

                $remainingContractDuration = $this->getRemainingContractsDurationForFootballers($footballers);

                $view = view('dynamic-content.users.footballers.searchable-cards',
                    compact('footballers', 'remainingContractDuration'))->render();
                return response()->json($view);
            }

            $footballers = User::where('role_id', Role::Footballer)
                ->where('username', 'like', $request->footballerUsernameValue . '%')
                ->where('country', 'like', $request->footballerCountryValue . '%')
                ->where('city', 'like', $request->footballerCityValue . '%')
                ->paginate(3);

            $remainingContractDuration = $this->getRemainingContractsDurationForFootballers($footballers);

            $view = view('dynamic-content.users.footballers.searchable-cards',
                compact('footballers', 'remainingContractDuration'))->render();
            return response()->json($view);

        }
    }

    private function getRemainingContractsDurationForFootballers($footballers): array {

        $remainingContractsDuration = [];

        foreach ($footballers as $footballer){

            $bindingContract = $footballer->contracts->where('status', 'signed')->first();

            if ($bindingContract){
                $remainingContractsDuration[$footballer->id] =
                    $this->computeRemainingContractDuration($bindingContract->date_and_time_of_end);
            }
        }

        return $remainingContractsDuration;
    }

    private function computeRemainingContractDuration($dateOfEnd){

        $currentDate = date_create(date('Y-m-d H:i'));
        $endDate = date_create($dateOfEnd);

        $dateDifference = $currentDate->diff($endDate);

        $remainingContractDurationInDays = $dateDifference->format('%a');
        $remainingContractDurationInHours = $dateDifference->format('%h');

        if ($remainingContractDurationInDays !== '0'){
            $remainingContractDuration = $dateDifference->format('%a day(s) left');
        }
        else{
            if ($remainingContractDurationInHours !== '0'){
                $remainingContractDuration = $dateDifference->format('%h hour(s) left');
            }
            else{
                $remainingContractDuration = $dateDifference->format('%i minute(s) left');
            }
        }

        return $remainingContractDuration;
    }
}
