@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content" class="row justify-content-center">

        {{-- Search club - input --}}
        @include('layouts.elements.clubs.search.box')
        {{-- Search filters button --}}
        <a id="show-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
            <i class="fa fa-filter"></i>
        </a>
        <a id="hide-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
            <i class="fa fa-angle-double-left"></i>
        </a>
        {{-- Search filters --}}
        @include('layouts.elements.clubs.search.filters')

        <div class="col-md-12">
            <div class="jumbotron jumbotron-main-page">
                <div class="row justify-content-center">

                    <div class="col">
                        <h5>Welcome</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection