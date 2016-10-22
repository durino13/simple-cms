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
                    <table id="dt-trash" class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Trashed</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Trashed</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($items as $item)
                                <tr id="{{ $item->id }}">
                                    <td></td>
                                    <td>{{ $item->trashTitle() }}</td>
                                    <td>
                                        {{ $item->trashDocumentType() }}
                                    </td>
                                    <td>{{ $item->trashedAt() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button id="actions_container_{{ $item->id }}" type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
                                                <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <li><a href="{{ route('administrator.trash.restore', $item->id) }}" data-redirect="{{ route('administrator.trash.index') }}" class="jquery-postback"><span class="fa fa-recycle"></span>Restore</a></li>
                                                <li><a href="{{ route('administrator.trash.destroy', $item->id) }}" data-redirect="{{ route('administrator.trash.index') }}" class="jquery-postback"><span class="fa fa-trash"></span>Completely delete</a></li>
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