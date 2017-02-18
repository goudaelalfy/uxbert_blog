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

/**
 * MyController model class
 * 
 * It is the base controller of blog application where all other controllers will extend, 
 * this for the global functions may be needed for multiple times and called every where.
 */

class MyController extends Controller
{
	
	protected $rows_per_page;
	protected $default_order_by_column;
	protected $default_order_by_type;
	
	protected $default_from_email;
	protected $default_from_sender_name;
	
	/**
	 * MyController constructor.
	 */
	public function __construct()
	{
		$this->rows_per_page = 10;
		$this->default_order_by_column='created_at';
		$this->default_order_by_type='desc';
		$this->default_from_email='goudaelalfy@hotmail.com';
		$this->default_from_sender_name='UXBERT';
	}
	
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
