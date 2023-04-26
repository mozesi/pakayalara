<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pakaya</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Styles -->
        <style>
          </style>
        @livewireStyles
    </head>
    <body class="">
        @include('layouts.navigation')
        {{-- 
            Modals for account registration and login
        --}}
        @include('layouts.Modals.login')
        @include('layouts.Modals.register')
        <section class="container mx-auto">
            <div class="columns-5">
                    <h1 class="text-3xl font-bold">
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
            <div class="columns-6">
                        <img class="img-fluied w-50 d-none d-sm-block" src="{{URL::asset('/img/home_one.png')}}" alt="">
            </div>
        </section>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
