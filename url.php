<?php
echo 'http_build_query()'.'<br/>';
$data = array('foo'=>'bar',
              'baz'=>'boom',
              'cow'=>'milk',
              'php'=>'hypertext processor');
echo http_build_query($data);
echo '<hr/>';

echo 'parse_url()'.'<br/>';
$url = 'http://username:password@hostname/path?arg=value&arg2=value2#anchor';
print_r(parse_url($url));
echo '<br/>';
print_r(parse_url($url, PHP_URL_PATH));
echo '<hr/>';

?> 