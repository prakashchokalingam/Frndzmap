<?php
echo '<script>
function x()
{
window.open("https://www.facebook.com/dialog/oauth?client_id=483472795069785&redirect_uri=https://apps.facebook.com/483472795069785/?&response_type=code&fb_appcenter=1&fb_source=appcenter&scope=publish_actions,email,user_birthday,&pass=1","_top");
}

</script>';
echo '<body onload="x()"></body>';
?>