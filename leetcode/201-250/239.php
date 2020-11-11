<?php
/**
 * 滑动窗口最大值
 * 双端队列求解时间复杂度O(n)
 */
class Solution{
	function maxSlidingWindow($nums,$k){
		$len = count($nums);
		if($len==0||$k<=0||$k>$len) return [];
		$dq = [];
		$ret = [];
		$i=0;
		//如果队列不为空就判断新数据和队尾元素的大小，如果队尾元素小于新数据，那么我们可以确定，在包含队尾元素和新数据的窗口里面，一定是新数据最大，有了这个假设，我们就可以把队尾元素移除队列，然后重复这个比较，直到遇到一个比新数据大的数才停止出队列，然后再把新数据插入。
		for (; $i < $k; $i++) { 
			while(!empty($dq)&&$nums[end($dq)]<$nums[$i]){// 在插入新数据的时候，如果队列为空就直接插入
				array_pop($dq);
			}
			array_push($dq,$i);
		}
		array_push($ret,$nums[reset($dq)]);//队头放最大值
		while($i < $len){
            //判断队头的值是否已经不在滑动窗口中了
            if($i - reset($dq) >= $k) array_shift($dq);
            while(!empty($dq) && $nums[end($dq)] < $nums[$i])
                array_pop($dq);
            array_push($dq,$i);
            $i++;
            array_push($ret,$nums[reset($dq)]);
        }
        return $ret;
	}
}

$s = new Solution();
var_dump($s->maxSlidingWindow([1,3,-1,-3,5,3,6,7],3));