<?php

/**
 * 快速排序
 * 实现思路：把第一个元素作为标记，依次判断后续的值，
 * 如果小于它则放在左边，如果大于它则放右边，
 * 同理把左右两部分看成一个整体一直递归，最后再数组拼接起来
 * 它的最优时间复杂度为O(nlogn)【以标记元素为中心，正好每次左右都能均匀分配】
 * 最糟糕时间复杂度为O(n^2)【标记元素每次是最大或最小值，使所有数都划分到一边】
 * 平均时间复杂度O(nlogn)
 * 空间复杂度O(nlogn)
 * 不稳定算法
 */
function quickSort($arr)
{
    $count = count($arr);   //统计出数组的长度
    if ($count <= 1) { // 如果个数为空或者1，则原样返回数组
        return $arr;
    }
    $index = $arr[0]; // 把第一个元素作为标记
    $left = [];     //定义一个左空数组
    $right = [];    //定义一个右空数组
    for ($i = 1; $i < $count; $i++) {   //从数组的第二数开始与第一个标记元素作比较
        if ($arr[$i] < $index) {        //如果小于第一个标记元素则放进left数组
            $left[] = $arr[$i];
        } else {                        //如果大于第一个标记元素则放进right数组
            $right[] = $arr[$i];
        }
    }
    //递归
    $left  = quickSort($left);      //把left数组再看成一个新参数，再递归调用，执行以上的排序
    $right = quickSort($right);     //把right数组再看成一个新参数，再递归调用，执行以上的排序
    return array_merge($left, [$arr[0]], $right);   //最后把每一次的左数组、标记元素、右数组拼接成一个新数组
}

$arrtest = [12, 43, 54, 33, 23, 14, 44, 53, 10, 3, 56]; //测试数组
$res = quickSort($arrtest);
print_r($res);
var_dump(memory_get_usage());
