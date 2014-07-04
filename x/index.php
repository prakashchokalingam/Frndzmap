<?php
set_time_limit(0);
echo '<link href="core.css" rel="stylesheet" />';
$code=$_GET['code'];
$appid='483472795069785';
$appsec='612b75b67bb6b03fbf1bb0cdf2f18a28';
$re='https://apps.facebook.com/483472795069785/x/';
$a='https://graph.facebook.com/oauth/access_token?code='.$code.'&client_id='.$appid.'&client_secret='.$appsec.'&redirect_uri='.$re;
$x=file_get_contents($a,true);
if($x==false)
{
echo "not valid";
echo '<script>window.open("https://apps.facebook.com/483472795069785/","_top");</script>';
}
else
{
echo '<body>';
include 'core.php';
core($x,$appid,$appsec);
echo '</body>';
}




?>

