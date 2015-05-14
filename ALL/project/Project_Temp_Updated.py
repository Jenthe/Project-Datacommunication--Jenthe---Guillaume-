#!/usr/bin/python

#import voor tijd, modprobe, en andere
import os
import glob
import time

from Adafruit_CharLCD import Adafruit_CharLCD
from subprocess import *
from time import sleep, strftime
from datetime import datetime

os.system('modprobe w1-gpio')
os.system('modprobe w1-therm')

base_dir = '/sys/bus/w1/devices/'
device_folder = glob.glob(base_dir + '28*')[0]
device_file = device_folder + '/w1_slave'


lcd = Adafruit_CharLCD()

#cmd = "cat /sys/bus/w1/devices/28-000006377ed6/w1_slave | grep t= | cut -c30-"
cmd ="ip addr show eth0 | grep inet | awk '{print $2}' | cut -d/ -f1"

lcd.begin(16, 1)

def run_cmd(cmd):
    p = Popen(cmd, shell=True, stdout=PIPE)
    output = p.communicate()[0]
    return output

def read_temp_raw():
    f = open(device_file, 'r')
    lines = f.readlines()
    f.close()
    return lines
 
def read_temp():
    lines = read_temp_raw()
    while lines[0].strip()[-3:] != 'YES':
        time.sleep(0.2)
        lines = read_temp_raw()
    equals_pos = lines[1].find('t=')
    if equals_pos != -1:
        temp_string = lines[1][equals_pos+2:]
        temp_c = float(temp_string) / 1000.0
	temp_f = temp_c * 9.0 / 5.0 + 32.0 #temp_f niet nodig, eventueel naar internationalisering toe wel
        return temp_c
	#met fahrenheit er ook bij return temp_c, temp_f

lcd.clear()
ipaddr = run_cmd(cmd)
lcd.message('IP %s' % (ipaddr))
sleep(20)

while 1:
    templcd= str(round(read_temp(),1))
    lcd.clear()
    lcd.message(datetime.now().strftime('%b %d  %H:%M\n'))
    lcd.message('Temp: ' + (templcd) + " " + chr(223) + "C")
    #lcd.message('Huidige T %s C' % read_temp()  ) deze lagt
    sleep(5)
