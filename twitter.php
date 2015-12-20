<?php 
/* Copyright (c) 2015 Nishith Kumar
 *
 * This source file is distributed freely without any restrictions.
 * This file contains the sample code for Twitter API usage.
 * The code uses Abraham Williams TwitterOAuth library (0.6.2)
 * The usage of TwitterOAuth library is subject to the terms of the MIT license.
 *
 * https://github.com/abraham/twitteroauth.git
 * This code is compatible with TwitterOAuth RELEASE VERSION : 0.6.2 
 * PHP version : TwitterOAuth library requires a server runnning PHP 5.5 or above
 * 
 * THIS SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND.
 * THE AUTHORS OR COPYRIGHT HOLDERS SHALL NOT BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY.
*/

session_start(); 

require_once("autoload.php"); 
use Abraham\TwitterOAuth\TwitterOAuth;

/* Consumer Key (API Key), Consumer Secret (API Secret) and access token */
//Update your API Key, API Secret, Access Token and Access Token Secret 
$api_key ='Eot7*******YOUR-API-KEY*******oac';
$api_secret = 'RnW**********YOUR-API-SECRET**********ybg';
$access_token = '321**********YOUR-ACCESS-TOKEN**********X1y';
$access_secret = 'EBl**********YOUR-ACCESS-SECRET**********pcM';

/* Secure connection to Twitter using API key */
$connection = new TwitterOAuth($api_key, $api_secret, $access_token, $access_secret);

// uncomment below line for debugging only
// print_r($connection);

// Gets latest tweets from a  user timeline 
$tweets = $connection->get("statuses/user_timeline", array("screen_name" => "google", "count" => 5, "exclude_replies" => true));

// uncomment below line for debugging only
// print_r($tweets);


// For each tweet print the id, favourite count and tweet text 
// uncomment below lines to view only tweet id, favourite count and tweet text
/* 
foreach($tweets as $tweet){
	
	$favourites = $tweet->favorite_count;
	echo $tweet->id." -> ";
	echo $tweet->favorite_count." | ";
	echo $tweet->text;
	echo "<br>" ;
}
*/



// For each tweet print the HTML embedded format of the tweet
// uncomment below lines to view HTML formatted tweet 
echo '<div style="margin: 0 auto; max-width: 500px">';
foreach($tweets as $tweet){
	
	$embed_tweet = $connection->get("statuses/oembed", array("id" => $tweet->id));
	
	echo $embed_tweet->html;
	echo "<br>" ;
}
echo '</div>';

/* Post a Tweet - Please make sure your API key is WRITE enabled  
 * WARNING : The below code will post a tweet to your twitter timeline 
 * Uncomment below line to post a tweet 
 */
//$tweets = $connection->post("statuses/update", array("status" => "This is a test"));


?>