@if (empty($liked))
    <div class="categories"><a class="comics-like-button" data-token="{{ csrf_token() }}" data-comics-id="{{ $comics->id }}" href="javascript:void(0)">Мне нравится</a></div>
@else
    <div class="categories liked">Мне нравится</div>
@endif