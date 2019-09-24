import smtplib
from email.mime.text import MIMEText
from email.header import Header
import sys
# 第三方 SMTP 服务
mail_host="smtp.qq.com"
mail_user="464243312@qq.com"
mail_pass="uykgrhsapgjacaje"   #口令/授权码


sender = '464243312@qq.com'
#receivers = ['13972138470@163.com']
a=sys.argv[1]
b=sys.argv[2]
message = MIMEText('密码:'+a, 'plain', 'utf-8')
message['From'] = Header("聆听网", 'utf-8')
message['To'] =  Header("hello", 'utf-8')

subject ='找回密码'
message['Subject'] = Header(subject, 'utf-8')

smtpObj = smtplib.SMTP_SSL()
smtpObj.connect(mail_host, 465)    # 465为SMTP加密端口号
smtpObj.login(mail_user,mail_pass)
smtpObj.sendmail(sender, b, message.as_string())
print("邮件发送成功")
