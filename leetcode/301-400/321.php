<?php
/**
 * 拼接最大数
 * 给定长度分别为 m 和 n 的两个数组，其元素由 0-9 构成，表示两个自然数各位上的数字。现在从这两个数组中选出 k (k <= m + n) 个数字拼接成一个新的数，要求从同一个数组中取出的数字保持其在原数组中的相对顺序。

求满足该条件的最大数。结果返回一个表示该最大数的长度为 k 的数组。

说明: 请尽可能地优化你算法的时间和空间复杂度。

示例 1:
输入:
nums1 = [3, 4, 6, 5]
nums2 = [9, 1, 2, 5, 8, 3]
k = 5
输出:
[9, 8, 6, 5, 3]
示例 2:
输入:
nums1 = [6, 7]
nums2 = [6, 0, 4]
k = 5
输出:
[6, 7, 6, 0, 4]
示例 3:
输入:
nums1 = [3, 9]
nums2 = [8, 9]
k = 3
输出:
[9, 8, 9]
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[]
     */
    function maxNumber($nums1, $nums2, $k) {
    	$res = [];
    	$len1 = count($nums1);
    	$len2 = count($nums2);
    	$len = min($len1,$k);
        for ($i = 0; $i <= $len; $i++) { 
        	if ($k - $i <= $len2){
        		# 取num1的i位, num2的k - i
                $tmp1 = $this->getMaXArr($nums1, $i);
                $tmp2 = $this->getMaXArr($nums2, $k - $i);
                # 合并
                $tmp = $this->merge($tmp1, $tmp2);                           
                if ($res < $tmp){
                    $res = $tmp;
                }
        	}
                
        
        }
        return $res;
    }
    //单个数组i位置组成最大值 单调栈递减
    function getMaXArr($nums,$i){
    	$stack = [];
    	# pop表示最多可以不要nums里几个数字，要不组成不了i位数字
    	$pop = count($nums)-$i;
    	foreach ($nums as $key => $num) {
    		while ($pop&&$stack&&end($stack)<$num) {
    			$pop-=1;
    			array_pop($stack);
    		}
    		array_push($stack,$num);
    	}
    	return array_slice($stack, 0,$i);

    }
    //合并两个数组
    function merge($nums1,$nums2){
    	/*$arrmerge=array();
	    while(count($tmp1) && count($tmp2)){
	        $arrmerge[] = $tmp1[0]>$tmp2[0]?array_shift($tmp1):(
	        	$tmp1[0]==$tmp2[0]?(count($tmp1)==1?array_shift($tmp2):array_shift($tmp1)):array_shift($tmp2));
	        	
	    }
	    return array_merge($arrmerge,$tmp1,$tmp2);*/
	    $k = $l = $r=0;
	    $res = [];
    	while($l<count($nums1) && $r<count($nums2))
    	{
    		if($nums1[$l]<$nums2[$r]) $res[$k++] = $nums2[$r++];
    		else if($nums1[$l]>$nums2[$r]) $res[$k++] = $nums1[$l++];
    		else
    		{
    			if($this->getNextStep($nums1,$nums2,$l,$r))
    				$res[$k++] = $nums1[$l++];
    			else
    				$res[$k++]=$nums2[$r++];
    		}
    	}
    	while($l<count($nums1)) $res[$k++] = $nums1[$l++];
    	while($r<count($nums2)) $res[$k++] = $nums2[$r++];
    	return $res;
    }

    private function getNextStep($nums1,$nums2,$l,$r)
    {
    	if($l>=count($nums1) && $r>=count($nums2)) return true;
    	if($r>=count($nums2)) return true;
    	if($l>=count($nums1)) return false;
    	if($nums1[$l]==$nums2[$r]) return $this->getNextStep($nums1,$nums2,$l+1,$r+1);
    	else if($nums1[$l]>$nums2[$r]) return true;
    	else return false;
    }
}

$obj = new Solution();
$nums1 = [3,4,6,5];
$nums2 = [9,1,2,5,8,3];

$k = 5;
echo "<pre>";
print_r($obj->maxNumber($nums1, $nums2, $k));
//[4,3,1,6,5,4,7,3,9,5,3,7,8,4,1,1,4,1,3,5,9]
//[4,3,1,6,5,4,7,3,9,5,3,7,8,4,1,3,5,9,1,1,4]