#!/usr/bin/perl

use strict;
use warnings;
use Data::Dumper;

open(my $fh, "ByPass_domain_without_eof.txt") or die "no file";
my $config_template = '{"enabled":true,"name":"domain","pattern":"domain","isRegEx":false,"caseSensitive":false,"blackList":true,"multiLine":false},';
my @arr;
my $temp;
my $all_config = "";
while ( my $row =  <$fh> ){
	@arr = split(",",$row);	
	for my $domain (@arr){
		$domain =~ s/\*?$/*/;
		$temp = $config_template;
		$temp =~ s/domain/$domain/g;
		$all_config .= $temp;
	}
}
$all_config =~ s/,$//;	# remove last "."
print "{\"patterns\":[$all_config]}";
#print "\n";
