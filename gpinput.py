import os
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

x= 5
y= 13
m= 19
n= 26

GPIO.setup(x, GPIO.IN, GPIO.PUD_UP)
GPIO.setup(y, GPIO.IN, GPIO.PUD_UP)
GPIO.setup(m, GPIO.IN, GPIO.PUD_UP)
GPIO.setup(n, GPIO.IN, GPIO.PUD_UP)

while True:
  button_state = GPIO.input(x)
  if button_state == GPIO.LOW:
	os.system('php -f /var/www/html/classes/switch_input/input12.php')
  else:
	 print("")
  button_statey = GPIO.input(y)
  if button_statey == GPIO.HIGH:
	print("")   
  else:
    os.system('php -f /var/www/html/classes/switch_input/input16.php')

  button_statem = GPIO.input(m)
  if button_statem == GPIO.LOW:
	os.system('php -f /var/www/html/classes/switch_input/input20.php')  
  else:
	 print("")
  button_staten = GPIO.input(n)
  if button_staten == GPIO.HIGH:
	print("")   
  else:
    os.system('php -f /var/www/html/classes/switch_input/input21.php')
time.sleep(2000)
