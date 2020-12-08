<?php
function heapSort(&$arr){
	$length = count($arr);
	if($length==0) return ;
	//从叶子节点开始向上调整大根堆
	for ($i=intval($length/2)-1; $i >=0; $i--) { 
		heapify($arr,$length,$i);
	}
	for ($i=$length-1; $i >=0 ; $i--) { 
		$temp = $arr[0];
		$arr[0] = $arr[$i];
		$arr[$i] = $temp;
		heapify($arr,$i,0);//交换根和最后一个元素
	}
}
//构建大根堆
function heapinsert($arr){
	while($arr[$index]>$arr[$index]){

	}
}
function heapify(&$arr,$length,$i){
	$left = 2*$i+1;
	$right = 2*$i+2;
	$lagest = $i;
	if($left<$length&&$arr[$left]>$arr[$lagest]){
		$lagest = $left;
	}
	if($right<$length&&$arr[$right]>$arr[$lagest]){
		$lagest = $right;
	}
	if($lagest!=$i){
		//交换
		$temp = $arr[$i];
		$arr[$i] = $arr[$lagest];
		$arr[$lagest] = $temp;
		heapify($arr,$length,$lagest);
	}

}

function main1(){
	$arr = array(6,3,8,6,4,2,9,5,1);	
	heapSort($arr);
	print_r($arr);
}
main1();