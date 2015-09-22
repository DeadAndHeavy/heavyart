<h4 class="heading">КОММЕНТАРИИ К ЗАКАЗУ</h4>
@if (count($task->taskComments) > 0)
    <ol>
        @foreach($task->taskComments as $taskComment)
        <li class="comment odd thread-even depth-1">
            <div class="comment-body clearfix">
                <img alt='' src='/img/races/{{ $taskComment->user->game_race_id }}_{{ $taskComment->user->gender }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <img alt='' src='/img/classes/{{ $taskComment->user->game_class_id }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <div class="comment-author vcard">{{ $taskComment->user->username }}</div>
                <div class="comment-meta commentmetadata">
                    <span class="comment-date">{{ date('F d, Y H:i:s', strtotime($taskComment->created_at)) }}</span>
                </div>
                <div class="comment-inner">
                    <p>{{ $taskComment->comment_text }}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ol>
@else
    Комментариев пока нет. Так что будь первым! ;)
@endif