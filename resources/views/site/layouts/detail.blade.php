<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Juraj Marušiak, web developer</title>

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

<!-- Header -->

<section class="row-fluid green">
    <div class="container">

        <div class="flex_container">
            <header>
                <h1 class="mt-50 fg-white">{{ $article->title }}</h1>
                <h2 class="mt-25 mb-25 fg-white">{{ $article->publish_date }}</h2>
            </header>
        </div>

    </div>
</section>

<section>
    <div class="container">
        <div class="row pt-60 pb-60">
            <div class="col-md-12">
                {!! $article->article_text !!}
            </div>
        </div>
    </div>
</section>


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