<?php
/*
如果safe_mode true, 那么不在safe_mode_exec_dir中的函数讲不能运行．
*/

/*
执行一个外部命令有三个函数, 主要的差别在于回传的值
*/
system();
shell_exec();
exec(string $cmd, [array &$output], [int &$return_val]);