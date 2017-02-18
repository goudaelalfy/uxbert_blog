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
 * User model class
 * 
 * The model class is a model layer (in MVC), through this class I can access the database
 * and make manipulation process on user table.
 */
class User extends MyModel
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = ['first_name', 'last_name', 'email', 'password', 'active', 'remember_token'];
    
}
