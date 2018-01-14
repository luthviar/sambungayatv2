<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <script src="{{URL::asset('js/jquery-3.2.1.js')}}"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />


    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />

    <style type="text/css">
        .progress {
            box-shadow: inset 0 1px 2px rgba(1,1,2,.9);
        }
    </style>
</head>
<body>
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="{{ url('/') }}">SambungAyat</a></h1>
        <nav id="nav">
            <ul>
                {{--<li><a href="{{ route('/') }}">Menu</a></li>--}}
                {{--<li><a href="{{ route('feedback') }}">Beri Masukan</a></li>--}}
                <li>
                    <a href="#" class="icon fa-user">
                    </a>
                    <ul>
                        <li><a href="#">Lihat Profil</a></li>
                    </ul>
                </li>
                {{--<li><a href="{{ route('/logout') }}" class="button">Logout</a></li>--}}
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <section id="main" class="container 75%">
        @yield('content')
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; SambungAyat.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dropotron.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.scrollgress.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/skel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/util.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


</body>
</html>


