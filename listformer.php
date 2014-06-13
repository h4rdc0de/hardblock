<?php
$bl1 = file_get_contents("https://check.torproject.org/cgi-bin/TorBulkExitList.py?ip=1.2.3.4");
$bl2 = file_get_contents("http://danger.rulez.sk/projects/bruteforceblocker/blist.php");
$bl3 = file_get_contents("http://www.autoshun.org/files/shunlist.csv");
$bl4 = file_get_contents("http://www.us.openbl.org/lists/base_30days.txt");

$blocklist = $bl1.$bl2.$bl3.$bl4;
$filteredbl = implode(',',array_unique(explode(' ', $blocklist)));
preg_match_all('/([0-9]{1,3}\.){3}[0-9]{1,3}/', $filteredbl, $matches);

$count =  count($matches[0]);

$endstring = "# hardblock v1.0: Blocklists: Tor, BruteForceBlocker, AutoShun, OpenBL # \n";
$endstring .= "# Last Update ".date(DATE_RFC2822)." #\n";

for ($i = 0; $i < $count; $i++)
{
	$endstring .= $matches[0][$i]."\n";
}
file_put_contents("blocklist.txt", $endstring);
?>