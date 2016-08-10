@extends('admin.layouts.main')
@section('content')

{{-- Toolbar --}}

<div class="toolbar">
    <a href="/administrator/article/create" class="btn btn-success btn-sm"><span class="fa fa-plus-circle"></span> New article</a>
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
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <a href="/administrator/article/{{ $article->id }}/edit">{{ $article->title }}</a><br/>
                                        <span class="text-sm">Category:&nbsp;&nbsp;{{ $article->category->name }}</span>
                                    </td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>
                                        <?php echo isset($article->status->name) & $article->status->name === 'Published' ? '1' :  '2'  ?>
                                    </td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
                                                <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                @if($currentURL === 'administrator/article')
                                                <li><a href="{{ route('administrator.archive.archive', $article->id) }}" data-redirect="{{ route('administrator.article.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-archive"></span>Archive</a></li>
                                                @endif
                                                @if($currentURL === 'administrator/archive' || $currentURL === 'administrator/trash')
                                                <li><a href="{{ route('administrator.archive.restore', $article->id) }}" data-redirect="{{ route('administrator.archive.index') }}" class="jquery-postback"><span class="fa fa-recycle"></span>Restore</a></li>
                                                @endif
                                                @if (($currentURL === 'administrator/article') || ($currentURL === 'administrator/archive'))
                                                <li><a href="{{ route('administrator.article.destroy', $article->id) }}" data-redirect="{{ route('administrator.trash.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Trash</a></li>
                                                @endif
                                                @if ($currentURL === 'administrator/trash')
                                                    <li><a href="{{ route('administrator.trash.wipe', $article->id) }}" data-redirect="{{ route('administrator.trash.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Completely delete</a></li>
                                                @endif
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