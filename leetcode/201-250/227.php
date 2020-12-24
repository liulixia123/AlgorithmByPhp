<?php
/**
 * 表达式计算 只有+，-，*，/
 * 
Input: "3+2*2"
output: 7
Input: "1-5/2"
Output:-1
 */
class Solution{
	function calculate($s){
		if($s=="") return 0;
		$stack = [];
		$pre = 0;
		for ($i=0; $i < strlen($s); $i++) { 
			if($s[$i]>'0'&&$s[$i]<='9'){
				$pre = $pre*10+intval($s[$i]);
			}else{
				array_push($stack,$pre);
				array_push($stack,$s[$i]);
				$pre = 0;
			}
		}
		array_push($stack,$pre);		
		while (count($stack)!=1) {
			$t1 = array_pop($stack);
			$t2 = array_pop($stack);
			switch ($t2) {
				case '+':
					$t3 = array_pop($stack);
					array_push($stack,$t3+$t1);
					break;
				case '-':
					$t3 = array_pop($stack);
					array_push($stack,$t1-$t3);
					break;
				case '*':
					$t3 = array_pop($stack);
					array_push($stack,$t3*$t1);
					break;
				case '/':
					$t3 = array_pop($stack);
					array_push($stack,intval($t1/$t3));
					break;
				default:
					# code...
					break;
			}
		}
		return array_pop($stack);

	}
}

$obj = new Solution();
echo $obj->calculate("2-1+2");