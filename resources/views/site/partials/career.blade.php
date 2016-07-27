<div class="flex_container pt-40 pb-70">
    <section class="section">
        <h2 class="pb-40 center-text">My career in a box</h2>

        <div id="timeline">

            <?php $index = 0;  ?>

            @foreach($allJobs as $job)

                <?php ($index % 2 === 0) ? $boxAlign = '' : $boxAlign = 'right'; ?>


                <div class="timeline-item">
                    <div class="timeline-icon flex_container flex_center"><i class="fa fa-map-marker"></i></div>
                    <div class="timeline-content {{$boxAlign}}">
                        <h2>{{ $job->title }}</h2>
                        {!! $job->article_text !!}
                    </div>
                </div>

                <?php $index+=1; ?>

            @endforeach

        </div>

    </section>
</div>