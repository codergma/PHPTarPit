<?php
header("content-type:text/html;charset=utf-8");

echo '英文文本日期时间 ===>  时间戳 <br/>';
echo strtotime('-1 month').'<br/>';
echo '<br/>';

echo '时间戳 ===> 英文文本日期时间<br/>';
echo date('Y-m-d H:i:s',time()).'<br/>';
echo '<br/>';

echo '获取当期戳 <br/>';
echo time().'<br/>';
echo '<br/>';

echo '当前时间 <br/>';
echo date('Y-m-d H:i:s',strtotime('now')).'<br/>';
echo '一月之前 <br/>';
echo date('Y-m-d H:i:s',strtotime('-1 month')).'<br/>';
echo '两个月　１周　２天　４小时　２秒之后 <br/>';
echo date('Y-m-d H:i:s',strtotime("2 months 1 week 2 days 4 hours 2 seconds")).'<br/>';
echo '2015-10-01 12:00:00 5 days <br/>';
echo date('Y-m-d H:i:s',strtotime('2015-10-01 12:00:00 5 days'));