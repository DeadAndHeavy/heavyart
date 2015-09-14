@if (Auth::check() && empty($liked))
    <div class="vote-block">
        <div class="vote-block-title"><h3>Понравилось? Голосуй! =)</h3></div>
        <div class="vote-block-button">
            <a title="Проголосовать" class="comics-like-button" data-token="{{ csrf_token() }}" data-comics-id="{{ $comics->id }}" href="javascript:void(0)"></a>
        </div>
        <div class="like_loader"></div>
    </div>
@elseif(!Auth::check())
    <div class="vote-block"><h3>Чтобы голосовать за понравившиеся комиксы, нужно авторизоваться</h3></div>
@else
    <div class="vote-block"><h3>Вы проголосовали за этот комикс</h3></div>
@endif