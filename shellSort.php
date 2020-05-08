<?php

/**
 * 希尔排序(对直接插入排序的改进)
 * 希尔排序是指记录按下标的一定增量分组，对每一组使用 直接插入排序 ，
 * 随着增量逐渐减少，每组包含的关键字越来越多，当增量减少至 1 时，
 * 整个序列恰好被分成一组，算法便终止。
 * 不稳定算法
 * 时间复杂度o(n^1-2) 
 * 最优：o(n)
 * 最糟：o(n^2)
 * 空间复杂度：O(1)
 */
function ShellSort(array &$arr)
{
    $count = count($arr);   //统计出数组的长度
    if ($count <= 1) { // 如果个数为空或者1，则原样返回数组
        return $arr;
    }
    $inc = $count;    //增量
    do {
        //计算增量
        //$inc = floor($inc / 3) + 1;
        $inc = ceil($inc / 2);
        for ($i = $inc; $i < $count; $i++) {
            $temp = $arr[$i];    //设置哨兵
            //需将$temp插入有序增量子表
            for ($j = $i - $inc; $j >= 0 && $arr[$j + $inc] < $arr[$j]; $j -= $inc) {
                $arr[$j + $inc] = $arr[$j]; //记录后移
            }
            //插入
            $arr[$j + $inc] = $temp;
        }
        //增量为1时停止循环
    } while ($inc > 1);
    return $arr;
}

$arrtest = [12, 43, 54, 33, 23, 14, 44, 53, 10, 3, 56]; //测试数组
$res = ShellSort($arrtest);
print_r($res);
var_dump(memory_get_usage());
