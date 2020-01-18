<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentLike;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param CommentRequest $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, Comment $comment)
    {
        try {
            $comment::create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'post_id' => $request->get('post_id'),
                'user_id' => $request->user()->id,
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $test = $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function likeUnLike(Request $request): JsonResponse
    {
        try {
            $validateData = $request->validate([
                'comment_like' => 'required|boolean'
            ]);

            if ($validateData) {
                $like = $request->get('comment_like') === '1' ? 1 : 0;
                $unlike = $like === 1 ? 0 : 1;

                CommentLike::create([
                    'user_id' => $request->user()->id,
                    'comment_id' => $request->get('comment_id'),
                    'comment_like' => $like,
                    'comment_unlike' => $unlike,
                ]);

                return new JsonResponse(true, 200);
            }
        } catch (\Exception $e) {

        }
    }

    public function commentOwnerList(Comment $comment)
    {
        try {
            return view('admin.comment.comment-owner-list', [
                'comments' => $comment->commentOwnerList(Auth::id())
            ]);
        } catch (\Exception $e) {

        }
    }
}
