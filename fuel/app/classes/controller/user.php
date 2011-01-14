<?php

class Controller_User extends Controller_Template {

    public function before()
    {
        parent::before();

        $this->template->login_error = null;
        
        if (\Auth::check())
        {
            $user = Auth::instance()->get_user_id();

            $this->user_id = $user[1];

            $this->template->logged_in = true;
        }
        else
        {
            $this->template->logged_in = false;
        }
        
        $this->template->css = null;
    }
}