
<script>
$(document).ready(function(){
$("#lo").hide();
function ci()
{
var x=$('#se').val();
if(x.length<=3)
{
$("#main").html('<h1>Try alteast 4 Char...</h1>');
}
else{
$("#main").load("map2.php?re=" + x); 
}

}
$('#c').click(function(){
ci();
});
$("#se").keypress(function( event ){
if ( event.which == 13 ) {
ci();
}
});
$('#iv').click(function()
{
window.open("https://www.facebook.com/dialog/apprequests?app_id=483472795069785&message=Try this productivity app and get mapped with your friends!&redirect_uri=https://apps.facebook.com/483472795069785/","_top");
});
$('#home').click(function(){
$("#lo").show();
window.open("https://apps.facebook.com/483472795069785","_top");
});
$('#all').click(function(){
$("#main").load("all.php"); 
});
$('#web').click(function(){
$("#main").load("com.html"); 
});
$("#bu").click(function(){
window.open('http://www.facebook.com/sharer.php?s=100&p[title]=Frndz Map&p[summary]=Try this app&p[url]=apps.facebook.com/frndzmap/','_blank','height=400,width=500');
});
});
</script><style>
#nav
{
background:white;
height:60px;
color:#3B5998;
font-size:18px;
border-radius:3;
display: inline-block;
cursor:pointer;
}
#nav span
{
padding-left:10px;
padding-right:10px;
height:40px;
float:left;
padding-top:15px;
}
#nav span:hover
{
background:#3B5998;
color:white;
}
#se
{
height:30px;
border:1px solid blue;
}
.map
{
height:300px;
border-radius:3px;
background:#FFFFFF;
display: inline-block;
}
.map #map
{
padding:4px;
}

</style><?php 
set_time_limit(0);
$a=$_GET['a'];
$appid=$_GET['appid'];
$appsec=$_GET['appsec'];
$img=$_GET['img'];
$id=$_GET['id'];
$mk='https://graph.facebook.com/me/?' .$a;
$zc=file_get_contents($mk);
$name=json_decode($zc);
echo '

<center><div id="nav"  style="width:1000px; margin:0 auto;" ><span style="float:right">'.$name->name.'<img src="https://graph.facebook.com/me/picture?'.$a.'"  height="30px" style="vertical-align:middle;"/></span><center><span id="home">Home</span><span id="all">Map all friends</span><span><table><tr><td><center><input type="text" placeholder="find a friend..." id="se"></center></td><td><img src="images/se.jpg" id="c"></td></tr></table></span><span id="iv">Invite friends</span><span id="web">Web Cored</span><span>
</span></center></div></div></center>';
$fql="select name,uid,has_added_app,username,current_location,pic,online_presence from user where uid in (select uid2 FROM friend WHERE uid1 = me())";
$graph_url = "https://graph.facebook.com/fql?q=".urlencode($fql)."&".$a;

$f1=file_get_contents($graph_url);
$f2=json_decode($f1);
$ab=$f2->data[0]->name;
echo '<br><center><div id="main"><iframe src="mainmap.php" width="1000px" height="400px" frameborder="0"></iframe></div><br><button style="color:white;background:#4C66A4;height:50px;width:250px;border-radius:9px;font-size:24px;" id="bu">Share on Facebook</button></center>';



?>
