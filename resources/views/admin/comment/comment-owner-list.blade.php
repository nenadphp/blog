@extends('admin.Layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="main-container">
            <div class="content">
                <div class="container">
                <div class="row">

                    <div class="col-md-12 mx-auto">
                        @foreach($comments as $comment)
                            <div id="comment-list-{{$comment->id}}" class="col-md-12 justify-content-center">
                                <div class="post-preview col-md-12">
                                    <a href="#">
                                        <h2 class="post-title">
                                            {{$comment->title}}
                                        </h2>
                                        <h3 class="post-subtitle">
                                            {{$comment->content}}
                                        </h3>
                                    </a>
                                    <p class="post-meta">Posted by
                                        <a href="#"></a>
                                        on {{date_format($comment->created_at,'F m d H:i:s')}}</p>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-outline-danger" onclick="Comment.commentDelete({{$comment->id}})">Delete</button>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('admin/adminDashboardScript/Comment.js')}}"></script>
@endsection