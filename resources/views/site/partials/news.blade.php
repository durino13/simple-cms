<div id="news" class="flex_container pt-50">

    <section class="section two_column">

        <!-- Blog news -->

        <h2 class="pb-40">Blog</h2>

        @foreach($allBlogArticles as $blogArticle)

            <div class="blognews">
                <div class="blognews__date">
                    <div class="blognews__date__day">{{ date('d', strtotime($blogArticle->start_publishing))  }}</div>
                    <div class="blognews__date__month">{{ strtoupper(date('M', strtotime($blogArticle->start_publishing))) }}</div>
                </div>
                <div class="blognews__content">
                    <div class="blognews__content__title">{{ $blogArticle->title }}</div>
                    <div class="blognews__content__text">{!! $blogArticle->intro_text !!}</div>
                    <div class="blognews__content__readmore"><a href="{{ route('site.article.any', $blogArticle->alias )}}">View Blog Post</a> | Comments (0)</div>
                </div>
            </div>

        @endforeach

    </section>

    <section class="section two_column">

        <!-- Blog news -->

        <h2 class="pb-40">Latest projects & activities</h2>

        @foreach($projectArticles as $projectArticle)

            <div class="blognews">
                <div class="blognews__date">
                    <div class="blognews__date__day">{{ date('d', strtotime($projectArticle->start_publishing))  }}</div>
                    <div class="blognews__date__month">{{ strtoupper(date('M', strtotime($projectArticle->start_publishing))) }}</div>
                </div>
                <div class="blognews__content">
                    <div class="blognews__content__title">{{ $projectArticle->title }}</div>
                    <div class="blognews__content__text">{!! $projectArticle->intro_text !!}</div>
                </div>
            </div>

        @endforeach

        <div class="flex_container pb-5">

            <section class="section">

                {{-- Older activities --}}

                <h3 class="pb-20">Older activities</h3>

                <div class="archive">
                    <ul>
                        @foreach($archivedArticles as $archivedArticle)
                            <?php $carbon = new Carbon\Carbon($archivedArticle->start_publishing); ?>
                            <li class="archive__title">
                                <a href="{{ route('site.article.any', $archivedArticle->alias) }}">{{ $archivedArticle->title }}</a>
                                -
                                <span class="archive__date">{{ $carbon->toFormattedDateString() }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </section>

        </div>

    {{--<!-- Who am i -->--}}

        {{--<h2 class="pb-40">{{ $rightNewsArticle->first()->title }}</h2>--}}
        {{--{!! $rightNewsArticle->first()->intro_text !!}--}}
        {{--<br>--}}
        {{--<div class="cv">--}}
            {{--<div class="cv__pdf"><img src="assets/pdf.png" alt=""></div>--}}
            {{--<p class="cv__text flex_container flex_center"><a href="assets/download/cv-marusiak.pdf">Download my CV</a></p>--}}
        {{--</div>--}}
    </section>

</div>