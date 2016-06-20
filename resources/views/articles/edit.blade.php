@extends('layouts.main')
@section('content')

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
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alias:</label>
                                    <input name="alias" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Article text:</label>
                            <textarea name="article_text" class="form-control" id="article_text" cols="30"
                                      rows="15"></textarea>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Status:</label>
                            <select name="status" id="status" class="chosen-select">
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category:</label>
                            <select name="category" id="category" class="chosen-select">
                                <option value="1">Category name 1</option>
                                <option value="2">Category name 2</option>
                            </select>
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