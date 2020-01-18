@extends('Layouts.master')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$post->content}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$post->user->name}} {{$post->user->last_name}}</a>
                        on {{date_format($post->created_at,'F m d H:i:s')}}</p>
                </div>
            </div>
        </div>
        <hr>

        @if(count($post->comments))
        <div class="container">
            <div class="row justify-content-center mb-5">
                <h4 class="text-muted">Users comments:</h4>
            </div>
            @foreach($post->comments as $comment)
                <div class="row">
                    <div class="col-md-6 fa-pull-left">
                        <div class="post-preview">
                            <a href="">
                                <h6 class="post-heading">
                                    {{$comment->title}}
                                </h6>
                                <h6 class="post-subtitle">
                                    {{$comment->content}}
                                </h6>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">{{$comment->user->name}} {{$comment->user->last_name}}</a>
                                on {{date_format($comment->created_at,'F m d H:i:s')}}</p>

                            <p class="post-meta mt-0" id="comment-like-unlike-{{$comment->id}}">
                                @csrf
                                <input type="hidden" name="comment_id" id="comment_id_{{$comment->id}}" value="{{$comment->id}}">

                                <a href="" id="comment-like-{{$comment->id}}"><i onclick="Comment.commentLike(this, {{$comment->id}});return false;" class="fa fa-thumbs-up"></i></a>
                                <span class="text-primary" id="comment-like-value-{{$comment->id}}" class="like">{{$comment->likes->count()}}</span>|
                                <a href="" class="comment-unlike-{{$comment->id}}"><i onclick="Comment.commentLike(this, {{$comment->id}});return false;" class="fa fa-thumbs-down"></i></a>
                                <span class="text-danger" id="comment-unlike-value-{{$comment->id}}" class="unlike">{{$comment->unLikes->count()}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="col-md-12">
                        <div class=" text-center text-uppercase h4 font-weight-light">
                            Add comment
                        </div>
                        <form method="POST" action="{{route('comment')}}">
                            @csrf
                            <div class="card-body py-5">
                                <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}" class="form-control">

                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls">
                                        <label>Title</label>
                                        <input type="text" name="title" min="8" class="form-control" placeholder="Comment title" id="title" required data-validation-required-message="Please comment title.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group floating-label-form-group controls">
                                        <label for="content" class="form-control-label">Comment</label>
                                        <textarea type="text" id="content" name="content" placeholder="Comment" rows="5" class="form-control" required data-validation-required-message="Please comment."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection

@section('script')
    <script src="{{asset('admin/adminDashboardScript/Comment.js')}}"></script>
@endsection