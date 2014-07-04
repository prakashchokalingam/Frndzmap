<script>
function n(a)
{

$("#s" + a).slideToggle(1000);

}
function v(a)
{

$("#s" + a).hide(500);

}
</script><style>

#gmap
{
height:375px;
width:600px;
background:white;
padding:1px;
border-radius:3px;
float:left;
position:fixed;
}
#details
{
background:white;
width:320px;
height:375px;
border-radius:3px;
overflow:x-hidden;
float:left;
}
#sp
{
float:left;
}
#sc
{
overflow:auto;
float:left;
background:white;
width:360px;
border-left:5px solid #E9EAED;
}
#l
{
color:#3B5998;
width:320px;
height:40px;
cursor:pointer;
}
#l:hover
{
background:#3B5998;
color:#FFFFFF;
}
#l div
{
background:#3B5998;
color:white;
width:320px;
height:300px;
}
hr{
border:solid 1px #E9EAED;
}
</style><?php
set_time_limit(0);
include 'km.php';
$re=$_COOKIE['loc'];
if(!$re)
{
echo '<script>window.open("https://apps.facebook.com/483472795069785","_top");</script>';
}
else
{
$a=$_COOKIE['core'];
$fql="SELECT name,uid,current_location,pic,username,sex,profile_url,mutual_friend_count,pic_square,online_presence FROM   user WHERE  uid IN (SELECT uid2 FROM friend WHERE uid1 =me()) AND current_location.city='".$re."' ORDER BY name";
$graph_url = "https://graph.facebook.com/fql?q=".urlencode($fql)."&".$a; 
$f1=file_get_contents($graph_url);
$f2=json_decode($f1);
foreach ($f2 as $f3);
$i=count($f3);
$d="SELECT current_location FROM user WHERE uid=me()";
$mee="https://graph.facebook.com/fql?q=".urlencode($d)."&".$a;
$ixc=file_get_contents($mee);
$me=json_decode($ixc);
$lat=$me->data[0]->current_location->latitude;
$long=$me->data[0]->current_location->longitude;
$qu="'";
if($i!==0)
{
echo '<script src="//maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7">
</script>
<script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="map.js"></script>
<center><div id="load"><img src="images/load.gif" height="50px" width="50px"></div></center>
<center><div id="gmap"></div><div id="sc"><div id="details"><center><div style="color:#3B5998;
padding:3px;
width:320px;"> Result found : '.$i.'</div><hr>';
for($k=0;$k<$i;$k++)
{
$online="'images/".$f2->data[$k]->online_presence.".jpg'";
$y="'".$k."'";
echo '<div id="l"><span id="'.$k.'" onclick="n('.$y.');" style="float:left;"><img src='.$online.'><img src="'.$f2->data[$k]->pic_square.'" height="30px" width="30px">'.$f2->data[$k]->name.'</span><br>
         <div id="s'.$k.'" style="display:none;" onclick="v('.$y.');" ><table style="color:white;float:left;"><tr><td><img src="'.$f2->data[$k]->pic.'" height="50px" width="50px"></td><td>'.$f2->data[$k]->name.'</td></tr><tr><td>Status:</td><td><img src='.$online.'>&nbsp;'.$f2->data[$k]->online_presence.'</td></tr><tr><td>Gender :</td><td>'.$f2->data[$k]->sex.'</td></tr><tr><td>Mutual friends :</td><td>'.$f2->data[$k]->mutual_friend_count.'</td></tr><tr><td>Profile url :</td><td><a href="'.$f2->data[$k]->profile_url.'" target="_blank" style="color:white;">'.$f2->data[$k]->profile_url.'</a></td></tr><tr><td>Send Message:</td><td><a href="#" onclick="window.open('.$qu.'http://www.facebook.com/dialog/send?app_id=483472795069785&to='.$f2->data[$k]->username.'&link=https://apps.facebook.com/483472795069785/&redirect_uri=https://apps.facebook.com/483472795069785/'.$qu.','.$qu.'_blank'.$qu.','.$qu.'height=500px,width=900px'.$qu.'
);" style="color:white;">click to send</a></td></tr><tr><td>Distance from your current Location :</td><td>('.$f2->data[$k]->current_location->name.')'.km($lat,$long,$f2->data[$k]->current_location->latitude,$f2->data[$k]->current_location->longitude).' KM</td></tr><tr><td></td><td>click to disappear</td></tr></table></div></div><hr>';
}
echo'</center>
</div></div>

<div id="controls"></div>

<script type="text/javascript">
$(document).ready(function() {
    function map(){
	new Maplace({
	show_markers: true,
	locations: [
	';

      
	   echo '{
		lat:'.$f2->data[0]->current_location->latitude.', 
		lon:'.$f2->data[0]->current_location->longitude.',
		zoom: 8,
		icon:"'.$f2->data[0]->pic_square.'",
		title:"'.$f2->data[0]->name.'",
		html: "'.$i.' found in '.$f2->data[0]->current_location->city.'",
		show_infowindow: false,
	},';
	
	echo']
}).Load(); 
}

setTimeout(function(){$("#load").hide(); map(); },1500);
});
</script>';
}
else
{
echo '<center><div style="background:white;padding:5px;"><h1>You have no friends in '.$re.'</h1><br>
<a href="https://apps.facebook.com/483472795069785" target="_top" style="text-decoration:none"><div id="l">Try again</div></a>
<br><span style="color:blue;">WebCored</span></div></center>';
}
}
?>
