#!/usr/bin/python

from Adafruit_CharLCD import Adafruit_CharLCD
from subprocess import *
from time import sleep, strftime
from datetime import datetime

lcd = Adafruit_CharLCD()

cmd = "cat /sys/bus/w1/devices/28-000006377ed6/w1_slave | grep t= | cut -c30-"

lcd.begin(16, 1)


def run_cmd(cmd):
    p = Popen(cmd, shell=True, stdout=PIPE)
    output = p.communicate()[0]
    return output

while 1:
    temp = run_cmd(cmd)
    templcd = float(temp)/1000
    lcd.clear()
    lcd.message(datetime.now().strftime('%b %d  %H:%M\n'))
    lcd.message('Temp %s' % (templcd))
    sleep(5)
