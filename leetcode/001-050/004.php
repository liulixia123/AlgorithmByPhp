<?php
/**题目
There are two sorted arrays nums1 and nums2 of size m and n respectively.
Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).
You may assume nums1 and nums2 cannot be both empty.
Example 1:
nums1 = [1, 3]
nums2 = [2]
The median is 2.0
Example 2:
nums1 = [1, 2]
nums2 = [3, 4]
The median is (2 + 3)/2 = 2.5
意思就是给定两个数组为 m 和 n 的有序数组 nums1 和 nums2。
请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
你可以假设 nums1 和 nums2 不会同时为空。
解题思路
给出两个有序数组，要求找出这两个数组合并以后的有序数组中的中位数。要求时间复杂度为
O(log (m+n))。
这⼀题最容易想到的办法是把两个数组合并，然后取出中位数。但是合并有序数组的操作是
O(max(n,m)) 的，不符合题意。看到题⽬给的 log 的时间复杂度，很容易联想到⼆分搜索。
由于要找到最终合并以后数组的中位数，两个数组的总⼤⼩也知道，所以中间这个位置也是知道
的。只需要⼆分搜索⼀个数组中切分的位置，另⼀个数组中切分的位置也能得到。为了使得时间复
杂度最⼩，所以⼆分搜索两个数组中⻓度较⼩的那个数组。
关键的问题是如何切分数组 1 和数组 2 。其实就是如何切分数组 1 。先随便⼆分产⽣⼀个
midA ，切分的线何时算满⾜了中位数的条件呢？即，线左边的数都⼩于右边的数，即，
nums1[midA-1] ≤ nums2[midB] && nums2[midB-1] ≤ nums1[midA] 。如果这些条件都不满
⾜，切分线就需要调整。如果 nums1[midA] < nums2[midB-1] ，说明 midA 这条线划分出来左
边的数⼩了，切分线应该右移；如果 nums1[midA-1] > nums2[midB] ，说明 midA 这条线划分
出来左边的数⼤了，切分线应该左移。经过多次调整以后，切分线总能找到满⾜条件的解。
假设现在找到了切分的两条线了， 数组 1 在切分线两边的下标分别是 midA - 1 和 midA 。 数
组 2 在切分线两边的下标分别是 midB - 1 和 midB 。最终合并成最终数组，如果数组长度是奇
数，那么中位数就是 max(nums1[midA-1], nums2[midB-1]) 。如果数组长度是偶数，那么中间
位置的两个数依次是： max(nums1[midA-1], nums2[midB-1]) 和 min(nums1[midA],
nums2[midB]) ，那么中位数就是 (max(nums1[midA-1], nums2[midB-1]) +
min(nums1[midA], nums2[midB])) / 2 。图示⻅下图：

*/

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $k = intval((count($nums1) + count($nums2) + 1) / 2 );
        if((count($nums1) + count($nums2))%2 == 1){
            //奇数
            $median = $this->getKthEle($nums1, $nums2, $k);
        }else{
             //偶数
            $median1 = $this->getKthEle($nums1, $nums2, $k);
            $median2 = $this->getKthEle($nums1, $nums2, $k+1);
            $median = ($median1 + $median2) / 2;
        }

        return $median;
    }

    //返回第k大的数
    function getKthEle($nums1, $nums2, $k){
        //二分法，每次排除一半的元素
        $length1 = count($nums1);
        $length2 = count($nums2);
        $index1 = 0;
        $index2 = 0;
        while($k > 0){
            //边界情况
            if($index1 == $length1){
                return $nums2[$index2 + $k -1];
            }

            if($index2 == $length2){
                return $nums1[$index1 + $k - 1];
            }

            //当前找的就是第k小的值
            if($k == 1){
                return min($nums1[$index1], $nums2[$index2]);    
            }
            //对比元素
            $ele1 = min($index1 + $k / 2 - 1, $length1 - 1);
            $ele2 = min($index2 + $k / 2 - 1, $length2 - 1);
            if($nums1[$ele1] > $nums2[$ele2]){
                $rm = min(intval($k / 2), $length2);//真实的移除元素数
                $index2 += $rm;
            }else{
                $rm = min(intval($k / 2), $length1);//真实的移除元素数
                $index1 += $rm;
            }
            $k -= $rm;
        }

        return 0;
    }
}
$s = new Solution();
print_r($s->findMedianSortedArrays([-1, -2], [3]));