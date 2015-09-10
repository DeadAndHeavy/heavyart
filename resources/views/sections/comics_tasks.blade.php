<h3 class="heading">ВАШИ ИДЕИ:</h3>
@if (count($tasks) > 0)
    <ol class="commentlist">
        @foreach($tasks as $task)
        <li class="comment odd thread-even depth-1">
            <div class="comment-body clearfix">
                <img alt='' src='/img/races/{{ $task->user->game_race_id }}_{{ $task->user->gender }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <img alt='' src='/img/classes/{{ $task->user->game_class_id }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
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