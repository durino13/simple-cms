@extends('admin.layouts.main')
@section('content')

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