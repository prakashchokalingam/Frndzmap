<style>
table
{
color:#3B5998;pading:5px;
}
table:hover
{
color:#FFFFFF;
}
div:hover
{
background-color:#3B5998;
}
div
{
width:300px;
height:150px;
float:left;
cursor:pointer;
border:3px solid #E9EAED;
background:white;

overflow:hidden;
}


</style><?php
set_time_limit(0);
$a=$_COOKIE['core'];
$nol=urlencode("SELECT name,uid,current_location,pic,username,sex,profile_url,mutual_friend_count,pic_square,online_presence FROM   user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 =me()) AND current_location='' ORDER BY name ");
$nql=file_get_contents("https://graph.facebook.com/fql?q=".$nol."&".$a);
$no=json_decode($nql);
foreach($no as $no1)
$l=count($no1);
if($l!==0)
{
echo '<center><span style="color:#3B5998;font-size:18px;background:white;padding:10px;">Friends with no Location in Facebook : '.$l.'<br></span></center>
<br><center>';
for($h=0;$h<$l;$h++)
{
$online=$no->data[$h]->online_presence;
echo '<div><table><tr><td><img src="images/'.$online.'.jpg"><img src="'.$no->data[$h]->pic.'" height="50px" width="50px">'.$no->data[$h]->name.'<br>Gender:'.$no->data[$h]->sex.'&nbsp;</td></tr><tr><td>Mutal friend:'.$no->data[$h]->mutual_friend_count.'<br>link :<span onclick=javascript:window.open("'.$no->data[$h]->profile_url.'","_blank");>'.$no->data[$h]->profile_url.'</span></td></tr></table></div>';
}
}
echo '</center>';
?>