@extends('layouts.main')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <table id="dt-articles" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Intro text</th>
                            <th>Date created</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach ($articles as $key => $article)
                        <tr>
                            <td>{{$article->title}}</td>
                            <td>{{$article->intro_text}}</td>
                            <td>{{$article->created_at}}</td>
                            <td>{{$article->author}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Control Sidebar -->
@include('common.right-menu')