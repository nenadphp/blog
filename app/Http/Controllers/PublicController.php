<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Display main view
     *
     * @param Post $post
     * @return View
     */
    public function index(Post $post): View
    {
        return view('welcome', ['posts' => $post->posts()]);
    }

    /**
     * Display about view
     *
     * @return View
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Display contact view
     *
     * @return View
     */
    public function contact(): View
    {
        return view('contact');
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
