@extends('layouts.user_type.auth')

@section('content')
    <div class="form-signin w-100 d-flex justify-content-center align-items-center" style="height: 80vh; background:url(assets{{ '/img/help.jpg' }})">
        <div class="card text-center display-4 p-5">
            <i class="fa fa-check-circle fa-2x text-success" aria-hidden="true"></i>
            <p class="mt-5 mb-3 text-muted">Thank You for your generous donation. </p>
            <a href="/campaigns" class="btn btn-primary btn-sm p-3">View other Campaigns</a href="/campaigns">
        </div>

    </div>
@endsection
