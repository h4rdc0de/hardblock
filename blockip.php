<?php
$ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
$country = $_SERVER["HTTP_CF_IPCOUNTRY"];
$block_countries = array("CN", "RU", "AF", "IR", "IQ", "SA", "LB", "SY", "UA");

if (in_array($country, $block_countries)) {
    die("[403 Forbidden Error] - You might be blocked by your IP, Country, or ISP. You can try to contact us at <your mail>");
}

# blocklist block #
$filecontents = file_get_contents("blocklist.txt");
if (strpos($filecontents ,$ip) !== false) {
	#add blocked ip to CF#
	include "cf_class.php";
	$cf = new cloudflare_api("<your mail>", "<api key>");
    $response = $cf->ban($ip);

    #Deny user#
    die("[403 Forbidden Error] - You might be blocked by your IP, Country, or ISP. You can try to contact us at <your mail>");
}
?>