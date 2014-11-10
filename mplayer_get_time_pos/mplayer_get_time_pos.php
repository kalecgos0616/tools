<?php

$results = popen("DISPLAY=:0 mplayer -quiet -slave -input file=fifofile '4.mp4'","w");  
system("echo \"get_time_pos\" > fifofile");
while(1){
	$line = fget($results,1024);
	echo $line;
}
