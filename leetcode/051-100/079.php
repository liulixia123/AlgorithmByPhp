<?php
//单词搜索
/**
 * 给定一个二维网格和一个单词，找出该单词是否存在于网格中。

单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母不允许被重复使用。


示例:

board =
[
  ['A','B','C','E'],
  ['S','F','C','S'],
  ['A','D','E','E']
]

给定 word = "ABCCED", 返回 true
给定 word = "SEE", 返回 true
给定 word = "ABCB", 返回 false

 */

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    //深度优先
    function exist($board, $word) {
	    for ($i = 0; $i < count($board); $i++) {
	      for ($j = 0; $j < count($board[0]); $j++) {//从A开始试探,然后再从B开始
	        $res = $this->helper($board, $i, $j, $word, 0);
	        if ($res) return true;
	      }
	    }
	    return false;
  	}

  	function helper($board, $i, $j, $word, $start) {
	    if ($start >= strlen($word)) {//找到了 ==也可以
	      return true;
	    }
	    if ($i < 0 || $i >= count($board) || $j < 0 || $j >= count($board[0]) || $board[$i][$j] != $word[$start]) {
	      return false;
	    }
	    $c = $word[$start];
	    $board[$i][$j] = "#";//表示这个字母已经找过了
	    // var_dump($board);
	    //也可以用方向数组
	    $res =  ($this->helper($board, $i + 1, $j, $word, $start + 1) ||
	      $this->helper($board, $i - 1, $j, $word, $start + 1) ||
	      $this->helper($board, $i, $j + 1, $word, $start + 1) ||
	      $this->helper($board, $i, $j - 1, $word, $start + 1)
	    );
	    $board[$i][$j] = $c;//换回来
	    return $res;
  	}

}