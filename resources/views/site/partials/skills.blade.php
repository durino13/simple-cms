<h2 class="pt-50 pb-40 center-text">What can I do for you?</h2>

<div class="flex_container pt-10 pb-50">

    <section class="section two_column">

        <!-- Development -->

        <h3 class="pt-20 pb-20">Development</h3>
        <div class="skillbar clearfix " data-percent="90%">
            <div class="skillbar-title" style="background: #88cd2a;"><span>PHP (Laravel) DEVELOPMENT</span></div>
            <div class="skillbar-bar" style="background: #88cd2a;"></div>
            <div class="skill-bar-percent">90%</div>
        </div>

        <div class="skillbar clearfix " data-percent="85%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>JAVASCRIPT</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">85%</div>
        </div>

        <div class="skillbar clearfix " data-percent="70%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>DevOps</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">70%</div>
        </div>


        <div class="skillbar clearfix " data-percent="70%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>CSS</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">70%</div>
        </div>

        <div class="skillbar clearfix " data-percent="60%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>GRAPHICS</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">60%</div>
        </div>

        <!-- System administration -->

        <h3 class="pb-20">System administration</h3>
        <div class="skillbar clearfix " data-percent="80%">
            <div class="skillbar-title" style="background: #88cd2a;"><span>WINDOWS (Server 2012) ADMIN.</span></div>
            <div class="skillbar-bar" style="background: #88cd2a;"></div>
            <div class="skill-bar-percent">80%</div>
        </div>

        <div class="skillbar clearfix " data-percent="75%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>LINUX (Ubuntu) ADMIN.</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">70%</div>
        </div>

        <div class="skillbar clearfix " data-percent="70%">
            <div class="skillbar-title" style="background: #00a8ff;"><span>GOOGLE APPS ADMIN.</span></div>
            <div class="skillbar-bar" style="background: #00a8ff;"></div>
            <div class="skill-bar-percent">75%</div>
        </div>

    </section>

    <!-- What do I know  -->

    <section class="section two_column">

        <h3 class="pb-20">Other technologies & tools I use(d)</h3>
        <div class="tags">
            <div class="tag">Laravel</div>
            <div class="tag">Angular 2/4</div>
            <div class="tag">Docker</div>
            <div class="tag">React & Redux</div>
            <div class="tag">Vue.js</div>
            <div class="tag">MSSQL</div>
            <div class="tag">MySQL</div>
            <div class="tag">PHP 7</div>
            <div class="tag">Composer</div>
            <div class="tag">Javascript</div>
            <div class="tag">NPM</div>
            <div class="tag">Webpack</div>
            <div class="tag">Gulp</div>
            <div class="tag">Bower</div>
            <div class="tag">Git</div>
            <div class="tag">Python scripting</div>
            <div class="tag">Design patterns</div>
            <div class="tag">Responsive design</div>
            <div class="tag">CSS</div>
            <div class="tag">SASS</div>
            <div class="tag">Networking</div>
            <div class="tag">VM Ware ESXi</div>
            <div class="tag">Windows 2012 R2</div>
            <div class="tag">Ubuntu Linux</div>
            <div class="tag">Google Apps for business</div>
            <div class="tag">English language</div>
        </div>

    </section>

</div>

<?php
/*
|--------------------------------------------------------------------------
| About me
|--------------------------------------------------------------------------
*/
?>

<h2 class="pb-40 center-text">{!! $aboutMe->title !!}</h2>

<div class="flex_container pt-10">

    <section class="section lh-35">
        {!! $aboutMe->article_text !!}
    </section>

</div>

<?php
/*
|--------------------------------------------------------------------------
| My thoughts
|--------------------------------------------------------------------------
*/
?>

<h2 class="pb-40 center-text">My point of view on web development</h2>

<div class="flex_container pt-10 pb-50">

    <section class="section lh-35">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            @foreach ($myThoughts as $index => $thought)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo $thought->title?>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?php echo $index; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <?php echo $thought->article_text?>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</div>