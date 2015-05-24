<?php
	/*
		Koha-Facebook App 
		Version 1.0 
		By Karam Qubsi , 2015.
		Any suggestions or contributions are very welcome :) .
		Email : karamqubsi@gmail.com
		GNU GENERAL PUBLIC LICENSE Version 2 
	*/
	
	require "facebook-php-sdk-master/src/facebook.php"; // this should point to the correct path in your server . 
	/*
		Download  Facebook PHP SDK library in your server from : https://github.com/facebookarchive/facebook-php-sdk
		This version maybe old but it will work very good with our script . 
	*/
	function post($message,$time) {
		$PAGE_ID = ""; // The page you want to post to (you must be a manager)
		$FACEBOOK_APP_ID = ""; // Your Facebook app ID
		$FACEBOOK_SECRET = ""; // Your facebook secret
		$ACCESS_TOKEN=""; 
		/*
			You'll need  Long-Term Tokens you can follow these simple steps to get one : http://www.testically.org/2011/09/27/5-steps-to-automatically-write-on-your-facebook-page-wall-using-the-graph-api-without-a-logged-in-user/
		*/
		$PAGE_TOKEN; // Leave this blank. It will be set later
		
		
		$facebook = new Facebook(array(
		'appId'  => $FACEBOOK_APP_ID,
		'secret' => $FACEBOOK_SECRET,
		'cookie' => true,
		));
		
		//function post($message,$time) {
		$post = array('access_token' => $ACCESS_TOKEN);
		
		try {
			$res = $facebook->api('/me/accounts','GET',$post);
			
			if (isset($res['data'])) {
				foreach ($res['data'] as $account) {
					if ($PAGE_ID == $account['id']) {
						$PAGE_TOKEN = $account['access_token'];
						break;
					}
				}
			}
			} catch (Exception $e){
			echo $e->getMessage();
		}
		
		$post = array('access_token' => $PAGE_TOKEN, 'message' => $message, 'scheduled_publish_time'=>$time,'published' => "0" );
		
		try{
			$res = $facebook->api("/$PAGE_ID/feed","POST",$post);
			} catch (Exception $e){
			echo $e->getMessage();
		}
		
	} //end of the post function 
	
	
	$url = "http://your-koha-instance/cgi-bin/koha/svc/report?id=29&annotated=1" ; 
	// you must put your report ID not 29 , it's just an example and postfix of the url "&annotated=1" must be there so we get JSON data with labels . 
	$content = file_get_contents($url);
	$json = json_decode($content, true); 
	$booklist = array(); // We will push later the books data with our customized template into this array . 
	if (empty ($json)) {
		exit("\n No data to retrieve \n" );
		}  else {
		foreach($json as $i){
			
			$header = "" ; // put here whatever text you want to be at the head of your post ( or leave it blank . if you have multi lines header use "\n" for new line )
			$footer = "" ; //put here whatever text you want to be at the footer of your post ( or leave it blank . if you have multi lines footer use "\n" for new line )
			array_push($booklist, $header ."\n".$i['title']." ".$i['author']."\n".$i['publishercode']." ".$i['copyrightdate']."\n".$i['abstract']."\n".$i['notes']."\n".$i['url']."\n".$footer) ;
			
		}
	}
	
	$time = time() + 720; //this mean it is 10 minutes later. 
	
	
	for ($i=0 ;$i < sizeof($booklist); $i++, $time = $time + 720 ) { 
		//We are also increasing the time  with 10 minutes for each new post . 
		post ($booklist[$i],$time);
	}
	
?>
