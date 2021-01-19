<?php
/**
 * 交换字符串中的元素 中等难度
 * 给你一个字符串 s，以及该字符串中的一些「索引对」数组 pairs，其中 pairs[i] = [a, b] 表示字符串中的两个索引（编号从 0 开始）。

你可以 任意多次交换 在 pairs 中任意一对索引处的字符。

返回在经过若干次交换后，s 可以变成的按字典序最小的字符串。

示例 1:

输入：s = "dcab", pairs = [[0,3],[1,2]]
输出："bacd"
解释： 
交换 s[0] 和 s[3], s = "bcad"
交换 s[1] 和 s[2], s = "bacd"

示例 2：

输入：s = "dcab", pairs = [[0,3],[1,2],[0,2]]
输出："abcd"
解释：
交换 s[0] 和 s[3], s = "bcad"
交换 s[0] 和 s[2], s = "acbd"
交换 s[1] 和 s[2], s = "abcd"

示例 3：

输入：s = "cba", pairs = [[0,1],[1,2]]
输出："abc"
解释：
交换 s[0] 和 s[1], s = "bca"
交换 s[1] 和 s[2], s = "bac"
交换 s[0] 和 s[1], s = "abc"
 */
class UnionSet
{
    private $rank;
    private $parent;
    function __construct($n)
    {
        $this->$n = $n;
        $this->rank = array_fill(0, $n, 1);
        for ($i = 0; $i < $n; ++$i) {
            $this->parent[$i] = $i;
        }
    }
    function find($x)
    {
        if ($x != $this->parent[$x]) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    function union($x, $y)
    {
        $xr = $this->find($x);
        $yr = $this->find($y);
        if ($xr == $yr) return;
        if ($this->rank[$xr] < $this->rank[$yr]) {
            $this->parent[$xr] = $yr;
        } else if ($this->rank[$xr] > $this->rank[$yr]) {
            $this->parent[$yr] = $xr;
        } else {
            $this->parent[$xr] = $yr;
            $this->rank[$yr]++;
        }
    }
}
class Solution {

    /**
     * @param String $s
     * @param Integer[][] $pairs
     * @return String
     */
    function smallestStringWithSwaps($s, $pairs) {
        $n = strlen($s);
        $dsu = new UnionSet($n);
        foreach ($pairs as $pair) {
            $dsu->union($pair[0], $pair[1]);
        }
        $map = array_fill(0, $n, []);
        for ($i = 0; $i < $n; ++$i) {
            $map[$dsu->find($i)][] = $s[$i];
        }
        foreach ($map as $key => $values) {
            rsort($values);
            $map[$key] = $values;
        }
        $ans = "";
        for ($i = 0; $i < $n; ++$i) {
            $ans .= array_pop($map[$dsu->find($i)]);
        }
        return $ans;
    }
}