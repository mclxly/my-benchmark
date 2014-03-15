<?php
// URLs we want to retrieve
$urls = array(
    'http://sale.jd.com/act/QH8fzgwP7ySX.html', 
    'http://sale.jd.com/act/OGQ04oZv6RM.html'
);

$pid = 493442;
for ($i=0; $i < 11; $i++) { 
	$pid += $i;
	$url = "http://item.jd.com/$pid.html";
	$urls[] = $url;
	//echo $url;exit;
}
 
// initialize the multihandler
$mh = curl_multi_init();

// job start
$time_start = microtime(true);

$channels = array();
foreach ($urls as $key => $url) {
    // initiate individual channel
    $channels[$key] = curl_init();
    curl_setopt_array($channels[$key], array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true
    ));
 
    // add channel to multihandler
    curl_multi_add_handle($mh, $channels[$key]);
}
 
// execute - if there is an active connection then keep looping
$active = null;
do {
    $status = curl_multi_exec($mh, $active);

    // Check for errors
    if($status > 0) {
        // Display error message
        echo "ERROR!\n " . curl_multi_strerror($status);
    }
}
while ($active && $status == CURLM_OK);

// done!
$time_end = microtime(true);
$time = $time_end - $time_start;

$download_size = 0;

// echo the content, remove the handlers, then close them
foreach ($channels as $chan) {
    //echo curl_multi_getcontent($chan);
    $download_size += strlen(curl_multi_getcontent($chan));
    curl_multi_remove_handle($mh, $chan);
    curl_close($chan);
}

// ---------------------------------------------------------
// Summary
echo "Execution time(seconds): ".sprintf('%f', $time).PHP_EOL;
echo 'Total download size: '.$download_size.PHP_EOL;
 
// close the multihandler
curl_multi_close($mh);
?>