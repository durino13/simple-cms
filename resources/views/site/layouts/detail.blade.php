<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $article->title }}</title>

    <script type="text/javascript" src="/assets/site.all.js"></script>
    <link rel="stylesheet" href="/assets/site.all.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,700&amp;subset=latin-ext" rel="stylesheet" type="text/css">


    <!-- Google analytics  -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-63148621-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>

<!-- Header -->

<section class="row-fluid green">
    <div class="container">

        <div class="flex_container center-flex" style="min-height: 150px;">
            <header>
                <h1 class="fg-white">{{ $article->title }}</h1>
            </header>
        </div>

    </div>
</section>

<!-- Post date -->

<section class="row-fluid dark-green pt-5 pb-5 fg-white font-small">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                By: <span style="font-weight: 700;">{{ $article->author->name }}</span> <span>Published: {{ Carbon::createFromFormat('Y-m-d H:i:s', $article->start_publishing)->toFormattedDateString() }}</span>
            </div>
        </div>

    </div>
</section>

<!-- Article -->

<section>
    <div class="container">
        <div class="row pt-60 pb-60">
            <div class="col-md-12">
                {!! $article->article_text_parsed !!}
            </div>
        </div>
    </div>
</section>

<!-- Disqus -->

<footer class="row-fluid pb-50">
    <div class="container">

        @include('site.partials.disqus')

    </div>
</footer>

<!-- Footer -->

<footer class="row-fluid green">
    <div class="container">

        @include('site.partials.footer')

    </div>
</footer>

<!-- Disclaimer -->

<section class="row-fluid dark-green fg-white">
    <div class="container flex_container">
        <p class="center-block font-xsmall">© 2016 Yuma.sk</p>
    </div>
</section>

</body>
</html>