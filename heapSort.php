<?php
//因为是数组,下标从0开始,所以,下标为n根结点的左子结点为2n+1,右子结点为2n+2;  
//初始化值,建立初始堆
/**
 * 堆用来进行全排序，时间复杂度是 最优：O(nlogn) 最差：O(nlogn) 平均：O(nlogn)
 * 而快排用来全排序，平均时间复杂度也是 O(nlogn)
 * 空间复杂度O(1)
 * 但堆排序可以用来求 TopK 时，堆的时间复杂度为 O(Klog2(n)，因为它只需要进行 K 轮排序即可。 
 */
$arr = array(49, 38, 65, 97, 76, 13, 27, 50);
$arrSize = count($arr);

//将第一次排序抽出来，因为最后一次排序不需要再交换值了。
$res = buildHeap($arr, $arrSize);

for ($i = $arrSize - 1; $i > 0; $i--) {
    swap($arr, $i, 0);
    $arrSize--;
    buildHeap($arr, $arrSize);
}

//用数组建立最小堆
function buildHeap(&$arr, $arrSize)
{
    //计算出最开始的下标$index,如图,为数字"97"所在位置,比较每一个子树的父结点和子结点,将最小值存入父结点中
    //从$index处对一个树进行循环比较,形成最小堆
    for ($index = intval($arrSize / 2) - 1; $index >= 0; $index--) {
        //如果有左节点,将其下标存进最小值$min
        if ($index * 2 + 1 < $arrSize) {
            $min = $index * 2 + 1;
            //如果有右子结点,比较左右结点的大小,如果右子结点更小,将其结点的下标记录进最小值$min
            if ($index * 2 + 2 < $arrSize) {
                if ($arr[$index * 2 + 2] < $arr[$min]) {
                    $min = $index * 2 + 2;
                }
            }
            //将子结点中较小的和父结点比较,若子结点较小,与父结点交换位置,同时更新较小
            if ($arr[$min] < $arr[$index]) {
                swap($arr, $min, $index);
            }
        }
    }
    return $arr;
}

//此函数用来交换下数组$arr中下标为$one和$another的数据
function swap(&$arr, $one, $another)
{
    $tmp = $arr[$one];
    $arr[$one] = $arr[$another];
    $arr[$another] = $tmp;
}
