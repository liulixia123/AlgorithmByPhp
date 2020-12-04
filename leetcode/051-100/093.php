<?php
/**
 * 复原IP
 * 给定一个只包含数字的字符串，复原它并返回所有可能的 IP 地址格式。

示例:
输入: "25525511135"
输出: ["255.255.11.135", "255.255.111.35"]
解题思路

 */
class Solution{
	function restoreIpAddresses($s){
		if($s==''||strlen($s)<4||strlen($s)>12) return [];
		$result = [];
		for ($i=1; $i <= 3; $i++) { 
			$w1 = substr($s, 0,$i);
			if(!$this->isNum($w1))
				continue;
			for ($j=$i+1; $j <$i+4 ; $j++) { 
				$w2 = substr($s,$i,$j);
				if(!$this->isNum($w2))
					continue;
				for($k=$j+1;$k<$j+4;$k++){
					$w3 = substr($s,$j,$k);
					$w4 = substr($s,$k+1);
					echo $w1."==".$w2."--".$w3."---",$w4."<br>";
					if(!$this->isNum($w3)||!$this->isNum($w4)){
						continue;
					}
					$result[] = $w1.".".$w2.".".$w3.".".$w4;
				}
			}
		}
		return $result;
	}
	function isNum($num){
		if($num&&(0<$num&&$num<=255)&&strval(intval($num))==$num) return true;
		return false;
	}
}
$obj = new Solution();
echo "<pre>";
$s = "25525511135";
var_dump($obj->restoreIpAddresses($s));