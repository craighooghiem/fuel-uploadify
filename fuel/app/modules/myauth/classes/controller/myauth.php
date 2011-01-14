<?php

namespace Myauth;

class Controller_Myauth extends \Controller_User {

    public function before()
    {
        parent::before();
    }

    public function action_index()
    {
        $this->template->title = 'Myauth &raquo Index';

        if (\Auth::check())
        {
            $this->template->content = "<p style='color: green'>You are logged in, you can <b>".\Html::anchor('uploadify', 'Upload')."</b> files now</p>";
        }
        else
        {
            $this->template->content = '<p style="color: red;">Not logged in.</p>';
        }
    }

    public function action_login()
	{
        if (\Auth::check())
        {
            // TODO
            //Output::redirect('login');
//            echo 'logged in';
        }

        // The same fields as the example above
        $val = \Validation::factory('myauth');
        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[20]');

        // run validation on just post
        if ($val->run())
        {
            $auth = \Auth::instance();

            if($auth->login($val->validated('username'), $val->validated('password')))
            {
                // logged in
                \Session::set_flash('notice', 'FLASH: logged in');
                \Output::redirect('myauth');
            }
            else
            {
                // wrong pass
                $data['username']    = $val->validated('username');
                $data['login_error'] = 'Wrong username/password combo. Try again';
            }
        }
        else
        {
            // validation failed
            if($_POST)
            {
                $data['username']    = $val->validated('username');
                $data['login_error'] = 'Wrong username/password combo. Try again';
            }
            else
            {
                $data['login_error'] = false;
            }
        }

        $this->template->title = 'Myauth &raquo Login';
		$this->template->login_error = @$data['login_error'];
		$this->template->content = \View::factory('login', $data);
	}

	public function action_logout()
	{
		\Auth::instance()->logout();

        \Session::set_flash('notice', 'FLASH: logged out');
        \Output::redirect('myauth');
	}

	public function action_register()
	{
        if ( \Auth::check())
        {
            \Session::set_flash('error', 'FLASH: Can\'t register while logged in, log out first.');
            \Output::redirect('myauth');
        }

        // The same fields as the example above
        $val = \Validation::factory('myauth2');
        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]');
//        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]|unique[simpleauth.username]');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[20]');
        $val->add_field('email', 'Email', 'required|valid_email');

        // run validation on just post
        if ($val->run())
        {
            if(\Auth::instance()->create_user($val->validated('username'), $val->validated('password'), $val->validated('email'), '100'))
            {
                \Session::set_flash('notice', 'FLASH: User created.');
                \Output::redirect('myauth');
            }
            else
            {
                throw new Exception('Smth went wrong while registering');
            }
        }
        else
        {
            // validation failed
            if($_POST)
            {
                $data['username']    = $val->validated('username');
                $data['login_error'] = 'All fields are required.';
            }
            else
            {
                $data['login_error'] = false;
            }
        }


		$this->template->title = 'Myauth &raquo Register';
        $this->template->login_error = @$data['login_error'];
		$this->template->content = \View::factory('register');
	}

	public function action_activate()
	{
        // TODO: needs to be done.
		$this->template->title = 'Myauth &raquo Activate';
		$this->template->content = View::factory('myauth/activate');
	}

}

/* End of file myauth.php */