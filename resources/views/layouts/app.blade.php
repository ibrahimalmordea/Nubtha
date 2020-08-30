<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="direction: rtl;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="images/Nubtha.png">
    <title>{{ config('app.name', 'Nubtha') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script {{-- for animation --}}
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/datatables.min.css" />

    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
    </script>
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
    </script>
    <script defer type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/datatables.min.js">
    </script>
</head>

<body>
    <div id="app">
        <nav style="margin-bottom: -2rem;" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <img src="images/Nubtha.png" alt="Nubtha" style="width: 5rem;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: 15px;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"id="home" href="home">{{ __('الصفحه الرئيسيه') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="scrollSubjectAnimated()">{{ __('التصنيفات') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" id="subject" onclick="scrollSubjectAnimated()">{{ __('التصنيفات') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"id="home" href="home">{{ __('الصفحه الرئيسيه') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->type == 1)
                                        <a class="dropdown-item" href="add">{{ __('الاخبار') }}</a>

                                        <a class="dropdown-item" id="subject" href="subject">{{ __('المواضيع') }}</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<footer>
    <a id="backToTop" style="position: absolute;margin: 1rem;position: fixed;bottom:0px;display: none"
        onclick="scrollTopAnimated()">
        <img style="width: 2rem;height: 2rem;" src="images\download2.png" alt=""></a>

    <a id="backToButtom" style="position: absolute;margin: 1rem;position: fixed;bottom:0px;display: block"
        onclick="scrollButtomAnimated()">
        <img style="width: 2rem;height: 2rem;" src="images\download3.png" alt=""></a>
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $("#div3").slideDown(1000);
        $("#div4").slideDown(400);
        $("#div2").fadeIn(1000);
        $("#div5").fadeIn(1000);
        var url = window.location.href;
        if (url.includes('home')) {
            $('#subject').css('display', 'block');
            $('#home').css('display', 'none');
        } else {
            $('#subject').css('display', 'none');
            $('#home').css('display', 'block');
        }
    });


    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 4000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }

    function scrollTopAnimated() {
        $("html, body").animate({
            scrollTop: "0"
        });
    }

    function scrollButtomAnimated() {
        $("html, body").animate({
            scrollTop: "10000.6669921875"
        });
    }

    function scrollSubjectAnimated() {
        $("html, body").animate({
            scrollTop: "725.5556030273438"
        });
    }

    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var st = $(this).scrollTop();
        console.log(st)
        if (st == 0) {
            $('#backToTop').css('display', 'none');
            $('#backToButtom').css('display', 'block');
        } else {
            $('#backToTop').css('display', 'block');
            $('#backToButtom').css('display', 'none');

        }
        lastScrollTop = st;
    });

</script>

</html>
