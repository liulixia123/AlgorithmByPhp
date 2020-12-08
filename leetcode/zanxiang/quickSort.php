<?php
//经典快排
function prination(&$arr,$begin,$end){
	$pivot = $end;
	$cur = $begin;
	for($i=$begin;$i<=$end;$i++){
		if($arr[$i]<$arr[$pivot]){
			swap($arr,$i,$cur++);					
		}
	}
	swap($arr,$pivot,$cur);
	return $pivot;
}
function swap(&$arr,$one,$other){
	$temp = $arr[$one];
	$arr[$one] = $arr[$other];
	$arr[$other] = $temp;
}
function quicksort(&$arr,$begin,$end){
	if($begin>$end) return;
	$pivot = prination($arr,0,$end);
	quicksort($arr,0,$pivot-1);
	quicksort($arr,$pivot+1,$end);
}


$arr = [3,1,5,2,5,3,2];
quicksort($arr,0,6);
echo "<pre>";
print_r($arr);