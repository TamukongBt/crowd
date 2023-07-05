    @extends('layouts.user_type.auth')

    @section('content')
        <div class="row m-3">
            <!-- Image Column  -->
            <div class="col-md-6 ">
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->name }}" height="600px" width="100%"
                    class="object-fit-lg-cover object-fit-sm-cover  rounded-3">
            </div>
            <!-- Product Details  -->
            <div class="col-md-6 pt-5">
                <div class="row">
                    <div class="col-6">
                        <h3 class="my-2 lead display-3">{{ $campaign->name }}</h3>
                    </div>
                    <div class="col-6">
                        <span class="h3 lead  my-2 lead display-3 text-danger text-uppercase">Ends On:
                            {{ $campaign->expiry }} </span>
                    </div>

                </div>
                <!-- Product Details  -->
                <p class="fw-light fs-6 pt-2">
                    {{ $campaign->description }}
                </p>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <span class="h6 text-uppercase fw-bold text-green pl-3">Goal</span>
                        <h6 class="display-5 my-2">{{ $campaign->goal }} FCFA</h6>
                    </div>
                    <div class="col-6">
                        <span class="h6 text-uppercase fw-bold text-success pl-3">Raised</span>
                        <h6 class="display-5 my-2">{{ $campaign->raised == null ? 0.0 : $campaign->raised }} FCFA</h6>
                    </div>
                </div>
                <hr class="w-75 text-center my-3 bg-light">

                <!-- Size -->
                @php
                    // calculate percentage of goal reached
                    $percentage = floor(($campaign->raised / $campaign->goal) * 100);
                    $length = $percentage > 100 ? 100 : $percentage;
                @endphp
                <h6 class="text-uppercase fw-light fs-5 small fw-bold">Progress: {{ $percentage }} %</h6>
                <div class="progress" class="progressbar" aria-label="Basic example high"
                    aria-valuenow="{{ $length }}" aria-valuemin="0" aria-valuemax="100">
                    @php
                        if ($percentage > 100) {
                            $width = 'w-100';
                        } elseif (50 < $percentage && $percentage < 100) {
                            $width = 'w-75';
                        } elseif (25 < $percentage && $percentage < 50) {
                            $width = 'w-50';
                        } elseif (0 < $percentage && $percentage < 25) {
                            $width = 'w-25';
                        }
                        $percentage > 100 ? 100 : $percentage;

                    @endphp

                    <div class="progress-bar {{ $width }}"></div>
                </div>
                <div class="text-center small fw-bold text-uppercase mt-3">
                    @if ($percentage >= 0 && $percentage < 39)
                        <span class="text-danger">This campaign needs more donations</span>
                    @elseif ($percentage > 40 && $percentage < 80)
                        <span class="text-success">This campaign is almost complete</span>
                    @elseif ($percentage > 80 && $percentage < 100)
                        <span class="text-success">We are Inches a way...</span>
                    @elseif ($percentage >= 100)
                        <span class="text-success">This campaign is complete Thank You</span>
                    @endif
                </div>
                <hr class="w-75 text-center my-3 bg-light">
                @if ($percentage < 100)
                    <x-donateform :campaign="$campaign" />
                @endif






                </form>
            </div>
        </div>
    @endsection
