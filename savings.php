<?php
$e="https://graph.facebook.com/fql?q=select%20name,uid,has_added_app,username,current_location,mutual_friend_count,hometown_location,pic,online_presence%20from%20user%20where%20uid%20in%20%28select%20uid2%20FROM%20friend%20WHERE%20uid1%20=%20me%28%29%29&access_token=CAAG3t0g1bVkBAGa8kjTZCUihnggKA6WRoWzhGPaHpN7DHQJLbmpALfYZCHTuxU3oZCFZC2c2ZAxQIi9RhZCkbZB0R9wNpPEKCS8CrjhLsiLwP8HF8fgAKTLzQwGvgdiFYEKVIhJWZBZBhfKKn7P5HVLDE6L7S2Cc8URnIk3zzhBDqRyc9Qn29jFyCQRRt2sHNFKwZD";
echo urldecode($e);
?>
SELECT uid FROM user WHERE
  online_presence IN ('active', 'idle')
  AND uid IN (
    SELECT uid2 FROM friend WHERE uid1 = $user_id
  )
  $f1=file_get_contents($graph_url);
$f2=json_decode($f1);
$ab=$f2->data[0]->name;
echo $ab;


https://graph.facebook.com/fql?q=SELECT name,uid FROM   user WHERE  CONTAINS  ("joe prathap")AND  strpos(lower(name),lower("Joe prathap")) >=0 AND uid IN (     SELECT uid2 FROM friend WHERE uid1 =me()  )

public static function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}