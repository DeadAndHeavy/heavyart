<header class="clearfix">

    <!-- top widget -->
    <div id="top-widget-holder">
        <div class="wrapper">
            <div id="top-widget">
                <div class="padding">
                    <img class="top-widget-art" src="/img/nerzul-art.jpg">
                </div>
            </div>
        </div>
        <a href="#" id="top-open">Menu</a>
    </div>
    <!-- ENDS top-widget -->

    <div class="wrapper clearfix">

        <a href="{{ route('home') }}" id="logo">
            <img width="100" src="/img/logo.png" alt="Heavy Art">
        </a>

        @if (Auth::check())
            <div class="auth-form">
                <div class="user_info">
                    <div class="user_message">
                        Добро пожаловать, <b class="highlighted_username">{{ Auth::user()->username }}</b>
                    </div>
                    <div class="user_class_icon">
                        <img src="/img/classes/{{ Auth::user()->gameClass->id }}.jpg" alt="{{ Auth::user()->gameClass->class_name }}" title="{{ Auth::user()->gameClass->class_name }}">
                    </div>
                </div>
                <a class="logout_link" href="/auth/logout">Выйти</a>
            </div>
        @else
            <div class="auth-form">

                <form role="form" method="POST" action="{{ url('/auth/login') }}" id="authForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="text" placeholder="Ваш никнейм" name="username" value="{{ old('username') }}"><br/><br/>

                    <input type="password" placeholder="Ваш Пароль" name="password"><br/>

                    <p class="auth_submit_container">
                        <input name="submit" type="submit" id="submit" value="Войти" />
                        <a class="reg_link" href="/auth/register">Регистрация</a>
                    </p>

                    <div class="auth_errors_container">
                        @if (session()->has('form_type') && session('form_type') == 'auth')
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </form>

            </div>
        @endif

        <nav>
            <ul id="nav" class="sf-menu">
                <li class="{{ MainHelper::setActive('/') }}"><a href="{{ route('home') }}">ГЛАВНАЯ</a></li>
                <li class="{{ MainHelper::setActive('comics') }}"><a href="{{ route('comics') }}">КОМИКСЫ</a></li>
                <li class="{{ MainHelper::setActive('task') }}"><a href="/task">ЗАКАЗЫ</a></li>
                <li class="{{ MainHelper::setActive('people') }}"><a href="/people">СООБЩЕСТВО</a></li>
            </ul>
            <div id="combo-holder"></div>
        </nav>
    </div>
</header>
