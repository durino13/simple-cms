@extends('layouts.main')
@section('content')

    {{--Validation errors--}}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Open form--}}

    <?php if (isset($article)) { ?>
    {{ Form::model($article, ['method'=> 'put', 'route' => ['article.update', $article->id]]) }}
    <?php } else { ?>
    {{ Form::open(['url' => '/article']) }}
    <?php } ?>

    {{--Toolbar--}}

    <div class="toolbar">
        <button name="action" value="save_and_close" class="btn btn-success"><i class="fa fa-close"></i> Save & Close</button>
        <button name="action" value="save" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        <a id="article-close" href="#" class="btn btn-danger"><i class="fa fa-close"></i> Close</a>
    </div>

    {{--Content--}}

    <div class="content">

        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title">Article edit</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <?php echo Form::text('title', null, ['class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alias:</label>
                                    <?php echo Form::text('alias', null, ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Article text:</label>
                            <?php echo Form::textarea('article_text', null, ['id' => 'article_text', 'class' => 'form-control']); ?>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Status:</label>
                            <?php
                                $status_id = isset($article->status->id) ? $article->status->id : '';
                                echo Form::select('status', App\Status::lists('name','id'), $status_id, ['class' => 'chosen-select']);
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Category:</label>
                            <?php
                                $category_id = isset($article->category->id) ? $article->category->id : '';
                                echo Form::select('category', App\Category::lists('name','id'), $category_id, ['class' => 'chosen-select']);
                            ?>

                        </div>

                        <div class="form-group">
                            <label>Date created:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="date_created" type="text" class="form-control pull-right datepicker"
                                       id="date_created">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Start publishing:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="start_publishing" type="text" class="form-control pull-right datepicker"
                                       id="start_publishing">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Finish publishing:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="finish_publishing" type="text" class="form-control pull-right datepicker"
                                       id="finish_publishing">
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{ Form::close() }}

@endsection