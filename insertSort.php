<?php

/**
 * 插入排序基本思路：将数组分为两个区(已排序区和未排序区)，
 * 假定数组的第一个元素处于已排序区， 
 * 第一个元素之后的所有元素都处于未排序部分。
 * 排序时用到双层循环，外层循环用于从未排序部分中取出待排序元素，并逐步缩小未排序部分，
 * 内层循环用于从已排序部分寻找插入位置（即不断地从已排序部分寻找比待排序元素大的元素）， 
 * 然后将较大的已排序区的元素后移
 * 而已排序区中间空出一个位置，最后将待排序元素插入元素后移之后留下的空位。
 * 它的最优时间复杂度为O(n)
 * 最糟糕时间复杂度为O(n^2)
 * 平均时间复杂度O(n^2)
 * 空间复杂度O(1)
 * 稳定算法
 */
function insertSort($arr)
{
    $count = count($arr);       //统计出数组的长度
    if ($count <= 1) {  // 如果个数为空或者1，则原样返回数组
        return $arr;
    }
    //外层循环用于从【未排序区域】中取出待排序元素，顺序获取
    for ($i = 1; $i < $count; $i++) {   //执行n次
        //获取【当前需要插入已排序区域的元素值】
        $temp = $arr[$i];   //存储变量 O(1) 空间复杂度
        //内层循环用于从【已排序区域】寻找待排序元素的插入位置
        for ($j = $i - 1; $j >= 0; $j--) {  //执行n次
            //总执行n*n次
            //如果$arr[$i]比已排序区域的$arr[$j]小，就后移$arr[$j]
            if ($temp < $arr[$j]) { //升序
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $temp;
            } 
            // else {
            //     //如果$arr[$i]不小于$arr[$j]，则对已排序区无需再排序
            //     break;
            // }
        }
    }
    return $arr;
}

$arrtest = [60, 43, 54, 33, 23, 14, 1, 44, 53, 10, 3, 56]; //测试数组
$res = insertSort($arrtest);
print_r($res);
var_dump(memory_get_usage());
