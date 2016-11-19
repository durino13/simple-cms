<?php use Illuminate\Support\Facades\Route; ?>
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
                    <h3 class="box-title">List of articles</h3>
                </div>

                <div class="box-body">

                    <?php

                    (Route::getFacadeRoot()->current()->uri() === 'administrator/article/archive') ? $idName = "dt-archive" : $idName = "dt-articles";

                    ?>

                    <table id={{ $idName }} class="table table-bordered table-hover" style="display:none">
                        <thead>
                        <tr>
                            {{--<th class="select-checkbox"></th>--}}
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Created</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($articles as $article)
                                <tr id="{{ $article->id }}">
                                    <td></td>
                                    <td>
                                        <a href="/administrator/article/{{ $article->id }}/edit">{{ $article->title }}</a><br/>
                                        <div class="text-sm">Alias: &nbsp;
                                            {{ $article->alias }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex-container">
                                            <div>
                                                {{ $article->author->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ ($article->categories->count() > 0) ? $article->categories->first()->name : "-" }}</td>
                                    <td style="text-align: center;">
                                        <?php echo isset($article->status->name) & $article->status->name === 'Published' ? '1' :  '2'  ?>
                                    </td>
                                    <td>{{ $article->updated_at }}</td>
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
{{--@include('admin.common.right-menu')--}}