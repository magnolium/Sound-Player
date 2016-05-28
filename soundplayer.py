import os, random, sys
from time import sleep

filelist = os.listdir("/home/pi/Desktop/soundplayer/sounds")

if len(sys.argv) > 1:
	the_string = "omxplayer -o local /home/pi/Desktop/soundplayer/sounds/" + str(sys.argv[1])
	os.system(the_string)
else:
	while 1:
		the_string = "omxplayer -o local /home/pi/Desktop/soundplayer/sounds/" + random.choice(filelist)
		os.system(the_string)
		wait_time = random.randint(15, 30)
		print "Sleeping for " + str(wait_time) + " seconds"
		sleep(wait_time)
