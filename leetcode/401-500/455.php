<?php
/**
 * 分发饼干
 假设你是一位家长，想要给你的孩子们一些饼干，每个孩子最多只能给一块饼干。
对每个孩子 i ，都有一个胃口值 gi ，这是能让孩子们满足胃口的饼干的最小尺寸；
对每块饼干 j ，都有一个尺寸 sj 。如果 sj >= gi ，则可以将这个饼干 j 分配给孩子 i ，这个孩子会得到满足。
你的目标是尽可能满足越多数量的孩子，并输出这个最大数值。
注意：
你可以假设胃口值为正。
一个小朋友最多只能拥有一块饼干。

示例 1:
输入: [1,2,3], [1,1]
输出: 1
解释: 你有三个孩子和两块小饼干，3个孩子的胃口值分别是：1,2,3。虽然你有两块小饼干，由于他们的尺寸都是1，你只能让胃口值是1的孩子满足。所以你应该输出1。

示例 2:
输入: [1,2], [1,2,3]
输出: 2
解释: 你有两个孩子和三块小饼干，2个孩子的胃口值分别是1,2。你拥有的饼干数量和尺寸都足以让所有孩子满足。所以你应该输出2.
贪心算法
 */

class Solution{
	function findContentChildren($g,$s){
		if(count($g)<1) return 0;//没有孩子不用分发
		$counter = 0;
		sort($g);
		sort($s);
		for ($i=0; $i < count($g) && $counter < count($s); $i++) { 
			if($g[$i]<=$s[$counter]) $counter++;
		}
		return $counter;
	}
	function findContentChildren1($g,$s){
		sort($g);
        sort($s);

        for($i=0,$j=0;$i<count($g)&&$j<count($s);)
        {
            //  满足一个孩子
            if($g[$i]<=$s[$j])
                $i ++;
            //  不管是否满足孩子，都要往后寻找饼干
            $j++;
        }

        return $i;
    }
}
$obj = new Solution();
$g = [1,2,3];
$s = [1,2];
echo $obj->findContentChildren($g,$s);