<?php
/**
 * 有序矩阵中第K小的元素
 * 给定一个 n x n 矩阵，其中每行和每列元素均按升序排序，找到矩阵中第 k 小的元素。
请注意，它是排序后的第 k 小元素，而不是第 k 个不同的元素。
示例：

matrix = [
   [ 1,  5,  9],
   [10, 11, 13],
   [12, 13, 15]
],
k = 8,

返回 13。

 */
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    public function kthSmallest($matrix, $k) {
        $n = count($matrix);
        $low = $matrix[0][0];
        $height = $matrix[$n-1][$n-1];
        while($low<=$height){
        	$mid = $low+(($height-$low)>>1);
        	$count = $this->countInMatrix($matrix,$mid);        	
        	if($count<$k){
        		$low = $mid+1;
        	}else{
        		$height = $mid-1;
        	}
        }
        return $low;
        
    }
    public function countInMatrix($matrix,$mid){
    	$n = count($matrix);
    	$count = 0;//记录比中间元素小的个数有几个
    	$row = 0;//行
    	$column = $n-1;//列
    	while($row<$n&&$column>=0){
    		if($mid>=$matrix[$row][$column]){//最右边小于目标元素就切换到下一行
    			$row++;
    			$count +=$column +1;
    		}else{
    			$column--;//往左遍历
    		}
    	}
    	return $count;
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->kthSmallest([[ 1,  5,  9],[10, 11, 13],[12, 13, 15]],8));