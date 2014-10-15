#!/usr/bin/perl

use warnings;
use strict;

use Getopt::Long;
my $gw = "192.168.199.1";
GetOptions(
	"gw=s"   => \$gw,      # string
);

`echo "nameserver 114.114.114.114" > /etc/resolv.conf`;
print `php route.php --gw=$gw`;
print `route del default gw 10.21.40.1`;
print `route del default gw 192.168.0.1`;
