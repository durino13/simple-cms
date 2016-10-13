@extends('admin.layouts.main')
@section('content')

    {{--Open form--}}

    <?php if (isset($article)) { ?>
        {{ Form::model($article, ['method'=> 'put', 'route' => ['administrator.article.update', $article->id]]) }}
    <?php } else { ?>
        {{ Form::open(['url' => '/administrator/article']) }}
    <?php } ?>

    {{--Toolbar--}}

    <div class="toolbar">
        <button id="save_and_close" name="action" value="save_and_close" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save & Close</button>
        <button id="save" name="action" value="save" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
        <a id="form-close" href="#" class="btn btn-danger btn-sm" data-redirect="/administrator/article"><i class="fa fa-close"></i> Close</a>
    </div>

    {{--Status & error messages--}}

    @include('admin.common.message')

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
                            <label>Categories:</label>
                            <?php
                                if (isset($article)) {
                                    $categories = $article->categories()->get()->pluck('id')->toArray();
                                } else {
                                    $categories = [];
                                }
                                echo Form::select('categories[]', App\Category::all()->pluck('name','id'), $categories, ['id' => 'categories','multiple']);
                            ?>

                        </div>

                        <div class="form-group">
                            <label>Start publishing:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php
                                    $start_publishing = !empty($article->start_publishing) ? null : \Carbon\Carbon::now()->toDateTimeString();
                                    echo Form::datetime('start_publishing', $start_publishing, ['id' => 'start_publishing', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Finish publishing:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php
                                    $finish_publishing = !empty($article->finish_publishing) ? null : \Carbon\Carbon::now()->addYears(10)->toDateTimeString();
                                    echo Form::datetime('finish_publishing', $finish_publishing, ['id' => 'finish_publishing', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Date updated:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php
                                    $updated_at = !empty($article->updated_at) ? null : \Carbon\Carbon::now()->toDateTimeString();
                                    echo Form::datetime('updated_at', $updated_at, ['disabled', 'id' => 'updated_at', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Date created:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php
                                    $created_at = !empty($article->created_at) ? null : \Carbon\Carbon::now()->toDateTimeString();
                                    echo Form::datetime('created_at', $created_at, ['disabled', 'id' => 'created_at', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{ Form::close() }}

    <form style="display:none" id="fileUploadForm" method="post">
        <input id="juraj" type="hidden" name="_token" value="{{ csrf_token() }}" >
        <input id="fileUploader" type="file" name="fileUpload"  />
    </form>

@endsection