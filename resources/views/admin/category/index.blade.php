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
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="/administrator/category/{{ $category->id }}/edit">{{ $category->name }}</a>
                                        <div class="text-sm">Articles in category: &nbsp;
                                            {{ $category->articles->count() }}
                                        </div>
                                    </td>
                                    <td>{{ $category->code }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>{{ $category->created_at }}</td>
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