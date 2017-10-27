<div class="col-md-12">
    <div class="jumbotron jumbotron-main-page">
        <div class="row justify-content-center">
            <div class="col">
                <div class="tile chosen">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    @if($contract->isExtensionProposed())
                        <h1 class="info-header text-center extend-contract-box">
                            <span class="badge badge-pill my-color">
                                Extend contract: +{{ $contract->extended_duration }}
                            </span>
                        </h1>
                        <h1 class="text-header text-center extend-contract-box" style="margin: 0">
                            <a href="{{ route('contract-extend', $contract->id) }}"
                               class="btn btn-circle-position my-color-3 extend-contract" role="button" style="margin: 0">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{ route('contract-reject-extension', $contract->id) }}"
                               class="btn btn-circle-position my-color reject-extend-contract" role="button" style="margin: 0">
                                <i class="fa fa-remove"></i>
                            </a>
                        </h1>
                    @endif
                    <div class="text text-center">
                        <h1>Binding contract</h1>
                        <h1><img src="{{ asset($contract->user->avatar_dir. $contract->user->avatar) }}"
                                 width="60" height="60" class="img-fluid rounded-circle"></h1>
                        <h1><i class="fa fa-arrow-down"></i></h1>
                        <h1><img src="{{ asset('images/contracts/signature.png') }}" width="80"></h1>
                        <h1><i class="fa fa-arrow-down"></i></h1>
                        <h1><img src="{{ asset($contract->club->emblem_dir. $contract->club->emblem) }}"
                                 width="60" height="60" class="img-fluid rounded-circle"></h1>
                    </div>
                </div>
            </div>

            <div class="col">
                <h1 class="font-bold font-italic">Contract details:</h1>
                <br>
                <h3 class="font-italic"><i class="fa fa-calendar fa-fw"></i>
                    Signed on: {{ $contract->date_and_time_of_signing }}</h3>
                <h3 class="font-italic"><i class="fa fa-clock-o fa-fw"></i>
                    Contract duration: {{ $contract->duration }}</h3>
                <h3 class="font-italic"><i class="fa fa-calendar-minus-o fa-fw"></i>
                    End of contract: {{ $contract->date_and_time_of_end }}</h3>
                <br>
                <h3 class="font-italic"><i class="fa fa-hourglass fa-fw"></i>
                    Contract remaining time:
                    <span class="font-bold my-color-2">{{ $remainingContractDuration }}
                            </span>
                </h3>
                <br><br>
                <h1 class="font-bold font-italic">Transfer:</h1>
                <br>
                <h3>
                    <img src="{{ asset($contract->user->avatar_dir. $contract->user->avatar) }}"
                         width="60" height="60" class="img-fluid rounded-circle">
                    {{ $contract->user->username }}
                    <i class="fa fa-long-arrow-right"></i>
                    <img src="{{ asset($contract->club->emblem_dir. $contract->club->emblem) }}"
                         width="60" height="60" class="img-fluid rounded-circle"> {{ $contract->club->name }}
                </h3>
            </div>
        </div>
    </div>
</div>