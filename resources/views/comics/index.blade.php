@extends('layouts.base')

@section('content')
    <div class="wrapper clearfix">
        <h2 class="page-heading"><span>ГАЛЕРЕЯ КОМИКСОВ</span></h2>

        <!-- thumbs -->
        <div class="portfolio-thumbs clearfix" >
            @foreach($comicses as $comics)
                <figure>
                    <figcaption>
                        <strong>{{ $comics->name }}</strong>
                        <span>{{ str_limit($comics->description, $limit = 400, $end = '...') }}</span>
                        <em>{{ date('F d, Y', strtotime($comics->created_at)) }}</em>
                        <a href="/comics/{{ $comics->id }}" class="opener"></a>
                    </figcaption>

                    <a href="/comics/{{ $comics->id }}"  class="thumb"><img src="content/comics/{{ $comics->id }}_gallery.jpg" alt="{{ $comics->name }}" /></a>
                </figure>
            @endforeach
        </div>
        <!-- ends thumbs-->


        <!-- pager -->
        <!--<ul class="pager">
            <li class="paged">Page 1 of 2</li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
        <div class="clearfix"></div>-->
        <!-- ENDS pager -->

    </div>
@endsection