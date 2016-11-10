@extends('admin.layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a id="new_article" href="/administrator/article/create" class="btn btn-success btn-sm"><span class="fa fa-plus-circle"></span> New article</a>
</div>

{{--Status & error messages--}}

@include('admin.common.message')

{{--Content--}}

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Trashed items</h3>
                </div>

                <div class="box-body">
                    <input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}" >
                    <table id="dt-trash" class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Trashed</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Trashed</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($items as $item)
                                <tr id="{{ $item->id }}">
                                    <td></td>
                                    <td>
                                        <a href="/administrator/article/{{ $item->id }}/edit">{{ $item->title }}</a><br/>
                                        <div class="text-sm">Alias: &nbsp;
                                            {{ $item->alias }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->trashDocumentType() }}
                                    </td>
                                    <td>{{ $item->trashedAt() }}</td>
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