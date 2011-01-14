<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo @$title; ?></title>
	<style type="text/css">
		body { background-color: #F2F2F2; margin: 45px 0 0 0; font-family: ‘Palatino Linotype’, ‘Book Antiqua’, Palatino, serif; font-size: 18px }
		#wrapper { width: 740px; margin: 0 auto; }
		h1 { color: #333333; font: normal normal normal 62px/1em Impact, Charcoal, sans-serif; margin: 0 0 15px 0; }
		pre { padding: 15px; background-color: #FFF; border: 1px solid #CCC; font-size: 16px;}
		#footer p { font-size: 14px; text-align: right; }
		a { color: #000; }
	</style>

    <?php echo Asset::render('layout');?>
    
</head>
<body>
	<div id="wrapper">
		<h2>Uploadify demo application</h2>
        <h1><?php echo @$title; ?></h1>

        <div style="color: green;"><?php echo @\Session::get_flash('notice');?></div>
        <div style="color: red;"><?php echo @\Session::get_flash('error');?></div>

        <p>
        <?php echo Html::anchor('', 'index');?>
        <?php if( ! $logged_in) echo ' | '.Html::anchor('myauth/login', 'Login');?>
        <?php if($logged_in) echo ' | '.Html::anchor('myauth/logout', 'Logout');?>
        <?php if($logged_in) echo ' | '.Html::anchor('uploadify', 'Uploadify');?>
        <?php if( ! $logged_in) echo ' | '.Html::anchor('myauth/register', 'Register');?>
        </p>
        
        <div style="color: red;"><?php echo @$login_error?></div>

		<div id="content">
			<?php echo @$content; ?>
		</div>
        
        <div id="footer">
            <p>
                <a href="http://fuelphp.com">Fuel PHP</a> is released under the MIT license.<br />
                Executed in {exec_time}s using {mem_usage}mb of memory.<br>
            </p>
        </div>
	</div>
</body>
</html>