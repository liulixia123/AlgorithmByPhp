<?php
/**
 * 通配符匹配
 * 和10题正则表达式相似，但是也不同，* 号前可以没有字符
 */

class Solution{
	function isMatch($s,$p){
		$m = strlen($s);
	    $n = strlen($p);
	    if($n==0) return $m==0;
		if($m==0&&$n==1) return false;
	    $dp = array_fill(0,$m+1,array_fill(0,$n+1,false));
	    $dp[0][0] = true;
	    for ($i=1; $i <=$n; $i++) { 
	    	if($p[$i-1]=="*") $dp[0][$i] = $dp[0][$i-1];
	    }
	    echo "<pre>";
	    print_r($dp);
	    for ($i=1; $i <=$m; $i++) { 
	    	for ($j=1; $j <=$n; $j++) { 
	    		if($p[$j-1]=="*"){
	    			$dp[$i][$j] = $dp[$i-1][$j]||$dp[$i][$j-1];
	    		}else{
	    			$dp[$i][$j] = ($s[$i-1]==$p[$j-1]||$p[$i-1]=="?")&&$dp[$i-1][$j-1];
	    		}
	    	}
	    }
	    return $dp[$m][$n];
	}
}
$obj = new Solution();
$s = "adceb";
$p = "*a*b";
var_dump($obj->isMatch($s,$p));