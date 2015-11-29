<?php
echo getmypid().PHP_EOL;
$pid = pcntl_fork();
//父进程和子进程都会执行下面代码
if ($pid == -1)
{
    //错误处理：创建子进程失败时返回-1.
     die('could not fork');
}
else if ($pid == 0)
{
	echo '这里是子进程执行的代码'.getmypid().PHP_EOL;
    // pcntl_wait($status); //等待子进程中断，防止子进程成为僵尸进程。
    sleep(10);
}
else
{
	echo '这里是父进程执行的代码'.getmypid().PHP_EOL;
    sleep(5);
}
?>