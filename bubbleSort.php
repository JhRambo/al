<?php

/**
 * 冒泡排序
 * 实现思路：每次从数组里面选出一个最大值，一直递归
 * 它的最优时间复杂度为O(n)【正序，数组排好情况下】
 * 最糟糕时间复杂度为O(n^2)【反序：数组排序刚好相反】
 * 平均时间复杂度O(n^2)
 * 稳定算法
 * 我是master分支代码
 * 我是dev分支的代码
 * ooxx
 * aaaa
 * bbbb
 */

// function bubbleSort($arr)
// {
//     $count = count($arr);       //统计出数组的长度
//     if ($count <= 1) {  // 如果个数为空或者1，则原样返回数组
//         return $arr;
//     }
//     for ($i = 1; $i < $count; $i++) {       //控制需要排序的轮数，该例子共需要比较10轮
//         for ($j = 0; $j < $count - $i; $j++) {  //控制每一轮需要比较的次数，每轮选出最大的一个值放在最后
//             if ($arr[$j] > $arr[$j + 1]) {
//                 $temp = $arr[$j];           //通过$temp介质把大的值放在后面
//                 $arr[$j] = $arr[$j + 1];
//                 $arr[$j + 1] = $temp;
//             }
//         }
//     }
//     return $arr;       //返回最终结果
// }

function bubbleSort($arr)
{
    $count = count($arr);       //统计出数组的长度
    if ($count <= 1) {  // 如果个数为空或者1，则原样返回数组
        return $arr;
    }
    // 第一层可以理解为从数组中键为0开始循环到最后一个
    for ($i = 0; $i < count($arr); $i++) {
        // 第二层为从$i+1的地方循环到数组最后
        for ($j = $i + 1; $j < count($arr); $j++) {
            // 比较数组中两个相邻值的大小
            if ($arr[$i] > $arr[$j]) {
                $temp = $arr[$i]; // 这里临时变量，存贮$i的值
                $arr[$i] = $arr[$j]; // 第一次更换位置
                $arr[$j] = $temp; // 完成位置互换
            }
        }
    }
    return $arr;       //返回最终结果
}

$arrtest = [12, 43, 54, 33, 23, 14, 44, 53, 10, 3, 56]; //测试数组
$res = bubbleSort($arrtest);
print_r($res);
var_dump(memory_get_usage());
