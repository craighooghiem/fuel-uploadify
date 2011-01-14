##Fuel

* [Website](https://github.com/huglester/fuel-uploadify)
* Version: 0.0.1

## Description

Small application to show basic authentication examples inside modules, using SimpleAuth.
Also shows how FuelPHP handles session between user and flash. (Example done using Uploadify)

##Development Team

* Jaroslav Petrusevic

##Requirements
app/config/config.php changes:

* 'module_paths' => array(APPPATH.'modules'.DS),
* 'packages' => array('auth'), // inside always load
* 'index_file' => false, // disabled index.php in the links (optional):

#And here are some required core config changes:
core/config/session.php:

* 'match_ua' => false,
* 'post_cookie_name' => 'uploadify',


#The requirements:

* PHP 5.3 or greater
* Any web server

#SQL Schema here:
[http://fuelphp.com/docs/packages/auth/simpleauth.html](http://fuelphp.com/docs/packages/auth/simpleauth.html)

#notes
configure MySQL
create an account 
start uploading

##Donate

[Donate Here](http://www.pledgie.com/campaigns/14124)

Any donations would help support the framework and pay for software, development and hosting costs.   We understand if you cannot, but greatly appreciate anything you can give.