<header class="clearfix">
    <div class="wrapper clearfix">
        <a href="{{ route('adminPanel') }}" id="logo">
            <img width="100" src="/img/logo.png" alt="Heavy Art">
        </a>

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

        <nav>
            <ul id="nav" class="sf-menu">
                <li class="current-menu-item"><a href="{{ route('adminPanel') }}">ГЛАВНАЯ</a></li>
                <li><a href="javascript:void(0);">КОМИКСЫ</a>
                    <ul>
                        <li><a href="/admin/show-comments">ПРОСМОТРЕТЬ ВСЕ КОМИКСЫ</a></li>
                        <li><a href="/admin/add-comics">ДОБАВИТЬ КОМИКС</a></li>
                    </ul>
                </li>
            </ul>
            <div id="combo-holder"></div>
        </nav>
    </div>
</header>
