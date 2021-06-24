<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!--    home blade styles-->
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <title>Article</title>

    <style>
        .selector-for-some-widget {
            box-sizing: content-box;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white nav-header-border">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Article</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create_article') }}">Articles</a>
                </li>
            </ul>
            <form class="d-flex">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </form>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @if(count($articles) > 0)
            @foreach($articles->all() as $article)
            <div class="card border-info">
                <div class="card-header home_card_back text-light">

                    <h5>{{ Auth::user()->name }} <img src="{{asset('images/unnamed.png')}}" width="30px"></h5>

                    <small class=" text-light ">Created At {{ $totalDuration }}</small>
                </div>
                <div class="card-body">
                    <div class="media mt-2">
                        <div class="media-body mt-1">
                            <a href=""></a>
                            <a href=""></a>
                        </div>
                    </div>
                    <span class="text-muted"></span>
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ substr( $article->body, 0,  200) }} <a href="#" class="card-link text-primary">read more</a> </p>
                    @if(empty($article->video_id))
                    @else
                    <div class="row">
                        <div class="col-12">
                            <iframe width="100%" height="415"
                                    src="https://www.youtube.com/embed/{{ $article->video_id }}"
                                    title="{{ $article->title }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif


                </div>
<!--                <div class="card-footer text-muted">-->
<!--                    2 days ago-->
<!--                </div>-->
            </div>
            <br>
            @endforeach
            @endif

        </div>
        <div class="col-1"></div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>
