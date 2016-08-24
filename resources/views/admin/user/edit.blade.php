@extends('admin.layouts.main')
@section('content')

    {{--Open form--}}

    <?php if (isset($user)) { ?>
    {{ Form::model($user, ['method'=> 'put', 'route' => ['administrator.user.update', $user->id]]) }}
    <?php } else { ?>
    {{ Form::open(['url' => route('administrator.user.index')]) }}
    <?php } ?>

    {{--Toolbar--}}

    <div class="toolbar">
        <button name="action" value="save_and_close" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save & Close</button>
        <button name="action" value="save" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
        <a id="form-close" href="#" class="btn btn-danger btn-sm" data-redirect="{{ route('administrator.user.index') }}"><i class="fa fa-close"></i> Close</a>
    </div>

    {{--Status & error messages--}}

    @include('admin.common.message')

    {{--Content--}}

    <div class="content">

        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title">User form</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name:</label>
                            <?php echo Form::text('name', null, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email:</label>
                            <?php echo Form::text('email', null, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password:</label>
                            <?php echo Form::password('password', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{ Form::close() }}

@endsection