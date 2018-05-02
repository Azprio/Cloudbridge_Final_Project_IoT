#!/usr/bin/python

import serial
import os

ser = serial.Serial('/dev/ttyACM0', 9600)

while 1:
        if (ser.inWaiting() > 0):
                serdata = ser.readline()
                serdata = serdata.split["\t"]
                print serdata
