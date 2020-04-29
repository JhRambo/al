<?php

/**
 * 归并排序
 * 归并排序的原理就是把一个数组从中间开始分成左右两个数组，
 * 对左右两个数组进行排序，最后对排序完的两个部分进行合并，就是一个有序的数组了。
 * 它的最优时间复杂度为O(nlogn)
 * 最糟糕时间复杂度为O(nlogn)
 * 平均时间复杂度O(nlogn)
 * 稳定算法
 */

function merge_sort($nums)
{
    if (count($nums) <= 1) {
        return $nums;
    }
    merge_sort_c($nums, 0, count($nums) - 1);
    return $nums;
}

function merge_sort_c(&$nums, $p, $r)
{
    if ($p >= $r) {
        return;
    }
    $middle = floor(($p + $r) / 2);
    merge_sort_c($nums, $p, $middle);
    merge_sort_c($nums, $middle + 1, $r);
    merge($nums, ['start' => $p, 'end' => $middle], ['start' => $middle + 1, 'end' => $r]);
}

function merge(&$nums, $array_p, $array_r)
{
    $temp = [];
    $p = $array_p['start'];
    $r = $array_r['start'];
    $k = 0;
    while ($p <= $array_p['end'] && $r <= $array_r['end']) {
        if ($nums[$p] < $nums[$r]) {
            $temp[$k++] = $nums[$p++];
        } else {
            $temp[$k++] = $nums[$r++];
        }
    }
    while ($p <= $array_p['end']) {
        $temp[$k++] = $nums[$p++];
    }
    while ($r <= $array_r['end']) {
        $temp[$k++] = $nums[$r++];
    }

    for ($i = 0; $i < $k; $i++) {
        $nums[$i + $array_p['start']] = $temp[$i];
    }
}

$arrtest = [12, 43, 54, 33, 23, 14, 44, 53, 10, 3, 56]; //测试数组
$res = merge_sort($arrtest);
print_r($res);
var_dump(memory_get_usage());
