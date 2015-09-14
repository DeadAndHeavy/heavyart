@extends('layouts.base')

@section('content')
<div class="wrapper clearfix">

    <!-- posts list -->
    <div id="posts-list" class="single-post">

        <h2 class="page-heading"><span>КОМИКСЫ</span></h2>

        <article class="format-standard">
            <div class="entry-date"><div class="number">{{ date('d', strtotime($comics->created_at)) }}</div> <div class="year">{{ date('M, Y', strtotime($comics->created_at)) }}</div></div>
            <div class="feature-image">
                <a href="/content/comics/{{ $comics->id }}_original.jpg" data-rel="prettyPhoto"><img src="/content/comics/{{ $comics->id }}_slider.jpg" alt="{{ $comics->name }}" /></a>
            </div>
            <h2  class="post-heading">{{ $comics->name }}</h2>
            <div class="post-content">{{ $comics->description }}</div>
            <div id="comics_info_panel" class="meta">
                <div class="comments">Комментарии: <b>{{ count($comments) }}</b></div>
                <div class="user">Автор: HeavyBoy</div>
                <div class="likes">Голоса: <b>{{ $comics->likes }}</b></div>
            </div>

            @include('sections.comics_likes')

            <!-- comments list -->
            <div id="comments-wrap">
                @include('sections.comics_comments')
            </div>
            <!-- ENDS comments list -->


            <!-- Respond -->
            @if (Auth::check())
            <div id="respond">
                <form method="post" id="commentform">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="comics_id" value="{{ $comics->id }}">

                    <h3 class="heading">Здесь можно оставить комментарий =)</h3>

                    <textarea name="comment_text" id="comment_area" maxlength="1000"></textarea>
                    <div class="comment_loading"></div>

                    <p><input class="send-comment-btn" name="submit" type="submit" id="submit" tabindex="5" value="Отправить" /></p>
                </form>
            </div>
            <div class="clearfix"></div>
            @else
                Только авторизованные пользователи могут оставлять комментарии
            @endif
            <!-- ENDS Respond -->

            </article>

        </div>
        <!-- ENDS posts list -->

    <!-- sidebar -->
    <aside id="sidebar">

        <ul>
            <li class="block">
                <h4>Другие комиксы</h4>
                <ul>
                    @foreach ($otherComicses as $comics)
                        <li class="cat-item"><a href="/comics/{{ $comics->id }}" title="{{ $comics->name }}">{{ $comics->name }}</a></li>
                        <hr>
                    @endforeach
                </ul>
            </li>
        </ul>

        <em id="corner"></em>
    </aside>
    <!-- ENDS sidebar -->

</div>
@endsection