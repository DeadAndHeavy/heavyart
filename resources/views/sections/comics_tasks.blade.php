<h3 class="heading">ВАШИ ИДЕИ:</h3>
@if (count($tasks) > 0)
    <ol class="commentlist">
        @foreach($tasks as $task)
        <li class="comment odd thread-even depth-1">
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
            </div>
        </li>
        @endforeach
    </ol>
@else
    Заказов пока нет. Так что будь первым! ;)
@endif