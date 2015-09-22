@extends('layouts.base')

@section('content')
    <div class="wrapper">

        @if(count($bestComicses) > 0)
            <!-- slider holder -->
            <div id="slider-holder" class="clearfix">

                <!-- slider -->
                <div class="flexslider home-slider">
                    <ul class="slides">
                        @foreach($bestComicses as $comics)
                            <li>
                                <a href="/comics/{{ $comics->id }}">
                                    <img src="content/comics/{{ $comics->id }}_slider.jpg" alt="{{ $comics->name }}" />
                                </a>
                                <p class="flex-caption">{{ $comics->name }}</p>
                                <p class="flex-caption-comments">{{ count($comics->comments) }}</p>
                                <p class="flex-caption-likes">{{ $comics->likes }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- ENDS slider -->

                <div class="home-slider-clearfix "></div>

                <!-- Headline -->
                <div id="headline">
                    <h3>Наиболее популярные комиксы</h3>
                    <br/>
                    <p>Здесь отображается тройка комиксов, набравшая наибольшее количество голосов.</p>
                    <br/>
                    <p>Голосуйте за понравившиеся Вам комиксы и они непременно попадут на главную страницу.</p>
                    <em id="corner"></em>
                </div>
                <!-- ENDS headline -->

            </div>
            <!-- ENDS slider holder -->
        @endif

        <div class="footer_overview" style="margin-bottom: 50px;">
            <p><h4>Посвящается всем, кто играл в World of Warcraft на днепропетровском сервере Alkar.</h4></p>
            <p>Лично меня частенько терзает ностальгия по тем далеким временам, когда Алькар еще был жив. Это было поистине золотое время) Все знали друг друга в
            лицо, благодаря еженедельным сходкам. Да, было море багов, а также злостных багоюзеров, но разве это главное?) Ведь мы все получали огромное
            удовольствие, играя в любимую игру с товарищами. Эта ностальгия и натолкнула меня на создание такого сайта, на котором бы вновь собрались старые
            друзья, вспомнили былое и поностальгировали вместе со мной) В те далекие времена случилось так, что мою подсеть забанили, и несколько недель пришлось
            покрутиться на форуме) И тогда пришла мысль перенести некоторые моменты из игры на бумагу в виде юморных комиксов. И вот теперь, спустя шесть лет, я
            решил вернуться к этому занятию) Художник я посредственный, так что тапками не кидаться!) Возможно, не все разделят этот юмор, но все же, рисуя все
            это, я старался поднять Вам, моим дорогим старым друзьям, настроение) И надеюсь, что у меня это получится)</p>
            <br/>
            <p>P.S. В дальнейшем на сайт буду впиливать различные вкусности, на одних лишь комиксах ограничиваться не будем)</p>
        </div>

        @if(count($lastAddedComicses) > 0)
            <!-- home-block -->
            <div class="home-block" >
                <h2 class="home-block-heading"><span>ПОСЛЕДНИЕ ДОБАВЛЕННЫЕ КОМИКСЫ</span></h2>
                <div class="one-third-thumbs clearfix" >
                    @foreach($lastAddedComicses as $comics)
                        <figure>
                            <figcaption>
                                <strong>{{ $comics->name }}</strong>
                                <span>{{ str_limit($comics->description, $limit = 300, $end = '...') }}</span>
                                <em>{{ date('F d, Y', strtotime($comics->created_at)) }}</em>
                                <a href="/comics/{{ $comics->id }}" class="opener"></a>
                            </figcaption>

                            <a href="/comics/{{ $comics->id }}"  class="thumb"><img src="content/comics/{{ $comics->id }}_gallery.jpg" alt="{{ $comics->name }}" /></a>
                            <p class="flex-caption-comments">{{ count($comics->comments) }}</p>
                            <p class="flex-caption-likes">{{ $comics->likes }}</p>
                        </figure>
                    @endforeach
                </div>
            </div>
            <!-- ENDS home-block -->
        @endif


        <!-- home-block -->
        <!--<div class="home-block">
            <h2 class="home-block-heading"><span>LATEST PROJECTS</span></h2>
            <div class="one-fourth-thumbs clearfix">


                <figure>
                    <figcaption>
                        <strong>Pellentesque habitant morbi</strong>
                        <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
                        <em>December 08, 2011</em>
                        <a href="single.html" class="opener"></a>
                    </figcaption>

                    <a href="single.html"  class="thumb"><img src="img/dummies/featured-7.jpg" alt="Alt text" /></a>
                </figure>

                <figure>
                    <figcaption>
                        <strong>Pellentesque habitant morbi</strong>
                        <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
                        <em>December 08, 2011</em>
                        <a href="single.html" class="opener"></a>
                    </figcaption>

                    <a href="single.html"  class="thumb"><img src="img/dummies/featured-8.jpg" alt="Alt text" /></a>
                </figure>

                <figure>
                    <figcaption>
                        <strong>Pellentesque habitant morbi</strong>
                        <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
                        <em>December 08, 2011</em>
                        <a href="single.html" class="opener"></a>
                    </figcaption>

                    <a href="single.html"  class="thumb"><img src="img/dummies/featured-9.jpg" alt="Alt text" /></a>
                </figure>

                <figure class="last">
                    <figcaption>
                        <strong>Pellentesque habitant morbi</strong>
                        <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
                        <em>December 08, 2011</em>
                        <a href="single.html" class="opener"></a>
                    </figcaption>

                    <a href="single.html"  class="thumb"><img src="img/dummies/featured-10.jpg" alt="Alt text" /></a>
                </figure>

                <a href="#" class="more-link right">More projects  &#8594;</a>



            </div>


        </div>-->
        <!-- ENDS home-block -->

    </div>
@endsection