<?php
function mergeSort(&$arr,$left,$right,$temp){
	if($left<$right){
		$mid = $left+(($right-$left)>>1);		
		mergeSort($arr,$left,$mid,$temp);
		mergeSort($arr,$mid+1,$right,$temp);
		merger($arr,$left,$mid,$right,$temp);
	}else{
		return ;
	}
}
function merger(&$arr,$left,$mid,$right,$temp){
	$i = $left;
	$j = $mid+1;
	$k = 0;
	while ($i<=$mid&&$j<=$right) {
		$temp[$k++] = $arr[$i]<$arr[$j]?$arr[$i++]:$arr[$j++];
	}
	while ($i<=$mid) {
		$temp[$k++] = $arr[$i++];
	}
	while ($j<=$right) {
		$temp[$k++] = $arr[$j++];
	}
	for ($t=0; $t <$k; $t++) { 
		$arr[$left+$t] = $temp[$t];
	}
	return;
}

function main1(){
	$arr = array(6,3,8,6,4,2,9,5,1);
	$temp = [];
	mergeSort($arr,0,8,$temp);
	print_r($arr);
}
main1();
