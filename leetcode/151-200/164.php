<?php
/**
 * 最大间距  困难
 * 给定一个无序的数组，找出数组在排序之后，相邻元素之间最大的差值。

如果数组元素个数小于 2，则返回 0。
示例 1:
输入: [3,6,9,1]
输出: 3
解释: 排序后的数组是 [1,3,6,9], 其中相邻元素 (3,6) 和 (6,9) 之间都存在最大差值 3。
示例 2:
输入: [10]
输出: 0
解释: 数组元素个数小于 2，因此返回 0。
说明:

你可以假设数组中所有元素都是非负整数，且数值在 32 位有符号整数范围内。
请尝试在线性时间复杂度和空间复杂度的条件下解决此问题。
如果数组中的元素个数小于2，直接返回0即可。

对于n（n >= 2）个元素，假设其中的最大值是max，最小值是min。

如果max和min相等，显然我们应该返回0。

否则，为其准备n + 1个桶，每个桶中的数字区间尽量平均分配，即第一个桶中存放[min, min + capacity)区间内的数字，最后一个桶中存放[max - capacity, max]区间内的数字。显然，max和min已经保证了第一个桶和最后一个桶不是空桶。

显然，将n个元素放进n + 1个桶里，至少会有一个空桶。同一个桶内的差值必然小于capacity，而间隔一个空桶的差值必然会大于capacity。因此，最大差值只可能在空桶的两边产生，即空桶的后一个非空桶的最小值减去空桶的前一个非空桶的最大值。

由此计算方式，我们也可以发现，我们无需保存桶中的所有元素，只需保存桶中的最大值和最小值即可，即数组maxBuckets和minBuckets，其初始化均为-1，表示为空桶。

如何一次遍历maxBuckets和minBuckets数组来求出最大差值呢？

我们需要用一个pre指针保存前一个非空桶的最大值，由于min一定在第一个桶，所以第一个桶一定非空，这为我们的计算带来了方便。一旦遇到非空桶，我们就更新结果result和pre指针的值即可。

时间复杂度和空间复杂度均是O(n)，其中n为数组中的元素个数
 */
class Solution {

    /**
     * 桶排序
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumGap($nums) {
    	if(empty($nums)||count($nums)<2) return 0;
    	$min = PHP_INT_MAX;//最小值
    	$max = 0;//最大值
        //计算最大值和最小值
    	foreach ($nums as $key => $num) {
    		$max = $max<$num?$num:$max;
    		$min = $min>$num?$num:$min;
    	}
    	if($max == $min) return 0;
    	$n = count($nums);
    	$maxBuckets  = array_fill(0, $n+1,-1);
    	$minBuckets  = array_fill(0, $n+1,-1);
        //计算桶的数量
    	$capacity = ceil(($max-$min)/($n+1));
    	for ($i=0; $i < $n; $i++) { 
            //将每个元素放入桶
    		$index = ($nums[$i]-$min)/$capacity;
    		if($nums[$i]==$max){
    			//最大值放在最后一个桶
    			$index = $n;
    		}
    		if($maxBuckets[$index]==-1){
    			$maxBuckets[$index] = $nums[$i];
    		}elseif($maxBuckets[$index]<$nums[$i]){
    			$maxBuckets[$index] = $nums[$i];
    		}
    		if($minBuckets[$index]==-1){
    			$minBuckets[$index] = $nums[$i];
    		}elseif($minBuckets[$index]>$nums[$i]){
    			$minBuckets[$index] = $nums[$i];
    		}
    	}
    	$result = 0;
    	$pre = $maxBuckets[0];//第一个桶有min但一定不是空桶
    	for ($i=1; $i < count($maxBuckets); $i++) { 
    		if($maxBuckets[$i]!=-1){
    			$result = max($result,$minBuckets[$i]-$pre);
    			$pre = $maxBuckets[$i];
    		}
    	}
    	return $result;
    }

    function maximumGap1($nums){
        if(empty($nums)||count($nums)<2) return 0;
        $n = count($nums);
        //计算桶的最大值和最小值
        $max = 0;
        $min = PHP_INT_MAX;
        for ($i=0; $i < $n; $i++) { 
            $max = max($max,$nums[$i]);
            $min = min($min,$nums[$i]);
        }
        //创建n+1个桶
        $buckets = [];
        //最小值放在第一个桶，最大值放在最后一个桶，桶里只维护一个最大值和一个最小值
        $buckets[0]['min'] = $min;
        $buckets[0]['max'] = $min;        
        $buckets[$n]['max'] = $max;       
        $buckets[$n]['min'] = $max;       
        //计算桶的取值容量
        $capacity = ceil(($max-$min)/($n+1));
        for ($i=0; $i < $n; $i++) { 
            $index = intval(($nums[$i]-$min)/$capacity);            
            if(!$buckets[$index]){               
               $buckets[$index]['min'] = $nums[$i];
               $buckets[$index]['max'] = $nums[$i]; 
            }else{               
                $buckets[$index]['min'] = min($buckets[$index]['min'],$nums[$i]);
                $buckets[$index]['max'] = max($nums[$i],$buckets[$index]['max']); 
            }            
        }
        $result = 0;
        $pre = $buckets[0]['max'];        
        for ($i=1; $i < $n+1; $i++) { 
            if($buckets[$i]){
                $result = max($result,$buckets[$i]['min']-$pre);
                $pre = $buckets[$i]['max'];
            }
            
        }
        return $result;
    }
}
$obj = new Solution();
$nums = [3,6,9,1];
var_dump($obj->maximumGap1($nums));