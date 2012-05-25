<?php
	if(empty($_GET["username"]))
		$username = "PortFwdPodcast";
	else
		$username = htmlspecialchars($_GET["username"]);
		
	$ch=curl_init("http://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=" . $username . "&count=1");
	curl_setopt_array($ch,array(
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_TIMEOUT=>10,
	));
	$temp = curl_exec($ch);
	curl_close($ch);
	
	echo $temp;