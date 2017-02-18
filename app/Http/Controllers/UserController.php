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
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * UsersController class
 *
 * The controller class is a acontroller layer (in MVC), through this class I can control
 * the User model class  and display all views of User entity.
 */

class UserController extends MyController
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
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function create()
	{
		return view('user.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$inputs = $request->all();

		$this->validate($request, [
            'email'                 => 'required|unique:users|email|min:3|max:255',
            'password'              => 'required|min:8|max:20|confirmed',
            'password_confirmation'	=> 'required|min:8|max:20',
            'first_name'            => 'required|min:3|max:20',
            'last_name'           	=> 'required|min:3|max:20',
		//'g-recaptcha-response'  => 'required|recaptcha'
		]);

		$email = User::where('email', $inputs['email'])->first();
		if (null != $email) {
			Session::flash('error_message', trans('user.user_with_email').$inputs['email'].trans('users.already_exists'));
			return redirect('user/register');
		}

		$inputs ['password']   = Hash::make($request->input('password'));

		$remember_token         = md5(rand());
		$inputs['remember_token'] = $remember_token;

		$user = User::create($inputs);

		if ($user->id) {

			$email_subject = trans('user.activation_email_subject');
			$email_body = trans('user.activation_email_body');

			try {
				Mail::send('emails.registration', ['user' => $user, 'email_body' => $email_body], function($m) use($user, $email_subject) {
					$m->from($this->default_from_email, $this->default_from_sender_name);
					$m->to($user->email, $user->first_name.' '.$user->last_name)->subject($email_subject);
				});
			} catch(\Swift_TransportException $e) {
				$err_msg = $e->getMessage();
				Session::flash('error_message', $err_msg);
				return redirect('user/register');
			}


			Session::flash('success_message', trans('user.success_register_message'));
			return redirect('user/register');
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
	 * Login with email address and password
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function login(Request $request)
	{

		if($request->input('email')) {
			$this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
			]);

			$email    = $request->input('email');
			$password = $request->input('password');

			$user = User::whereEmail($email)->first();

			if (!$user) {
				Session::flash('error_message', trans('user.error_credentials'));
				return redirect('user/login');
			}

			if (Hash::check($password, $user->password)) {
				if ($user->active == 1) {
					Session::put('user_id', $user->id);
					Session::put('user_first_name', $user->first_name);
					Session::put('user_last_name', $user->last_name);
					return redirect('/');
				} else {
					Session::flash('error_message', trans('user.inactive_user'));
					return redirect('user/login');
				}
			} else{
				Session::flash('error_message', trans('user.error_credentials'));
				return redirect('user/login');
			}
		} else {
			return view('user.login', compact(''));
		}
	}

	/**
	 * Logout method to fire the session of current user
	 *
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function logout()
	{
		//By Gouda
		Session::forget('user_id');
		Session::forget('user_first_name');
		Session::forget('user_last_name');

		return redirect('/');
	}

	/**
	 * Active method to activate the user account through link is sent to
	 * the user email address
	 *
	 * @param  string  $token
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function activate($remember_token)
	{
		$user = User::whereRememberToken($remember_token)->first();
		if($user) {
			if($user->active == 1) {
				Session::flash('error_message', trans('user.error_activation'));
				return redirect('/');
			} else {
				$input['active']=1;
				$user->update($input);

				Session::flash('success_message', trans('user.success_activation'));
				Session::put('user_id', $user->id);
				Session::put('user_first_name', $user->first_name);
				Session::put('user_last_name', $user->last_name);
				return redirect('/');
			}
		} else {
			Session::flash('error_message', trans('user.error_token'));
			return redirect('/');
		}
	}

	/**
	 * forgetPassword method to display form with email address to enable the user restore
	 * his password
	 *
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function forgetPassword()
	{
		return view('user.forget_password');
	}

	/**
	 * sendPassword method to send reset password link to user email address
	 *
	 * @param Request $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function sendPassword(Request $request)
	{
		$this->validate($request, [
            'email' => 'required|email|max:255'
            ]);

        $email     = $request->input('email');
        $user = User::whereEmail($email)->first();

        if (!$user) {  //check if user exists
        	Session::flash('error_message', trans('user.invalid_reset_email'));
        	return redirect('user/forgetPassword');
        } else {
        	$random      = substr(md5(rand()), 0, 7);
        	$remember_token       = $request->input('_token').$random;
			$input['remember_token']=$remember_token;
			$user->update($input);
			
			$email_subject = trans('user.reset_password_email_subject');
        	try{
        		Mail::queue('emails.reset_password', ['user' => $user, 'remember_token' => $remember_token], function ($message) use ($user, $email_subject) {
        			$message->from($this->default_from_email, $this->default_from_sender_name);
        			$message->to($user->email, $user->first_name)->subject($email_subject);
        		});
        		Session::flash('success_message', trans('user.reset_password_email_sent_successfully'));
        		return redirect('/');
        	} catch ( \Swift_TransportException $e) {
        		$err_msg = $e->getMessage() ;
        		Session::flash('error_message', $err_msg);
        		return redirect('/');
        	}
        }
	}

	/**
	 * resetPassword method enable user enter his new password to reset it
	 *
	 * @param $token
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function resetPassword($remember_token)
	{
		return view('user.reset_password', compact('remember_token'));
	}

	/**
	 * updatePassword method to the user password after verification through his email
	 * address
	 *
	 * @param Request $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function updatePassword(Request $request)
	{
		$this->validate($request, [
            'password'              => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255',
		]);

		$password = Hash::make($request->input('password'));
		$remember_token    = $request->input(('remember_token'));

		$user = User::whereRememberToken($remember_token)->first();
		if($user) {
			$input['active']=1;
			$input['password']=$password;
			$user->update($input);

			Session::flash('success_message', trans('user.reset_password_done'));
			Session::put('user_id', $user->id);
			Session::put('user_first_name', $user->first_name);
			Session::put('user_last_name', $user->last_name);
			return redirect('/');
		} else {
			Session::flash('error_message', trans('user.error_token'));
			return redirect('/');
		}
	}
}
