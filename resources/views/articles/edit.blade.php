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

    {{-- Open form --}}

    {{ Form::open(array('url' => 'article')) }}

    {{-- Toolbar --}}

    <div class="toolbar">
        <button class="button glow button-action"><i class="fa fa-save"></i> Save</button>
        <a href="#" class="button glow button-highlight"><i class="fa fa-close"></i> Close</a>
    </div>

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
                                    <?php echo Form::text('title','', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alias:</label>
                                    <?php echo Form::text('alias','', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Article text:</label>
                            <?php echo Form::textarea('article_text', '', ['id' => 'article_text', 'class' => 'form-control']); ?>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Status:</label>
                            <?php echo Form::select('status', App\Status::lists('name','id'), null, ['class' => 'chosen-select']); ?>
                        </div>

                        <div class="form-group">
                            <label>Category:</label>
                            <?php echo Form::select('status', App\Category::lists('name','id'), null, ['class' => 'chosen-select']); ?>
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