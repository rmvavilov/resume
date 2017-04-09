<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            {{--<div class="container-fluid">--}}
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">Резюме</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {{--<li><a href="#">Активная ссылка <span class="sr-only">(current)</span></a></li>--}}
                        <li @if(Request::path() == '/') class="active" @endif><a href="/">Главная</a></li>
                        <li @if(Request::path() == 'contacts') class="active" @endif><a href="/contacts">Контакты</a>
                        </li>
                        @unless (Auth::guest())
                            <li @if(Request::path() == 'settings') class="active" @endif><a href="/settings">Личный
                                    кабинет</a></li>
                        @endunless
                    </ul>

                    @if (Auth::guest())
                        <p class="navbar-text navbar-right">
                            <a href="/login">Войти</a>
                            или
                            <a href="/register">Зарегистрироваться</a>
                        </p>
                    @else
                        <p class="navbar-text navbar-right">
                            <img class="small-profile-user-img  img-circle"
                                 src="/img/avatar/{{ Auth::user()->avatar }}"
                                 alt="Small user profile picture">
                            {{Auth::user()->full_name}}
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
            <div class="container">
                <p class="text-muted text-center">
                    <strong>Copyright © 2016-2017 <a href="https://github.com/rmvavilov">Roman Vavilov</a>.</strong>
                </p>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
