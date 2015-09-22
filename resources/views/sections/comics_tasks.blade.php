<h3 class="heading">ВАШИ ИДЕИ:</h3>
@if (count($tasks) > 0)
    <ol class="commentlist">
        @foreach($tasks as $task)
        <li class="comment task-row odd thread-even depth-1">
            <div class="comment-body clearfix">
                <img alt='' src='/img/races/{{ $task->user->game_race_id }}_{{ $task->user->gender }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <img alt='' src='/img/classes/{{ $task->user->game_class_id }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <div class="task-rating" data-task-id="{{ $task->id }}" data-token="{{ csrf_token() }}">
                    <div class="value">Рейтинг:
                        @if($task->rating > 0)
                            <b class="rating_state_good">+{{ $task->rating }}</b>
                        @elseif($task->rating == 0)
                            <b>{{ $task->rating }}</b>
                        @else
                            <b class="rating_state_bad">{{ $task->rating }}</b>
                        @endif
                    </div>
                    @if (Auth::check() && !in_array($task->id, $userVotes))
                        <a href="javascript:void(0)" class="rating-vote-button"></a>
                        <a href="javascript:void(0)" class="rating-unvote-button"></a>
                    @endif
                </div>
                <div class="comment-author vcard">{{ $task->user->username }}</div>
                <div class="comment-meta commentmetadata">
                    <span class="comment-date">{{ date('F d, Y H:i:s', strtotime($task->created_at)) }}</span>
                </div>
                <div class="comment-inner">
                    <p>{{ $task->task_text }}</p>
                </div>
                <br>
                <div class="comment-status">
                    @if ($task->status)
                        Статус заказа: <b style="color:green">ВЫПОЛНЕН</b>
                    @else
                        Статус заказа: <b style="color:red">НЕ ВЫПОЛНЕН</b>
                    @endif
                </div>
                <a href="javascript:void(0)" class="taskCommentButton">Комментарии (<b>{{ $task->taskComments->count() }}</b>)</a>
            </div>
            <div class="task-comment-block">
                <div class="comments-wrap">
                    @include('sections.comics_task_comments')
                </div>
                @if (Auth::check())
                    <form method="post" class="taskCommentForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <h4 class="heading">Здесь можно оставить комментарий по заказу</h4>

                        <textarea name="comment_text" class="task_comment_area" maxlength="255"></textarea>
                        <div class="task_comment_loading"></div>

                        <p><input class="send-task-comment-btn" name="submit" type="submit" id="submit" tabindex="5" value="Отправить" /></p>
                    </form>
                    <div class="clearfix"></div>
                @else
                    <div style="margin-bottom: 20px;">Только авторизованные пользователи могут оставлять комментарии</div>
                @endif
            </div>
        </li>
        @endforeach
    </ol>
@else
    Заказов пока нет. Так что будь первым! ;)
@endif