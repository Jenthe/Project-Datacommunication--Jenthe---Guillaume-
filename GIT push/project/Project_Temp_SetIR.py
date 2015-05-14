#!/usr/bin/python

#setIR
from subprocess import *
from time import sleep, strftime
from datetime import datetime
import os


def run_cmd(cmd):
    p = Popen(cmd, shell=True, stdout=PIPE)
    output = p.communicate()[0]
    return output

while 1:
    base_dir = '/home/pi/project/temp/'
    time = datetime.now().strftime('%H')
    timefile = base_dir + time
	
    f = open(timefile, 'r')
    lines = f.readlines()
    f.close()

    temp = str(lines[0])

    print lines[0]

    if temp == '':
    	print "ERROR NO VALUE. \n"
    elif temp=='5':
    	os.system('irsend SEND_ONCE project KEY_0')
    elif temp=='18':
    	os.system('irsend SEND_ONCE project KEY_1')
    elif temp=='19':
    	os.system('irsend SEND_ONCE project KEY_2')
    elif temp=='20':
    	os.system('irsend SEND_ONCE project KEY_3')
    elif temp=='21':
    	os.system('irsend SEND_ONCE project KEY_4')
    elif temp=='22':
    	os.system('irsend SEND_ONCE project KEY_5')
    elif temp=='23':
    	os.system('irsend SEND_ONCE project KEY_6')
	print("inlus23.\n")
    elif temp=='24':
    	os.system('irsend SEND_ONCE project KEY_7')
    elif temp=='25':
    	os.system('irsend SEND_ONCE project KEY_8')
    elif temp=='26':
    	os.system('irsend SEND_ONCE project KEY_9')
    
    sleep(3)
    


    


    
