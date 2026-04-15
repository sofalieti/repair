<?php

include("src/geoipcity.inc");
include("src/geoipregionvars.php");

$gi = geoip_open("src/GeoLiteCity.dat", GEOIP_STANDARD);

$record = GeoIP_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
print_r($record);

geoip_close($gi);