<?php
/**
 * 汉诺塔问题
 * @return [type] [description]
 */
function hanota($n,$from,$to,$help){
	if($n==1){
		echo "move 1 from".$from."to".$to."<br>";
		return ;
	}
	hanota($n-1,$from,$help,$to);
	echo "move ".$n." from".$from."to".$to."<br>";
	hanota($n-1,$help,$to,$from);
}

hanota(3,"左","右","中");