    @extends('layouts.user_type.auth')

    @section('content')
        <div>
            <div class="px-4 pt-5 my-5 text-center border-bottom">
                <h1 class="display-4 fw-bold text-body-emphasis">View Our Campaigns</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                        world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive
                        grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                </div>
                <div class="overflow-hidden" style="max-height: 30vh;">
                </div>
            </div>
        </div>
        

        <x-campaigns :campaigns="$campaigns" />



        </div>
    @endsection
