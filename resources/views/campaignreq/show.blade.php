@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('{{ asset('storage/' . $request->image) }}'); background-position-y: 50%;">
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('storage/' . $request->image) }}" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ ucwords($request->name) }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           Decision
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="{{route('request.decision',['decision'=>'true','id'=>$request->id])}}">Approve</a>
                                            <a class="dropdown-item" href="{{route('request.decision',['decision'=>'false','id'=>$request->id])}}">Decline</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                {{ $request->description }}
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; {{ $request->reqowner->name }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong>
                                    &nbsp; {{ $request->reqowner->phone }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                                    &nbsp; {{ $request->reqowner->email }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Location:</strong> &nbsp; {{ $request->goal }}</li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-1">Campaigns</h6>
                            <p class="text-sm">Other Campaigns Requested</p>
                        </div>
                        <div class="card-body p-3">
                            @php
                                $simrequests = App\Models\CampaignRequest::where('userid', $request->userid)
                                    ->orderby('created_at', 'desc')
                                    ->limit(5)
                                    ->get();
                            @endphp
                            <div class="row">
                                @foreach ($simrequests as $similiar)
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="position-relative">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="{{ asset('storage/' . $similiar->image) }}"
                                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                                </a>
                                            </div>
                                            <div class="card-body px-1 pb-0">
                                                <p class="text-gradient text-dark mb-2 text-sm">
                                                    {{ $similiar->reqowner->name }}</p>
                                                <p class="mb-4 text-sm">
                                                    {{ $similiar->description }}
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <a href="{{ url('request', $similiar->id) }}"
                                                        class="btn btn-outline-primary btn-sm mb-0">View Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth.footer')
        </div>
    </div>
@endsection
