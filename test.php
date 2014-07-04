<?php

$v="http://graph.facebook.com/oauth/access_token?code=AQA09NX9Q2T6FA1htUVcMf1sf9hz2FsvvdZ_1Ogk7dEAZfSdiMta9SZX-y8DeIi5YZCnc3WNSjenLrmQBBxURODNUHK8s2Sx4ytz-hMWSnjGDLrYmFFKYuMknjNReOpozJUuI3-eX_d-zNnA90SuRu5fBJaeiRR4FBGe75l25tkFp0c4JZ67YbH3XbtW9bpHWPp9Cwx-RXDFIsWSw1pzvjlPWHyuJ5oh9AVEoxF0XLQG0wtHkUQXMIETSvHFbto9st-jYFsVeZNkrF_ctwWFatovFrKmg8Pw8YzzPOemp-qqA2QsFr6XWhrR76LVWEG22tk&client_id=483472795069785&client_secret=612b75b67bb6b03fbf1bb0cdf2f18a28&redirect_uri=http://apps.facebook.com/483472795069785/x/";
$a=urlencode($v);
$b=file_get_contents($a);

echo $b;
?>
$cookie = tmpfile();
$userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31' ;

$ch = curl_init($url);

$options = array(
    CURLOPT_CONNECTTIMEOUT => 20 , 
    CURLOPT_USERAGENT => $userAgent,
    CURLOPT_AUTOREFERER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEFILE => $cookie,
    CURLOPT_COOKIEJAR => $cookie ,
    CURLOPT_SSL_VERIFYPEER => 0 ,
    CURLOPT_SSL_VERIFYHOST => 0
);

curl_setopt_array($ch, $options);
$kl = curl_exec($ch);
curl_close($ch);
echo $kl;
https://www.facebook.com/dialog/apprequests?%20app_id=483472795069785&message=Try%20this%20productivity%20app!&redirect_uri=https://apps.facebook.com/483472795069785/