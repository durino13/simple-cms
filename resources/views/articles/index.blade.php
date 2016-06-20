@extends('layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a href="/article/create" class="button glow button-action"><i class="fa fa-save"></i> New article</a>
    <a href="#" class="button glow button-highlight"><i class="fa fa-close"></i> Close</a>
</div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>

                <div class="box-body">
                    <table id="dt-articles" class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td style="width: 10px;">
                                        <a class="btn btn-primary btn-sm" href="#navigation-main">
                                            <i class="fa fa-edit" aria-hidden="true" title="Skip to main navigation"></i>
                                            <span class="sr-only">Skip to main navigation</span>
                                        </a>
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>{{ $article->status->name }}</td>
                                    <td>{{ $article->created_at }}</td>
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
@include('common.right-menu')