@extends('layouts.main')
@section('content')

<div class="toolbar">
    <a href="#" class="button glow button-action"><i class="fa fa-save"></i> Save</a>
    <a href="#" class="button glow button-highlight"><i class="fa fa-close"></i> Close</a>
</div>

<div class="content">

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Article edit</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <div class="box-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Article text:</label>
                        <textarea name="article_text" class="form-control" id="article_text" cols="30" rows="15"></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date created:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker">
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection