<?php

namespace Uploadify;

class Controller_Uploadify extends \Controller_User {

    public function before()
    {
        parent::before();

        if ( ! \Auth::check())
        {
            \Output::redirect('myauth');
        }

        \Asset::remove_path('assets/');
        \Asset::add_path('assets/uploadify/');

        $this->template->css = \Asset::css(array('style.css'), array(), 'layout', false);
        $this->template->js = \Asset::js(array('jquery-1.3.2.min.js', 'swfobject.js', 'jquery.uploadify.v2.1.0.min.js', 'jquery.application.js'), array(), 'layout', false);

    }
    
    public function action_index()
    {
        //$data['url'] = '/uploadify/do_upload';
        $this->template->title = 'Uploadify &raquo Index';
		$this->template->content = \View::factory('index');
    }

    public function show_form()
    {

//        $this->render('index', $data);
    }

    public function action_do_upload()
    {
        logger('1', 'Starting upload');
        \Upload::process(array(
            'path' => './uploads',
            'normalize' => true,
            'change_case' => 'lower'
        ));
        logger('1', 'Finished upload');
        echo "<pre>";
        print_r(\Upload::get_files());
        print_r(\Upload::get_errors());
        logger('1', 'Errors: '.serialize(\Upload::get_errors()));
        echo \Upload::is_valid() ? "<span style='color: green; font-weight: bold;'>VALID</span>" : "<span style='color: red; font-weight: bold;'>ERROR</span>";
        echo '<br><br><br>';
        \Upload::save();
        echo 'Valid:<br>';
        print_r(\Upload::get_files());
        logger('1', 'Valid uploads: '.serialize(\Upload::get_files()));
        echo '<br>Errors:<br>';
        print_r(\Upload::get_errors());
        echo "</pre>";

    }
}

function list_dir($dir_handle,$path) {
    global $listing;
    echo "<ul>";
    while (false !== ($file = readdir($dir_handle))) {
      $dir =$path . $file;
      if(is_dir($dir) && $file != '.' && $file !='..' ) {
            $handle = @opendir($dir) or die("Unable to open file $file");
            echo "<li>".$dir;
            ListDir($handle, $dir);
            echo "</li>";
      } elseif($file != '.' && $file !='..' && $file !='.htaccess') {
            echo '<li><a href="'. $dir .'">'.$file.'</a></li>';
      }
    }
    echo "</ul>";
    closedir($dir_handle);
}