@props(['campaigns'=>$campaigns])


<div class="container mt-5">

    <div class="row">
        @foreach ($campaigns as $campaign )
        <div class="col-4 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{asset('storage/' . $campaign->image) }}" alt="{{$campaign->name}}">
                <div class="card-body">
                    <h4 class="card-title">{{$campaign->name}}</h4>
                    @php
                    // get first 20 words of description
                    $description = implode(' ', array_slice(explode(' ', $campaign->description), 0, 20));
                    $description = $description.'...';
                    @endphp
                    <p class="card-text">{{$description}} </p>
                    <a href="{{url('campaign/'.$campaign->id)}}" class="fw-bold link">View Campaign</a>
                </div>
                <div class="card-footeer p-2">

                    <div class="row justify-content-space-between border-top p-3">
                        <div class="col-6"> <strong>Raised:</strong> {{ $campaign->raised == null ? 0.00 : $campaign->raised  }} FCFA</div>
                        <div class="col-6"> <strong>Goal:</strong> {{$campaign->goal}} FCFA</div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
