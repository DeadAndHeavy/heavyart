@extends('layouts.base')

@section('content')
<div class="wrapper clearfix">

    <!-- posts list -->
    <div id="posts-list" class="single-post">

        <h2 class="page-heading"><span>ЗАКАЗЫ</span></h2>

        <article class="format-standard">
            <div class="task_overview">
                <p>Если у Вас есть какие-либо интересные идеи или задумки, которые Вы хотели бы увидеть в комиксах - описывайте их здесь!) И я обязательно воплощу Ваши задумки в жизнь)</p>
            </div>

            <!-- comments list -->
            <div id="tasks-wrap">
                @include('sections.comics_tasks')
            </div>
            <!-- ENDS comments list -->

            <!-- Respond -->
            @if (Auth::check())
            <div id="respond">
                <form method="post" id="taskForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <textarea name="task_text" id="task_area" maxlength="2000"></textarea>
                    <div class="comment_loading"></div>

                    <p><input class="send-task-btn" name="submit" type="submit" id="submit" value="Отправить" /></p>
                </form>
            </div>
            <div class="clearfix"></div>
            @else
                Только авторизованные пользователи могут оставлять заказы
            @endif
            <!-- ENDS Respond -->

        </article>

        </div>
        <!-- ENDS posts list -->

</div>
@endsection