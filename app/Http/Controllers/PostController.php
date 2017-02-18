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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
}
