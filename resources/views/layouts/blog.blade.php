@extends('layouts.app')

@include('inc.navbar')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-3">
                @include('inc.sidebar')
            </div>
            <div class="col-md-9">
                @yield('wrapped')
            </div>
        </div>
    </div>
@endsection