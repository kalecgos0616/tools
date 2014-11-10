<?php
$gateway = "192.168.199.1";
$longopts  = array(
		"gw::",    // Optional value
		);
$options = getopt("", $longopts);
$gateway = ($options['gw'])?$options['gw']:$gateway;

$rangs = array(
		array(0,3),
		array(4,7),
		array(8,11),
		array(12,15),
		array(16,19),
		array(20,23),
		array(24,27),
		array(28,31),
		array(32,35),
		array(36,39),
		//array(40,43),
		array(44,47),
		array(48,51),
		array(52,55),
		array(56,59),
		array(60,63),
		array(64,67),
		array(68,71),
		array(72,75),
		array(76,79),
		array(80,83),
		array(84,87),
		array(88,91),
		array(92,95),
		array(96,99),
		array(100,103),
		array(104,107),
		array(108,111),
		array(112,115),
		array(116,119),
		array(120,123),
		array(124,127),
		array(128,131),
		array(132,135),
		array(136,139),
		array(140,143),
		array(144,147),
		array(148,151),
		array(152,155),
		array(156,159),
		array(160,163),
		array(164,167),
		array(168,171),
		array(172,175),
		array(176,179),
		array(180,183),
		array(184,187),
		array(188,191),
		array(192,195),
		array(196,199),
		array(200,203),
		array(204,207),
		array(208,211),
		array(212,215),
		array(216,219),
		array(220,223),
		array(224,227),
		array(228,231),
		array(232,235),
		array(236,239),
		array(240,243),
		array(244,247),
		array(248,251),
		array(252,255)
	);
	print_r($rang);

	`route add default gw $gateway`;
foreach($rangs as $rang)
{
	// wire model
	//echo `route add -net 10.21.{$rang[0]}.0 netmask 255.255.252.0 gw 10.21.40.10`;
	//echo "route add -net 10.21.{$rang[0]}.0 netmask 255.255.252.0 gw 10.21.40.10";
	// wireless AP model
	echo `route add -net 10.21.{$rang[0]}.0 netmask 255.255.252.0 gw 192.168.0.1`;
	echo "route add -net 10.21.{$rang[0]}.0 netmask 255.255.252.0 gw 192.168.0.1";

	echo "\n";
}
