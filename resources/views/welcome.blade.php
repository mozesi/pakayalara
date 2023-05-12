<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pakaya</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <!-- Styles -->
        <style>
          </style>
        @livewireStyles
    </head>
    <body class="">
        {{-- 
            including the top navigation and modals for account registration and login
        --}}
        @include('layouts.navigation')
        <section class="p-5 text-center text-sm-start" >
            <div class="container">
                <div class="d-sm-flex align-items-center" >
                    <div>
                        <h1 class="lead">
                            Welcome to <span class="text-warning">Pakaya.</span>
                        </h1>
                        <p class="lead my-4">
                                Enjoy reading and contributing to a variety of Malawian proverbs in your favorite local languages.
                                You can also share your understanding of a proverb and Up vote someone's insights of a proverb. Have fun!
                        </p>
                        <div class="">
                            <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                            <a href="/home/guest" class="btn btn-primary">Proceed as a guest</a>       
                        </div>
                    </div>
                    <img class="img-fluid w-50 d-none d-sm-block" src="{{URL::asset('/img/home_one.png')}}" alt="">
                </div>
            </div>
        </section>
        {{-- --}}
        <section class="bg-primary text-light p-5">
            <div class="container">
                <div class="d-md-flex jutsify-content-between align-items-center">
                    <h2>
                        sign up
                    </h2>
                </div>
            </div>
        </section>
        {{-- --}}
        <section class="p-5">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md">
                        ONe
                    </div>
                    <div class="col-md">
                        ONe
                    </div>
                    <div class="col-md">
                        ONe
                    </div>
                </div>
            </div>
        </section>
        <section class="p-5">
            <div class="container">
                <div class="row align-items">
                    
                </div>
            </div>
        </section>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    </body>
</html>
