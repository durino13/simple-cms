@extends('layouts.main')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                    <div class="box-tools pull-right">
                        <a href="/article/1/edit" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-block btn-info btn-xs">Success</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->
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
                                    {{--<td></td>--}}
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
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Control Sidebar -->
@include('common.right-menu')