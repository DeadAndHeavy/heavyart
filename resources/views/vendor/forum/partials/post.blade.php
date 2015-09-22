<tr class="forum-post-row" id="post-{{ $post->id }}">
	<td class="author_info">
		<strong>{!! $post->authorName !!}</strong>
		<div class="author_icons">
		    <img src="/img/races/{{ $post->author->game_race_id }}_{{ $post->author->gender }}.jpg" alt="{{ $post->author->gameRace->race_name }}" title="{{ $post->author->gameRace->race_name }}"/>
		    <img src="/img/classes/{{ $post->author->game_class_id }}.jpg" alt="{{ $post->author->gameClass->class_name }}" title="{{ $post->author->gameClass->class_name }}"/>
		</div>
		Фракция: <b class="faction_{{ $post->author->game_faction_id }}">{{ $post->author->gameFaction->faction_name }}</b>
	</td>
	<td>
		{!! nl2br(e($post->content)) !!}
	</td>
	<td>
	    @if ($post->canEdit)
            <a href="{{ $post->editRoute }}">{{ trans('forum::base.edit')}}</a>
        @endif
        @if ($post->canDelete)
            <a href="{{ $post->deleteRoute }}" data-confirm data-method="delete">{{ trans('forum::base.delete') }}</a>
        @endif
        @if (Auth::check() && $post->author_id !== Auth::user()->id)
            <a href="javascript:void(0)" class="forum_answer">Ответить</a>
        @endif
        <div class="text-muted">
            {{ trans('forum::base.posted_at') }} {{ $post->posted }}
            @if ($post->updated_at != null && $post->created_at != $post->updated_at)
                {{ trans('forum::base.last_update') }} {{ $post->updated }}
            @endif
        </div>
	</td>
</tr>
