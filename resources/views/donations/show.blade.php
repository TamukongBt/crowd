@extends('layouts.user_type.auth')

@section('content')
    <div class="form-signin w-100 d-flex justify-content-center align-items-center" style="height: 80vh; background:url(assets{{ '/img/help.jpg' }})">
        <div class="card  p-5">
            <x-donationstable :donations="$donations" />
        </div>

    </div>
@endsection
