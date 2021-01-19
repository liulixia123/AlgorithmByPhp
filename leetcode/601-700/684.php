<?php
/**
 * 冗余连接 中等难度
 * 在本问题中, 树指的是一个连通且无环的无向图。

输入一个图，该图由一个有着N个节点 (节点值不重复1, 2, ..., N) 的树及一条附加的边构成。附加的边的两个顶点包含在1到N中间，这条附加的边不属于树中已存在的边。

结果图是一个以边组成的二维数组。每一个边的元素是一对[u, v] ，满足 u < v，表示连接顶点u 和v的无向图的边。

返回一条可以删去的边，使得结果图是一个有着N个节点的树。如果有多个答案，则返回二维数组中最后出现的边。答案边 [u, v] 应满足相同的格式 u < v。

示例 1：

输入: [[1,2], [1,3], [2,3]]
输出: [2,3]
解释: 给定的无向图为:
  1
 / \
2 - 3
示例 2：

输入: [[1,2], [2,3], [3,4], [1,4], [1,5]]
输出: [1,4]
解释: 给定的无向图为:
5 - 1 - 2
    |   |
    4 - 3

解题：
并查集
 */
class UnionSet
{
    private $rank;
    private $parent;
    private $size;
    /**
     * @param int $n
     * @return null
     */
    function __construct($n)
    {
        $this->$n = $n;
        $this->rank = array_fill(0, $n, 1);
        $this->size = array_fill(0, $n, 1);
        for ($i = 0; $i < $n; ++$i) {
            $this->parent[$i] = $i;
        }
    }
    function getSize($n)
    {
        return $this->size[$this->find($n)];
    }
    /**
     * @param int $x
     * @return int
     */
    function find($x)
    {
        if ($x != $this->parent[$x]) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }
    /**
     * @param int $x
     * @param int $y
     * @param int $mode
     * @return null
     * 
     */
    function union($x, $y, $mode = "rank")
    {
        $xr = $this->find($x);
        $yr = $this->find($y);
        if ($xr == $yr) return;
        if ($mode == "rank") {
            if ($this->rank[$xr] < $this->rank[$yr]) {
                $this->parent[$xr] = $yr;
            } else if ($this->rank[$xr] > $this->rank[$yr]) {
                $this->parent[$yr] = $xr;
            } else {
                $this->parent[$xr] = $yr;
                $this->rank[$yr]++;
            }
        } else {
            if ($this->size[$xr] < $this->size[$yr]) {
                [$xr, $yr] = [$yr, $xr];
            }
            $this->size[$xr] += $this->size[$yr];
            $this->parent[$yr] = $xr;
        }
    }
}
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        $n = count($edges);
        for ($i = $n - 1; $i >= 0; --$i) {
            $dsu = new UnionSet($n);
            for ($j = 0; $j < $n; ++$j) {
                if ($i == $j) continue;
                else $dsu->union($edges[$j][0] - 1, $edges[$j][1] - 1, "size");
            }
            if ($dsu->getSize(0) === $n) return $edges[$i];
        }
    }
}