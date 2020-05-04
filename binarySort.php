<?php

/**
 * 二分查找算法
 * @param array $arr 待查找区间
 * @param int $number 查找数
 * @return int        返回找到的键
 * 时间复杂度:O(logn)
 */
function binarySearch($arr, $number)
{
    // 非数组或者数组为空，直接返回-1
    if (!is_array($arr) || empty($arr)) {
        return -1;
    }
    // 初始变量值
    $len = count($arr);
    $lower = 0;
    $high = $len - 1;
    // 最低点比最高点大就退出
    while ($lower <= $high) {
        // 以中间点作为参照点比较
        $middle = intval(($lower + $high) / 2);
        if ($arr[$middle] > $number) {
            // 查找数比参照点小，舍去右边
            $high = $middle - 1;
        } else if ($arr[$middle] < $number) {
            // 查找数比参照点大，舍去左边
            $lower = $middle + 1;
        } else {
            // 查找数与参照点相等，则找到返回
            return $middle;
        }
    }
    // 未找到，返回-1
    return -1;
}

$arrtest = [1, 3, 9, 12, 32, 41, 45, 62, 75, 77, 82, 95, 99]; //测试数组
$res = binarySearch($arrtest, 82);
print_r($res);
var_dump(memory_get_usage());
