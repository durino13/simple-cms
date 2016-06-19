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
                            <th>Title</th>
                            <th>Author</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->author->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Control Sidebar -->
@include('common.right-menu')