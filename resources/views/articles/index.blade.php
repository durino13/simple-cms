@extends('layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a href="/article/create" class="btn btn-success"> New article</a>
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
                                        <a class="btn btn-primary btn-sm btn-action" href="/article/{{ $article->id }}/edit">
                                            <i class="fa fa-edit" aria-hidden="true" title="Edit article"></i>
                                        </a>
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>
                                        <?php echo isset($article->status->name) & $article->status->name === 'Published' ? '1' :  '2'  ?>
                                    </td>
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