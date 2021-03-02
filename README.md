## 基于方糖的API开发的一款简易课表机器人Version0.0

### API接口

https://sct.ftqq.com/

### 功能

通过企业微信发送每日的课表，报告今天是第几周

### 使用环境

 php 7.0

腾讯云函数(或者自己有一台云服务器)





### 使用方法

secret生成方法详见方糖官方文档

将index.php放在自己服务器上，为达到每日播报的功能，可以写个bash脚本

每天定时curl一下

参考bash脚本

```bash
#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
curl -sS --connect-timeout 10 -m 60 '地址'
echo "----------------------------------------------------------------------------"
endDate=`date +"%Y-%m-%d %H:%M:%S"`
echo "★[$endDate] Successful"
echo "----------------------------------------------------------------------------"


```



### Version  0.0

因为开发过程中有莫名其妙的长度限制没能解决，所以只能用explored进行切片发送，因为只是测试版本方便自己用，所以等以后自己慢慢renew



### Version 1.0（施工中)

初步功能

天气播报

开发出python版本

搭配爬虫使用

上课提醒

### 鸣谢

因为想赶快开发出来用所以一点都没优化，感谢indevn的支持，也感谢方糖平台