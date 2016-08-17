<div id="news" class="flex_container pt-50">

    <section class="section two_column">
        <h2 class="pb-40">Latest news</h2>

        <!-- Blog news -->

        @foreach($allNews as $news)

            <div class="blognews">
                <div class="blognews__date">
                    <div class="blognews__date__day">{{ date('d', strtotime($news->start_publishing))  }}</div>
                    <div class="blognews__date__month">{{ strtoupper(date('M', strtotime($news->start_publishing))) }}</div>
                </div>
                <div class="blognews__content">
                    <div class="blognews__content__title">{{ $news->title }}</div>
                    <div class="blognews__content__text">{!! $news->intro_text !!}</div>
                </div>
            </div>

        @endforeach

    </section>

    <!-- Who am i -->

    <section class="section two_column">
        <h2 class="pb-40">{{ $rightNewsArticle->first()->title }}</h2>
        {!! $rightNewsArticle->first()->intro_text !!}
        <br>
        <div class="cv">
            <div class="cv__pdf"><img src="assets/pdf.png" alt=""></div>
            <p class="cv__text flex_container flex_center"><a href="assets/download/cv-marusiak.pdf">Download my CV</a></p>
        </div>
    </section>

</div>

<div class="flex_container pb-5">
    <!-- Archive -->

    <section class="section">
        <h3 class="pb-20">Archived articles</h3>

        <div class="archive">
            <ul>
            @foreach($archivedArticles as $archivedArticle)
                <?php $carbon = new Carbon\Carbon($archivedArticle->start_publishing); ?>
                <li class="archive__title">
                    <a href="#">{{ $archivedArticle->title }}</a>
                    -
                    <span class="archive__date">{{ $carbon->toFormattedDateString() }}</span>
                </li>
            @endforeach
            </ul>
        </div>

    </section>

</div>