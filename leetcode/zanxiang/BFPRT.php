<?PHP
/**
 * 无序数组里不用排序找到第K个小的数
 * 时间复杂度O(n)
 */
function BFPRT(&$arr,$left,$right,$k){
	$pivot_index = getPivotIndex($arr,$left,$right);	
	$partition_index = partition($arr,$left,$right,$pivot_index);	
	$num = $partition_index-$left+1;
	if($num==$k){
		return $partition_index;
	}elseif($num>$k){
		return BFPRT($arr,$left,$partition_index-1,$k);
	}else{
		return BFPRT($arr,$partition_index+1,$right,$k-$num);
	}
}
//插入排序并返回中位数
function insertSort(&$arr,$left,$right){
	for ($i=$left+1; $i < $right; $i++) { 
		$temp = $arr[$i];
		$j = $i-1;
		while ($j>=$left&&$arr[$j]>$temp) {
			$arr[$j+1] = $arr[$j];
			$j--;
		}
		$arr[$j+1] = $temp;
	}
	return (($right-$left)>>1)+$left;
}
//数组每5个一组，取中位数
function getPivotIndex(&$arr,$left,$right){
	if($right-$left<5){
		return insertSort($arr,$left,$right);
	}
	$sub_right = $left-1;
	//每五个一组取出中位数
	for ($i=$left; $i+4 <= $right; $i+=5) { 
		$index = insertSort($arr,$i,$i+4);
		swap($arr,++$sub_right,$index);
	}
	//利用BFPRT得到中位数的中位数
	BFPRT($arr,$left,$sub_right,(($sub_right-$left+1)>>1)+1);
}
//划分区，比pivot小放在左边 大的放在右边
function partition(&$arr,$left,$right,$pivot_index){
	swap($arr,$pivot_index,$right);
	$pivot_index = $left;
	for ($i=$left; $i < $right; $i++) { 
		if($arr[$i]<$arr[$right]){
			swap($arr,$pivot_index++,$i);
		}
	}
	swap($arr,$pivot_index,$right);
	return $pivot_index;
}

function swap(&$arr,$i,$j){
	$temp = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$i] = $temp;
}

$arr = [11,9,10,1,3,12,5,6,8,14,7];
$k = 4;

//echo insertSort([2,3,1,4,5],0,4);
echo BFPRT($arr,0,11,$k);
print_r($arr);
echo $arr[BFPRT($arr,0,11,$k)];