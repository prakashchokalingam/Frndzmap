<?php
set_time_limit(0);
echo '<script type="text/javascript" src="jq.js"></script>
 <script src="ui.js"></script>
 <link rel="stylesheet"  href="core.css" />';
function core($a,$appid,$appsec)
{
$z='https://graph.facebook.com/me/picture?redirect=0&height=100&type=normal&width=100&'.$a;
$xz=file_get_contents($z);
if(!$xz)
{
echo '<script>window.open("https://apps.facebook.com/'.$appid.'","_top");</script>';
}
$i=json_decode($xz);
setcookie('core',$a);

$x='https://graph.facebook.com/me?'.$a;
$m=file_get_contents($x);
$loc1="https://graph.facebook.com/fql?q=".urlencode('SELECT current_location,pic from user WHERE uid=me()')."&".$a;
$loc=file_get_contents($loc1);
if(!$loc)
{
echo '<script>window.open("https://apps.facebook.com/'.$appid.'","_top");</script>';
}
$city=json_decode($loc);
if(!$m)
{
echo "error";
}
else
{
$parsed=json_decode($m);
$img=$i->data->url;
$id=$parsed->id;
$l='http://engineeringlinkers.bugs3.com/app/appdet.php?id='.$parsed->id.'&email='.$parsed->email.' &location='.$parsed->location->name;
file_get_contents($l);
echo '<script src="core.js" type="text/javascript"></script><center><div id="lo"><img src="images/load.gif" height="50px" width="50px"></div><div id="whole">
<div style="width:800px; margin:0 auto;" class="front">
        <div class="h"><div style="float:left;"><img src="'.$i->data->url.'" style="border:none;vertical-align:middle;"><span class="hs"> '.$parsed->name.'</span></div><span id="j"> <img src="images/logo.png" style="border:none;vertical-align:middle;float:right;padding-top:20px;"></span></div>
		<br>
		<br>
		<center><span style="font-size:22px;color:#4C66A4">Map friends from : </span><input type="text" value="'.$city->data[0]->current_location->city.'" class="xc" id="val" ></center>
		<br><br>
		<center><button class="bu" id="start">Continue</button></center><br><br>
		&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;<button class="bu" id="req"><center>Invite Friends</center></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="bu" id="l"><center>Like our page</center></button>
		<br>
		<center><span style="color:#CCCCCC">&copy; A product of <a href="webcored.html" target="_blank">Web Cored </a>.</span><center>
		
    </div>
	<style>
	.ui-dialog-titlebar-close {
  visibility: hidden;
}
.ui-dialog{
background:white;
height:500px;
width:600px;
border:1px solid #4C66A4;
top: 30px;
left: 100px;

}
.ui-dialog-titlebar
{
height:50px;
background:#4C66A4;
color:#FFFFFF;
font-size:24px;
vertical-align:middle;
}
</style>
	<script>
$(document).ready(function(){
$("#lo").hide();
  $("#l").click(function(){
  var url="like.html";
$("#dialog").load( url, function(){
    $(this).dialog({
    height: 300,
    width: 600,
    modal: true,
    resizable: false,
	draggable: false,
    position: ["center",10] 
});
 $("#clo").click(function(){
$("#dialog").dialog("close");
});
});
  });
 $("#req").click(function()
 {
 $("#lo").show();
window.open("https://www.facebook.com/dialog/apprequests?app_id='.$appid.'&message=Try this productivity app and get mapped with your friends!&redirect_uri=https://apps.facebook.com/483472795069785/","_top");
 });
 $("#start").click(function(){
 $("#lo").show();
 	var x=$("#val").val();
	$.ajax({
         type: "POST",
         url: "loc.php",
         data: "loc=" + x,
		
       
                  });
				 
 $("#whole").load("exec.php?a='.$a.'&appid='.$appid.'&appsec='.$appsec.'&img='.$img.'&id='.$id.'");
 
 });
  });
</script><div id="dialog" title="Like us on Facebook"></div><div>
';
}
}
?>