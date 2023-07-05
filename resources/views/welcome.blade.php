    @extends('layouts.user_type.auth')

    @section('content')
        <div class="main-content w-100 " style="background-image:url(assets{{ '/img/help.jpg' }}); background-size:cover">
            <div class="row mx-auto align-items-center" style="height:80vh; ">
                <div class="col-6 text-light mx-4">
                    <h3 class="text-light display-4">Welcome to The Brother's Keeper</h3>
                    <span>We are here to help us be our brother's Keep </span><br>
                    <a class="btn btn-dark " href="{{ 'campaign' }}"> Donate Now</a>
                </div>
            </div>
        </div>

        <div class="container-fluid w-100 text-white bg-dark col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-2 py-3 px-3">
                <span class="display-5 fw-bold text-center">We are here to lend that helping hand</span>
                <p class="lead text-center">We have been providing subsidies for communities over the country and we want
                    you
                    to
                    join us in making the difference today</p>
            </div>
        </div>
        @php
            $campaigns = App\Models\Campaign::limit(6)->get();
        @endphp
        <h5 class="text-center text-uppercase fs-2 my-5 fw-bold ">Our Campaigns</h5>
        <x-campaigns :campaigns="$campaigns" />

        <div class="container-fluid w-100 text-white bg-dark col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-2 py-3 px-3">
                <span class="display-5 fw-bold text-center">Want To Create a Campaign Click Here</span>
                <a class="btn btn-primary btn-lg w-25 mx-auto " href="{{url('/request/create')}}">Request A Campaign</a>
            </div>
        </div>



        </div>
    @endsection
