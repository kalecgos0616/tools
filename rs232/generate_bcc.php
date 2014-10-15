<?php
print_r($argv);
//print_r($_REQUEST);
//$arr = array_filter(explode("x", $argv[1]));
//print_r($arr);
$argv[1] =  str_replace("\\","",$argv[1]);
$arr = preg_split('/x/', $argv[1], NULL, PREG_SPLIT_NO_EMPTY);
print_r($arr);
$y = $arr[0];
for($i=1;$i<count($arr);$i++){
	$y = bin2hex(pack('H*',$y) ^ pack('H*',$arr[$i]));
}
#echo "\$x=$x\n";
echo "\$y=$y\n";
