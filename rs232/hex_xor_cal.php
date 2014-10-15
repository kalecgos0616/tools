<?php 
$s1 = 'AA';
$s2 = '03';
$s3 = '99';
$arr = array("01","02","CA","60","00","03","01","03","02"); // write
$arr = array("01","01","CA","60","00","02"); // read
$arr = array("01", "01", "CA", "53", "00", "04"); // test
$x = bin2hex(pack('H*',$s1) ^ pack('H*',$s2)^ pack('H*',$s3));
#$x = bin2hex(pack('H*','a9') ^ pack('H*',$s3));
$y = $arr[0];
for($i=1;$i<count($arr);$i++){
	$y = bin2hex(pack('H*',$y) ^ pack('H*',$arr[$i]));
}
#echo "\$x=$x\n";
echo "\$y=$y\n";
?>
