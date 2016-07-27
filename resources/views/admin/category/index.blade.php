@extends('admin.layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a href="/administrator/category/create" class="btn btn-success btn-sm"><span class="fa fa-plus-circle"></span> New category</a>
</div>

{{--Status & error messages--}}

@include('admin.common.message')

{{--Content--}}

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Category list</h3>
                </div>

                <div class="box-body">
                    <table id="dt-categories" class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Updated</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td><a href="/administrator/category/{{ $category->id }}/edit">{{ $category->name }}</a></td>
                                    <td>{{ $category->code }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
                                                <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#"><span class="fa fa-archive"></span>Archive</a></li>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <li><a href="{{ route('administrator.category.destroy', $category->id) }}" data-redirect="{{ route('administrator.category.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Trash</a></li>
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