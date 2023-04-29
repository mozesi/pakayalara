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
        @include('layouts.Modals.login')
        @include('layouts.Modals.register')
        <section class="container">
            <div class="row m-4">
                <div class="col-8 p-4">
                        <h1 class="lead">
                            Welcome to <span class="text-warning">Pakaya.</span>
                        </h1>
                        <p class="">
                                Enjoy reading and contributing to a variety of Malawian proverbs in your favorite local languages.
                                You can also share your understanding of a proverb and Up vote someone's insights of a proverb. Have fun!
                        </p>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-primary">Sign In</button>
                            <a href="/home/guest" class="btn btn-primary">Proceed as a guest</a>            
                        </div>
                </div>
                <div class="col-4">
                            <img class="img-fluid w-50 d-none d-sm-block" src="{{URL::asset('/img/home_one.png')}}" alt="">
                </div>
            </div>

            <div id="about">
                 About section
            </div>
            <div id="contact">
                contact section
           </div>
        </section>
        <div id="footer">
            Footer section
       </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    </body>
</html>
