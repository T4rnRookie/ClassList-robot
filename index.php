<?php
$wk =date('w');
function todayWeek(){
 $wk_day = date('w'); //今天周几
 $day = date('d'); //今天几号
 $week = array('日', '一', '二', '三', '四', '五', '六'); //规范化周日的表达
 $d = ceil($day / 7); //计算是第几个星期几
 $str = date("Y年n月j日") . " 星期" . $week[$wk_day] ;
 $Date_1=date("Y-m-d");
 $Date_2="2021-3-01";
 $d1=strtotime($Date_1);
 $d2=strtotime($Date_2);
 $Days=round(($d2-$d1)/3600/24/7)+1;
 $week2= "今天是本学期的第".$Days."周";
 return $str."\n".$week2."\n";

}
function classList()
{
$str = '';
 $class=array('毛概（B307)','体育（操场)','操作系统(B306)','计网(1教505)','系统设计(B506)','系统设计(B304)','形势政策(C603)');
 $classTime=array('8:15 ','10:15 ','13:40 ','15:40 ');
 $wk_day = date('w');
 $Date_1=date("Y-m-d");
 $Date_2="2021-3-01";
 $d1=strtotime($Date_1);
 $d2=strtotime($Date_2);
 $Days=round(($d2-$d1)/3600/24/7)+1;
 if($Days%2!=0)
 {  
     switch ($wk_day) {
        case '1':
            $str = $classTime[1].$class[2]."\n".$classTime[2].$class[1];
            return $str;

        case '2':
            $str = $classTime[2].$class[0];
            return $str;

        case '3':
            $str = $classTime[0].$class[3]."\n".$classTime[1].$class[4]."\n".$classTime[2].$class[2];
            return $str;
           
            
        case '4':
            $str = $classTime[0].$class[0];
            return $str;
          
        case '5':
            $str = $classTime[2].$class[5];
            return $str;
           

        default:
            $str = 'Enjoy your Weekend ^_^';
            return $str;
            
     }
 }
else
{
 switch ($wk_day) {
        case '星期一':
            $str = "\n".$classTime[1].$class[2]."\n".$classTime[2].$class[1];
            return $str;
            

        case '星期二':
            $str = $classTime[2].$class[0];
            return $str;
            

        case '星期三':
            $str = $classTime[0].$class[3]."\n".$classTime[1].$class[4]."\n".$classTime[2].$class[2];
            return $str;
            
            
        case '星期四':
            $str = $classTime[0].$class[0];
            return $str;
            
        case '星期五':
            $str = $classTime[1].$class[2]."\n".$classTime[3].$class[5];
            return $str;
           

        default:
            $str = 'Enjoy your Weekend ^_^';
            return $str;
            
     }



}
}
function huibao()
{
    return "\n"."第9周到第十二周 星期一最后一节有形势与政策 C603 ";
}

function sc_send($text='' ,$desp = '',$key = 'yourkey')
{
    $postdata = http_build_query( array( 'text' => $text, 'desp' => $desp ));
    $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata));
    
    $context  = stream_context_create($opts);
    return $result = file_get_contents('https://sctapi.ftqq.com/'.$key.'.send', false, $context);

}
if($wk==3)
{
$str1=classList();
$str2=todayWeek();
$str3 =huibao();
$a = explode("\n",$str1);
$str_1 = $a[0]."\n".$a[1];
sc_send($text=$str2);
sc_send($text=$str_1);
sc_send($text=$a[2]);
sc_send($text=$str3);
}
else if($wk==6||$wk==0)
{
$str1=classList();
$str2=todayWeek();
$str3 =huibao();
sc_send($text=$str2);
sc_send($text=$str1);
}
else
{
$str1=classList();
$str2=todayWeek();
$str3 =huibao();
sc_send($text=$str2);
sc_send($text=$str1);
sc_send($text=$str3);
}

?>