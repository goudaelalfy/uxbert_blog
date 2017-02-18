<?php

/**
 * Copyright (c) 2017 Gouda Elalfy, All Rights Reserved.
 *
 * @author        Gouda Elalfy <goudaelalfy@hotmail.com>
 * @link          http://stackoverflow.com/users/4675055/gouda-elalfy
 * @version       1.0
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

/**
 * PostController class
 *
 * The controller class is a acontroller layer (in MVC), through this class I can control
 * the Post model class  and display all views of Post entity.
 */
class PostController extends MyController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function index()
	{

		$post_rows = new Post();
		$post_rows = $post_rows->with('user');
		$post_rows = $post_rows->orderBy($this->default_order_by_column,$this->default_order_by_type)
		->paginate($this->rows_per_page);
		return view('post.index', compact('post_rows'));
	}

	/**
	 * userPosts method to display the current login user posts.
	 *
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function userPosts()
	{
		if(\Session::get('user_id')) {
			$post_rows = new Post();
			$post_rows = $post_rows->with('user');
			$post_rows = $post_rows->where('user_id',\Session::get('user_id'));
			$post_rows = $post_rows->orderBy($this->default_order_by_column,$this->default_order_by_type)
			->paginate($this->rows_per_page);
			$user_posts=true;
			return view('post.index', compact('post_rows','user_posts'));
		} else {
			Session::flash('error_message', trans('post.login_to_add_edit_posts'));
			return redirect('user/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function create()
	{
		if(\Session::get('user_id')) {
			return view('post.form');
		} else {
			Session::flash('error_message', trans('post.login_to_add_edit_posts'));
			return redirect('user/login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		if(\Session::get('user_id')) {
			$inputs = $request->all();

			$this->validate($request, [
            'title'            		=> 'required|min:2|max:255',
            'content'           	=> 'required',
			]);

			$inputs ['user_id']   = \Session::get('user_id');
			$post = Post::create($inputs);

			Session::flash('success_message', trans('post.added_successfully'));
			return redirect('post/userPosts');
		} else {
			Session::flash('error_message', trans('post.login_to_add_edit_posts'));
			return redirect('user/login');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function show($id)
	{
		$post = new Post();
		$post = $post->with('user');
		$post = $post->findOrFail($id);
		return view('post.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function edit($id)
	{
		if(\Session::get('user_id')) {
			$post = new Post();
			$post = $post->with('user');
			$post = $post->findOrFail($id);
			return view('post.form', compact('post'));
		} else {
			Session::flash('error_message', trans('post.login_to_add_edit_posts'));
			return redirect('user/login');
		}
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
		if(\Session::get('user_id')) {
			$inputs = $request->all();

			$this->validate($request, [
            'title'            		=> 'required|min:2|max:255',
            'content'           	=> 'required',
			]);

			$post = Post::findOrFail($id);
			$post = $post->update($inputs);

			Session::flash('success_message', trans('post.updated_successfully'));
			return redirect('post/userPosts');
		} else {
			Session::flash('error_message', trans('post.login_to_add_edit_posts'));
			return redirect('user/login');
		}
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
}
