<?php
/**
 * 找出给定方程的正整数解
 给出一个函数  f(x, y) 和一个目标结果 z，请你计算方程 f(x,y) == z 所有可能的正整数 数对 x 和 y。

给定函数是严格单调的，也就是说：

f(x, y) < f(x + 1, y)
f(x, y) < f(x, y + 1)
函数接口定义如下：

interface CustomFunction {
public:
  // Returns positive integer f(x, y) for any given positive integer x and y.
  int f(int x, int y);
};
如果你想自定义测试，你可以输入整数 function_id 和一个目标结果 z 作为输入，其中 function_id 表示一个隐藏函数列表中的一个函数编号，题目只会告诉你列表中的 2 个函数。  

你可以将满足条件的 结果数对 按任意顺序返回。 

示例 1：
输入：function_id = 1, z = 5
输出：[[1,4],[2,3],[3,2],[4,1]]
解释：function_id = 1 表示 f(x, y) = x + y
示例 2：
输入：function_id = 2, z = 5
输出：[[1,5],[5,1]]
解释：function_id = 2 表示 f(x, y) = x * y


 */
class Solution {
    /**
     * @param  CustomFunction  $customfunction
     * @param  Integer  $z
     * @return Integer[][]
     */
    function findSolution($customfunction, $n) {
        $res=[];
        $t=new CustomFunction($customfunction->num);
        for($i=1;$i<=$n;$i++){
            for($j=1;$j<=$n;$j++){
                if($t->f($i,$j)==$n)
             $res[]=[$i,$j];
            }
            
        }
       
        return $res;
    }
    /**
     * 双指针实现
     */
    function findSolution1($customfunction, $n){
    	$i = $j = 0;
    	$ans = [];
    	while($i<=1000){
    		if($customfunction->f($i,1)>$n) break;
    		if($customfunction->f($i,1000)<$n){
    			++$i;
    			continue;
    		}
    		$ii=1;
    		$jj = 1000;
    		$m = 0;
    		while($ii<$jj){
    			$m = $ii+($jj-$ii)>>1;
    			$mv = $customfunction->f($i,$m);
    			if($mv==$n) array_push($ans,[$i,$m]);
    			if($m==$ii) break;
    			if($mv<$n){
    				$ii=$m;
    			}else{
    				$yy=$m;
    			}

    		}
    		++$i;
    	}
    	return $ans;
    }
    /**
     * 双指针和二分
     * @param  [type] $customfunction [description]
     * @param  [type] $n              [description]
     * @return [type]                 [description]
     */
    function findSolution2($customfunction, $n){
    	$ans = [];
    	$x = 1;
    	$y = 1000;
        while ($x <= 1000 && $y >= 1){
			$res = $customfunction->f($x,$y);
            if ($res < $n){
                $x += 1;
            }
            elseif ($res > $n){
                $y -= 1;
            }
            if ($res == $n){
            	array_push($ans,[$x,$y]);
            	$x++;
            	$y--;
            }
        }
            
             
        return $ans;
    }
}

