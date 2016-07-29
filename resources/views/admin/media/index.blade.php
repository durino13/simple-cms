@extends('admin.layouts.main')
@section('content')

{{--Toolbar--}}

<div class="toolbar">
    <button name="action" value="save_and_close" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Upload</button>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Media library</h3>
                </div>

                <div class="box-body">
                    @include('admin.media.common')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection