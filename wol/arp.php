    <?php

$ip="10.236.22.1";
$res=getMacAddress($ip);
echo "$res";

     function getMacAddress($ip)
    {
    // $ip au format "10.123.24.23"
       $buffer = "";
       system("ping " . $ip);
       system("arp -a > arp.out");
       $fileHandle = fopen ("arp.out", "r");
       while (!feof($fileHandle))
       {
          $buffer = $buffer . fgets($fileHandle, 4096);
       }
       fclose ($fileHandle);
       $ip_mac = strstr($buffer, $ip);
       if($ip_mac)
       {
          $mac = substr($ip_mac,22,17);
          return strtolower(ltrim($mac));
       }
       return false;
    }
    ?>

