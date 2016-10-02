@extends('admin.layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a href="{{ route('administrator.user.create') }}" class="btn btn-success btn-sm"><span class="fa fa-plus-circle"></span> New user</a>
</div>

{{--Status & error messages--}}

@include('admin.common.message')

{{--Content--}}

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">User list</h3>
                </div>

                <div class="box-body">
                    <table id="dt-categories" class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Updated</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('administrator.user.edit', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
                                                <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <li><a href="{{ route('administrator.user.destroy', $user->id) }}" data-redirect="{{ route('administrator.user.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Trash</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Control Sidebar -->
@include('admin.common.right-menu')