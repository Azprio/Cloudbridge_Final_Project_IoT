import subprocess
from time import sleep
#!/usr/bin/env python
y=(0.1)
subprocess.Popen (["python", 'gpinput.py'])
sleep (y)
subprocess.Popen (["python", 'dht_database.py'])
sleep (y)
