@extends('layouts.app')

@auth
    @section('auth')
        @if (\Request::is('profile'||\Request::is('request') || \Request::is('request/*')))
            {{-- @include('layouts.navbars.auth.sidebar') --}}
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                {{-- @include('layouts.navbars.auth.nav') --}}
                @yield('content')
                @include('layouts.footers.auth.footer')
            </div>
        @elseif (\Request::is('welcome') || \Request::is('campaigns') || \Request::is('campaign/*') || \Request::is('campaign') || \Request::is('success'))
            <main class="main-content mt-1 border-radius-lg">
                @include('layouts.navbars.auth.nav')
                @yield('content')
            </main>
            @include('layouts.footers.auth.footer')
        @else
            @include('layouts.navbars.auth.sidebar')
            <main
                class="main-content ">
                @include('layouts.navbars.auth.nav')
                <div class="container-fluid py-4">
                    @yield('content')
                    @include('layouts.footers.auth.footer')
                </div>
            </main>
        @endif

    @endsection
@endauth
@guest
    <div class="w-100">
        @include('layouts.navbars.guest.nav')
    </div>
    @yield('content')
    @include('layouts.footers.guest.footer')
@endguest
