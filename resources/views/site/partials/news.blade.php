<div class="flex_container pt-50 pb-50">
    <section class="section two_column">
        <h2 class="pb-40">Latest news</h2>

        <!-- Blog news -->

        @foreach($allNews as $news)

            <div class="blognews">
                <div class="blognews__date">
                    <div class="blognews__date__day">09</div>
                    <div class="blognews__date__month">SEP</div>
                </div>
                <div class="blognews__content">
                    <div class="blognews__content__title">{{ $news->title }}</div>
                    <div class="blognews__content__text">{!! $news->article_text !!}</div>
                </div>
            </div>

        @endforeach

    </section>

    <!-- Who am i -->

    <section class="section two_column">
        <h2 class="pb-40">Who am I</h2>
        <p>My name is <b>Juraj Marušiak</b> and I do a bit of everything. I do webdesign, I develop web applications and I look after them as a system administrator. While I love, what I do, there's one thing I would not trade my career for. My Family - my beautiful wife Lucia and a little Sofia, who I love the most.</p>
        <br>
        <div class="cv">
            <div class="cv__pdf"><img src="assets/pdf.png" alt=""></div>
            <p class="cv__text flex_container flex_center"><a href="assets/download/cv-marusiak.pdf">Download my CV</a></p>
        </div>
    </section>
</div>