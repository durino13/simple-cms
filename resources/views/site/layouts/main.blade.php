<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fullstack development blog</title>
    <meta name="description" content="Personal blog dedicated to web development."/>

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

        <div class="flex_container">
            <header>
                <h1 class="mt-50 fg-white">JURAJ MARUŠIAK</h1>
                <h2 class="mt-25 mb-25 fg-white">Full stack developer & system administrator</h2>
                <div id="scroll-down" class="flex_container flex_center mt-25 mb-25 "><a href="#" class="demo-pricing demo-pricing-1    ">Hire me</a></div>
                <div class="coding">
                    <img src="assets/coding-welcome.png" alt="">
                    <div class="codingDesktop">
                        <div class="line1">
                            &lt;!DOCTYPE html&gt;<span>&nbsp;</span>
                        </div>
                        <div class="line2">
                            &lt;html&gt;<span>&nbsp;</span>
                        </div>
                        <div class="line3">
                             &lt;head&gt;<span>&nbsp;</span>
                        </div>
                        <div class="line4">
                              &lt;title&gt;
                            <p>
                                Welcome!:)
                            </p>
                            &lt;/title&gt;<span>&nbsp;</span>
                        </div>
                    </div>
                </div>
            </header>
        </div>

    </div>
</section>

<!-- Who am i -->

<div class="row-fluid grey">
    <div class="container">

        @include('site.partials.news')

    </div>
</div>

<!-- What can I do for you  -->

<section class="row-fluid">
    <div class="container">

        @include('site.partials.skills')

    </div>
</section>

<!-- Career -->

<section class="row-fluid grey">
    <div class="container">

        @include('site.partials.career')

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