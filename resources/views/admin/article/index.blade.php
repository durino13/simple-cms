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
                    <table id="dt-articles" class="table table-bordered table-hover" style="display:none">
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
                            <th>Actions</th>
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
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td></td>
                                    <td>
                                        <a href="/administrator/article/{{ $article->id }}/edit">{{ $article->title }}</a><br/>
                                        <span class="text-sm">Alias: &nbsp;
                                            {{ $article->alias }}
                                        </span>
                                    </td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>{{ ($article->categories->count() > 0) ? $article->categories->first()->name : "-" }}</td>
                                    <td>
                                        <?php echo isset($article->status->name) & $article->status->name === 'Published' ? '1' :  '2'  ?>
                                    </td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        @include('admin.article.actions')
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