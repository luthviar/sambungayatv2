<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('img/favicon.ico') }}">

    <title>Sambungayat V2</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/starter-template.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/metro/style.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script>

    </script>
</head>

<body>
<div id="loading">
    <div id="loading-container" class="fullwidth">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p id='loading-text'>Loading...</p>
    </div>
</div>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <form method="POST" action="{{ url(action('GameController@next_question', $no_surat)) }}">
            {{ csrf_field() }}
            <h1>Question</h1>
            <p class="lead">
                <input name="id_question" value="{{ $thestring['question']->id }}" hidden>
                <input name="id_attempt" value="{{ Session::get('id_attempt') }}" hidden>
                @foreach($thestring['lengkap'] as $lengkap)
                    @if($thestring['true_answer']->word == $lengkap->word)
                        <span class="pull-right">
                            ٠٠٠
                        </span>
                    @else
                        {{ $lengkap->word }}
                    @endif
                @endforeach
            </p>

            <h1>Opsi</h1>
            @foreach($thestring['options'] as $key=>$option)
                <button type="submit" name="option"
                        class="the-option btn btn-outline-primary" value="{{ $option }}">{{ $option }}</button>
            @endforeach
            {{--<h1>True</h1>--}}
            {{--<p class="lead">--}}
                {{--{{ $thestring['true_answer']->word }}--}}
            {{--</p>--}}
        </form>

        <form method="POST" action="{{ url(action('GameController@finish_all',Session::get('id_attempt'))) }}">
            {{ csrf_field() }}
            <button type="submit" name="finish" class="btn btn-outline-primary">Selesai Bermain</button>
        </form>
    </div>

</main><!-- /.container -->
<div id="loadingz" style="display: none; background-color: black;">
    <div id="loading-container" class="fullwidth" style="background-color: black;">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p id='loading-text'>Loading...</p>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script src="{{ URL::asset('js/jquery-3.2.1.js') }}"  type="text/javascript"></script>--}}
{{--<script>window.jQuery || document.write('<script src="{{ URL::asset('js/jquery-3.2.1.slim.min.js') }}"><\/script>')</script>--}}
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#loadingz").fadeIn();
        });
    });
</script>
<script>

    $(window).load(function(){

        setTimeout(function() {
                $("#loading").fadeOut(function(){

                    $(this).remove();
                    $('body').removeAttr('style');
                })
            }
            , 300);
    });


    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();

    });
</script>
</body>
</html>
