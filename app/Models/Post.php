<?php

/**
 * Copyright (c) 2017 Gouda Elalfy, All Rights Reserved.
 *
 * @author        Gouda Elalfy <goudaelalfy@hotmail.com>
 * @link          http://stackoverflow.com/users/4675055/gouda-elalfy
 * @version       1.0
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Post model class
 *
 * The model class is a model layer (in MVC), through this class I can access the database
 * and make manipulation process on posts table.
 */
class Post extends MyModel
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $fillable = ['user_id', 'title', 'content'];

	/**
	 * user function
	 * 
	 * Any post will related to the user, and this function to return user object.
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
}
