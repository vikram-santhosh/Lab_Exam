import os

for i in range(0,12):
	f = "Q"+str(i+1)
	os.makedirs(f)
	os.chdir(f)
	os.mkdirs("A")
	os.mkdirs("B")
	os.chdir("..")