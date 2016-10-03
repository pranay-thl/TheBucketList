import sys
'''class bot:
	def fun():
		s=sys.argv[1]
		return s'''
s=''
for i in range(1,len(sys.argv)):
	s+=sys.argv[i]
	if i!=len(sys.argv)-1:
		s+=' '
ans=''
name=["name","whats your name","Name","NAME","Who are you ?","What is your name ?","What is your name"]
if s in name:
	ans="Nova"
else:
	ans=s
if s=='redirect':
	print '/grid.php','redirect'
else:
	print ans,'chat_post'
