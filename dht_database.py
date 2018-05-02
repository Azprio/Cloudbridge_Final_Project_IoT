import serial
import time
import MySQLdb

ser = serial.Serial('/dev/ttyACM0',9600)
db=MySQLdb.connect("localhost","root","raspberry","cloud_bridge")

cursor=db.cursor()

while 1:
	print("getting...")
	data=ser.readline()
        htflc=data.split(',')
	h=htflc[0]
	t=htflc[1]
	f=htflc[2]
	l=htflc[3]
	s=htflc[4]
	print("updating...")
	time.sleep(0.5)
	sql="UPDATE tbl_temp_hum SET hum='%s',temp='%s',fern='%s',lpg='%s',smk='%s' WHERE id='%d'" %(h,t,f,l,s,1)
	cursor.execute(sql)
	db.commit()
