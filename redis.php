<?php
/**
* zset (Sorted set) 有序集合，每一个member关联一个score,这个score用于排序．
* 结构 key score member
*/
//　添加
ZADD key score member

// score　＋１
ZINCR key member
// score + n
ZINCRBY key n menber 

// 返回指定区间的member,索引从0开始，由低到高排序
ZRANGE  key start stop
// 返回指定区间的member,索引从0开始，由高到低排序
ZREVRANGE  key start stop
// 返回指定score区间的member,由低到高
ZRANGEBYSCORE key min max
// 返回指定score区间的member,由高到低
ZREVRANGEBYSCORE key min max

// 统计member个数
ZCARD key
// 统计指定分数区间的member数量
ZCOUNT key min max

// 删除member 
ZREM key member [member2]
// 删除指定rank区间的member
ZREMRANGEBYRANK key start stop
// 删除指定score区间的member
ZREMRANGEBYSCORE key min max

// 返回member的rank,也就是在队列中的位置，从0开始,分数从低到高
ZRANK key member
// 返回member的rank,也就是在队列中的位置，从0开始,分数从高到低
ZREVRANK key member

// 获取member的score
ZSCORE key member

/*
 求交集 
 out为结果集，
 n为结果集中member个数　
 set1为第一个集合，
 set2为第二个集合，
　x,y为比重
*/
ZINTERSTORE out n set1 set2 WEIGHTS x y
/*
 求并集 
 out为结果集，
 n为结果集中member个数　
 set1为第一个集合，
 set2为第二个集合，
　x,y为比重
*/
ZUNINSTORE out n set1 set2 WEIGHTS x y

