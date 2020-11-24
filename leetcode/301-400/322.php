<?php
/**
 * 零钱置换
 */

Class Solution{
	function coinChange($coins,$amount){		
		$n = count($coins);
		if($n==0||$amount==0) return 0;		
		$dp = array_fill(1, $amount, $amount+1);
	  	
		for ($i=1; $i<=$amount; $i++) { 
			foreach($coins as $coin){
				if ($coin > $i) continue;
				$dp[$i] = min($dp[$i],$dp[$i-$coin]+1);
				
			}
		}
		return $dp[$amount]>$amount?-1:$dp[$amount];
	}
}

$s = new Solution();
var_dump($s->coinChange([1,2,5],11));