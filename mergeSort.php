<?php

/**
 * 归并排序
 * 归并排序的原理就是把一个数组从中间开始分成左右两个数组，
 * 对左右两个数组进行排序，最后对排序完的两个部分进行合并，就是一个有序的数组了。
 * 它的最优时间复杂度为O(nlogn)
 * 最糟糕时间复杂度为O(nlogn)
 * 平均时间复杂度O(nlogn)
 * 空间复杂度O(n)
 * 稳定算法
 */

// 递归 数组引用
function mergeSort(&$arr, $left, $right)
{
    if ($left < $right) {
        // 找出中间索引
        $mid = floor(($left + $right) / 2); //向下取整
        // 对左边数组进行递归
        mergeSort($arr, $left, $mid);
        // 对右边数组进行递归
        mergeSort($arr, $mid + 1, $right);
        // 合并
        merge($arr, $left, $mid, $right);
    }
    return $arr;
}

// 将两个有序数组合并成一个有序数组
function merge(&$arr, $left, $mid, $right)
{
    $i = $left;     // 左数组的起始下标
    $j = $mid + 1;  // 右数组的起始下标
    $temp = array(); // 临时合并数组    空间复杂度O(n)
    // 扫描第一段和第二段序列，直到有一个扫描结束
    while ($i <= $mid && $j <= $right) {
        // 判断第一段和第二段取出的数哪个更小，将其存入合并序列，并继续向下扫描
        if ($arr[$i] < $arr[$j]) {
            $temp[] = $arr[$i];
            $i++;
        } else {
            $temp[] = $arr[$j];
            $j++;
        }
    }
    // 比完之后，假如左数组仍有剩余，则直接全部复制到 temp 数组
    while ($i <= $mid) {
        $temp[] = $arr[$i];
        $i++;
    }
    // 比完之后，假如右数组仍有剩余，则直接全部复制到 temp 数组
    while ($j <= $right) {
        $temp[] = $arr[$j];
        $j++;
    }
    // 将合并序列复制到原始序列中
    for ($k = 0; $k < count($temp); $k++) {
        $arr[$left + $k] = $temp[$k];
    }
}

$arrtest = [12, 43, 54, 33, 23, 14, 44, 53, 10, 3, 56]; //测试数组
$res = mergeSort($arrtest, 0, count($arrtest) - 1); //0：数组首位元素，count($arrtest)-1：数组末位元素
print_r($res);
var_dump(memory_get_usage());