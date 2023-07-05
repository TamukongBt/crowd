@extends('layouts.user_type.auth')

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6 class="h4 text-uppercase ">Request Made</h6>
        </div>
        <x-requesttable :requests="$requests" />
    </div>
@endsection
