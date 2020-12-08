<?php
/**
 * 将数组拆分成斐波那契序列
 * 给定一个数字字符串 S，比如 S = "123456579"，我们可以将它分成斐波那契式的序列 [123, 456, 579]。

形式上，斐波那契式序列是一个非负整数列表 F，且满足：

0 <= F[i] <= 2^31 - 1，（也就是说，每个整数都符合 32 位有符号整数类型）；
F.length >= 3；
对于所有的0 <= i < F.length - 2，都有 F[i] + F[i+1] = F[i+2] 成立。
另外，请注意，将字符串拆分成小块时，每个块的数字一定不要以零开头，除非这个块是数字 0 本身。

返回从 S 拆分出来的任意一组斐波那契式的序列块，如果不能拆分则返回 []。

示例 1：

输入："123456579"
输出：[123,456,579]
示例 2：

输入: "11235813"
输出: [1,1,2,3,5,8,13]
示例 3：

输入: "112358130"
输出: []
解释: 这项任务无法完成。
示例 4：

输入："0123"
输出：[]
解释：每个块的数字不能以零开头，因此 "01"，"2"，"3" 不是有效答案。
 */
class Solution {

    /**
     * @param String $S
     * @return Integer[]
     * 回溯和剪枝
     */
    function splitIntoFibonacci($S) {
        $res = [];
        $this->backtrack($res,$S,strlen($S),0,0,0);
        return $res;
    }
    //首先如果遍历结束，那么直接返回，否则从index处遍历，找的过程中
    //遇到0就直接break，然后不断进位，进位后先看是否超过范围，没有再看是否满足斐波那契条件
    function backtrack(&$res,$S,$length,$index,$sum,$prev){
    	if($index==$length) return count($res)>=3;//遍历到字符串最后结束
    	$curr = 0;
    	for ($i=$index; $i < $length; $i++) { 
    		if($i>$index&&$S[$i]=="0") break;
    		// 进位后看数值是否满足条件
    		$curr = strval($curr * 10 + $S[$i] - '0');
    		if ($curr > PHP_INT_MAX) {
                break;
            }
            if (count($res) >= 2) {
                // 小于就继续找
                if ($curr < $sum) {
                    continue;
                }
                // 大于就完犊子，结束吧
                else if ($curr > $sum) {
                    break;
                }
            }            
            array_push($res,$curr);                   
            if ($this->backtrack($res, $S, $length, $i + 1, $prev + $curr, $curr)) {
                return true;
            }
            // 回溯
            array_pop($res);
    	}
    	return false;

    }
    public $res = [];
    function splitIntoFibonacci1($S) {
    	$len_s = strlen($S);
        $this->help($S, 0, $len_s, []);
        return $this->res ? $this->res[0] : [];
    }
    protected function help($s, $start, $len_s, $path) {
        if ($start >= $len_s && count($path) > 2) {
            $this->res[] = $path;
            return;
        }
        for ($i = $start; $i < $len_s; $i++) {
            //
            $curChar = substr($s, $start, $i - $start + 1);
            if ($i - $start + 1 > 1 && $curChar[0] === '0' || $curChar > pow(2, 31) - 1) {
                continue;
            }
            $len_p = count($path);
            if ($len_p >= 2) {
                $last = end($path);
                $llast = $path[$len_p - 2];
                if ($llast + $last != $curChar) {
                    continue;
                }
            }
            array_push($path, $curChar);
            $this->help($s, $i + 1, $len_s, $path);
            array_pop($path);
        }
	}
}

$obj = new Solution();
echo "<pre>";
$res = $obj->splitIntoFibonacci1("01123");
print_r($res);


