<style>
.list
{
border:1px solid #CCCCCC;
border-radius:6px;
height:50px;
width:100px;
}
</style>
<?php

$re=$_GET['re'];
$a=$_COOKIE['core'];
$fql="SELECT name,uid,current_location,pic,pic_square,online_presence FROM   user WHERE  CONTAINS  ('".$re."')AND  strpos(lower(name),lower('".$re."')) >=0 AND uid IN (SELECT uid2 FROM friend WHERE uid1 =me())";
$graph_url = "https://graph.facebook.com/fql?q=".urlencode($fql)."&".$a;
$f1=file_get_contents($graph_url);
$f2=json_decode($f1);
foreach ($f2 as $f3);
$i=count($f3);
echo '<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7">
</script>
<script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="map.js"></script>
<div id="gmap"></div>

<div id="controls"></div>


<script type="text/javascript">
$(function() {
	new Maplace({
	show_markers: true,
	locations: [
	';
	for($x=0;$x<$i;$x++)
	{
        $online="'images/".$f2->data[$x]->online_presence.".jpg'";
	   echo '{
		lat:'.$f2->data[$x]->current_location->latitude.', 
		lon:'.$f2->data[$x]->current_location->longitude.',
		zoom: 8,
		icon:"'.$f2->data[$x]->pic_square.'",
		title:"'.$f2->data[$x]->name.'",
		html: "<img src='.$online.'>'.$f2->data[$x]->current_location->name.'",
		show_infowindow: false,
	},';
	}
	echo']
}).Load(); 
});
</script>';
?>

