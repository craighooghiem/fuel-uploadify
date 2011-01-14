<p>Please login:</p>

<form name="register" action="/myauth/login" method="post" accept-charset="utf-8">
username: <input type="text" name="username" value="<?php echo @$username;?>" /><br />
password: <input type="password" name="password" /><br />

<input type="submit" value="Submit" />
</form>