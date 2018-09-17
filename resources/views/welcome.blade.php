<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    </head>
    <body>
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Captures d'écrans appli Ohome :
                </h1>
            </div>
        </div>
        <div class="row">
            <?php for($i = 1; $i < 12; $i++){ ?>
                <div class="col-md-3" style="margin-top: 10px;">
                    <img class="img-fluid" src="{{ asset('img/capture/annonce ('.$i.').png') }}" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
    </body>
</html>
