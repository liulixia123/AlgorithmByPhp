<?php
/**
 * 正则表达式匹配
 * 给你一个字符串 s 和一个字符规律 p，请你来实现一个支持 ‘.’ 和 ‘*’ 的正则表达式匹配。

‘.’ 匹配任意单个字符
‘*’ 匹配零个或多个前面的那一个元素
所谓匹配，是要涵盖 整个 字符串 s的，而不是部分字符串。

说明:

s 可能为空，且只包含从 a-z 的小写字母。
p 可能为空，且只包含从 a-z 的小写字母，以及字符 . 和 *。
示例 1:
输入:
s = “aa”
p = “a”
输出: false
解释: “a” 无法匹配 “aa” 整个字符串。
示例2：
输入:
s = "aa"
p = "a*"
输出: true
解释: '*' 代表可匹配零个或多个前面的元素, 即可以匹配 'a' 。因此, 重复 'a' 一次, 字符串可变为 "aa"。
示例3：
输入:
s = "ab"
p = ".*"
输出: true
解释: ".*" 表示可匹配零个或多个('*')任意字符('.')。
示例4：
输入:
s = "aab"
p = "c*a*b"
输出: true
解释: 'c' 可以不被重复, 'a' 可以被重复一次。因此可以匹配字符串 "aab"。
示例5：
输入:
s = "mississippi"
p = "mis*is*p*."
输出: false
 */
class Solution{
	/**
	 * 动态规划求解
	 * @param  [type]  $s [description]
	 * @param  [type]  $p [description]
	 * @return boolean    [description]
	 */
	//难理解多看几遍
	//星号可能匹配了前面的字符的 0 个，也可能匹配了前面字符的多个，当匹配 0 个时，如 ab 和 abb*，或者 ab 和 ab.* ，这时我们需要去掉 p 中的 b* 或 .* 后进行比较，即 dp[i][j] = dp[i][j-2]；当匹配多个时，如 abbb 和 ab*，或者 abbb 和 a.*，我们需要将 s[i] 前面的与 p 重新比较，即 dp[i][j] = dp[i-1][j]
	function isMatch($s, $p) {
    $m = strlen($s);
    $n = strlen($p);
    if($n==0) return $m==0;
	if($m==0&&$n==1) return false;
    $f = array_fill(0,$m+1,array_fill(0,$n+1,false));

    $f[0][0] = true;
    for($k = 2; $k <= $n; $k++){
        $f[0][$k] = $f[0][$k - 2] && $p[$k - 1] == '*';
    }
    for($i = 1; $i <= $m; $i++){
        for($j = 1; $j <= $n; $j++){
            if($s[$i - 1] == $p[$j - 1] || $p[$j - 1] == '.'){
                $f[$i][$j] = $f[$i - 1][$j - 1];
            }
            if($p[$j - 1] == '*'){
                $f[$i][$j] = $f[$i][$j - 2] || 
                $f[$i - 1][$j] && ($s[$i - 1] == $p[$j - 2] || $p[$j - 2] == '.');
            }
        }
    }
    return $f[$m][$n];
}
}/**
	ismatch($s,$p){
		$m = strlen($s);
    	$n = strlen($p);
    	if($n==0) return $m==0;
		if($m==0&&$n==1) return false;
		
		if($p[0]=='*'){
			$match = ($s[0]==$p[-1])||ismatch($s[0],$p[1:])&&($s[0]==$p[0]||$p[0]=='.');
		}else{
			$match = ($s[0]==$p[0])||$p[0]=='.';
			ismatch($s[1:],$p[1:])
		}
	}
*/
$obj = new Solution();
$s = "aab";
$p = "c*a*b";
var_dump($obj->isMatch($s,$p));