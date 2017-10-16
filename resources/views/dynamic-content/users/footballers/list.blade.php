<div class="col-md-12">
    <div class="jumbotron jumbotron-main-page table-jumbotron">
        <div class="container pagination-links">
            <div class="row justify-content-center">
                {{ $footballers->links('layouts.pagination.users.footballers.list') }}
            </div>
        </div>
        <table id="footballers-table" class="table table-hover table-responsive" cellspacing="0" width="100%">
            <thead class="my-color-2">
            <tr>
                <th><i class="fa fa-users fa-fw"></i>Name</th>
                <th><i class="fa fa-shield fa-fw"></i>Avatar</th>
                <th><i class="fa fa-flag fa-fw"></i>Country</th>
                <th><i class="fa fa-flag-o fa-fw"></i>City</th>
                <th><i class="fa fa-male fa-fw"></i>Main football position</th>
                <th><i class="fa fa-soccer-ball-o fa-fw"></i>Goals</th>
                <th><i class="fa fa-mail-forward fa-fw"></i>Assists</th>
                <th><i class="fa fa-trophy fa-fw"></i>Won Trophies</th>
            </tr>
            </thead>
            <tbody>

            @foreach($footballers as $footballer)
                <tr>
                    <td class="font-bold">{{ $footballer->username }}</td>
                    <td>
                        <img src="{{ asset($footballer->avatar_dir. $footballer->avatar) }}"
                             width="25" height="25">
                    </td>
                    <td class="font-bold">{{ $footballer->country }}</td>
                    <td class="font-bold">{{ $footballer->city }}</td>
                    <td class="font-bold">{{ $footballer->main_football_position }}</td>
                    <td class="font-bold">{{ $footballer->goals }}</td>
                    <td class="font-bold">{{ $footballer->assists }}</td>
                    <td class="font-bold">{{ $footballer->won_trophies }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>