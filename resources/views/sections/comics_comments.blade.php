<h3 class="heading">КОММЕНТАРИИ</h3>
@if (count($comments) > 0)
    <ol class="commentlist">
        @foreach($comments as $comment)
        <li class="comment odd thread-even depth-1">
            <div class="comment-body clearfix">
                <img alt='' src='/img/races/{{ $comment->user->game_race_id }}_{{ $comment->user->gender }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <img alt='' src='/img/classes/{{ $comment->user->game_class_id }}.jpg' class='avatar avatar-35 photo' height='36' width='36' />
                <div class="comment-author vcard">{{ $comment->user->username }}</div>
                <div class="comment-meta commentmetadata">
                    <span class="comment-date">{{ date('F d, Y H:i:s', strtotime($comment->created_at)) }}</span>
                </div>
                <div class="comment-inner">
                    <p>{{ $comment->comment_text }}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ol>
@else
    Комментариев пока нет. Так что будь первым! ;)
@endif