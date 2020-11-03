<?php
/**
 * 皇后问题
 * 皇后，是国际象棋中的棋子，意味着国王的妻子。皇后只做一件事，那就是“吃子”。当她遇见可以吃的棋子时，
 * 就迅速冲上去吃掉棋子。当然，她横、竖、斜都可走一到七步，可进可退。
 * 
Input: 4
Output: [
 [".Q..", // Solution 1
 "...Q",
 "Q...",
 "..Q."],
 ["..Q.", // Solution 2
 "Q...",
 "...Q",
 ".Q.."]
]
 * 解题思路：

回溯算法其实是搜索一个决策树，每次搜索完一层重置状态到搜索之前，以做出别的选择，这样就可以不重不漏。
所以解题思路第一步是分析如何做决策。
因为要在NxN的棋盘上摆N个皇后，且皇后不能在同一行，所以我们可以一行一行的放置皇后，每行放一个。（当然一列一列放也可以）
而在一行中放置皇后时，需要遍历该行的每一列的位置，看该位置是否可以放置皇后，这就需要根据当前棋盘的状态进行判断。
最后如果我们搜索到最后一行的下一行，说明所有的行都找到了合适的位置，则此时的棋盘状态就是N皇后的一个解。
当然N皇后可以是无解的（比如N=3时），这种情况在没有搜索到最后一行之前就会退出。

 */
class Solution{
	private $solution; //二维数组 true 就表示当前位置放置了皇后，false 就表示没有放置皇后
	public function solveNQueens($n){
		$res = [];
		$this->nQueens(0,$n,$res);
		return count($res);
	}
	private function nQueens($row,$n,&$res){
		if ($row == $n) {
            // 将 solution 处理成为一个棋盘 generateChessboard
            $board = $this->generateChessboard($n);
            array_push($res,$board);
            return;
        }
         // 站在当前这一行（索引为 row），去一列一列检查是否可以放皇后
        for ($i = 0; $i < $n; $i++) {
            if ($this->notInDanger($row, $i, $n)) {
                $this->solution[$row][$i] = true;
                $this->nQueens($row + 1, $n,$res);
                $this->solution[$row][$i] = false;// 因为下一列的放置与上一列应该是在同样的环境下进行考虑，棋盘要重置
            }
            // 如果每一列都不能放置，那么这个方法就自动退出了，当前错误的棋盘摆放就不会被保存
        }
	}
	private function generateChessboard($n){
		$res = [];
		
        for ($i = 0; $i < $n; $i++) {
           	$board = "";
            for ($j = 0; $j < $n; $j++) {
                if ($this->solution[$i][$j]) {
                	$board .= "Q";                 
                } else {
                    $board .= ".";
                }
            }
            $res[] = $board;
        }
        return $res;
	}
	// i，j 表示当前尝试放置皇后棋子的坐标
    private function notInDanger($i, $j, $n) {
        // 设置一些标志，看看当前位置是不是危险的
        // 从之前递归的写法来看，一定是处于不同行的，所以要接着判断，属于不同的列，不同的主对角线和副对角线
        // 判断在 (2,3) 之前的那些行，在 3 这一列上是否有皇后，即 (0,3)、 (1,3)
        for ($r = $i; $r >= 0; $r--) {
            if ($this->solution[$r][$j]) {
                return false;
            }
        }
        // 判断在 (2,3) 之前的那些行，在它的主对角线上是否有皇后（向右上方走）
        for ($r = $i, $c = $j; $r >= 0 && $c < $n; $r--, $c++) {
            if ($this->solution[$r][$c]) {
                return false;
            }
        }
        // 判断在 (2,3) 之前的那些行，在它的副对角线上是否有皇后（向左上方走）
        for ($r = $i, $c = $j; $r >= 0 && $c >= 0; $r--, $c--) {
            if ($this->solution[$r][$c]) {
                return false;
            }
        }
        // 全部判断完以后，才表示安全
        return true;
    }


    //
    function totalNQueens($n) {
        if ($n==1) return 1;
        if($n<4)  return 0;
        $tf = array_fill(0, $n, array_fill(0, $n, 'T'));
        $this->res = 0;
        for ($i=0; $i < $n; $i++) { 
            $tf_t = $tf;
            $tf_t[0][$i] = 'F';
            $this->dfs($tf_t,[[0,$i]]);
        }
        return $this->res;
    }

    function dfs($tf,$path){
        if(count($tf)==count($path)){
            $this->res++;
            return;
        }
        $x=end($path)[0];
        $y=end($path)[1];
        $k = count($path);
        for ($j=count($path); $j < count($tf); $j++) { 
            $tf[$j][$y] = 'F';
            if($y>=$j-$x) $tf[$j][$y-($j-$x)] = 'F';
            if($y+$j-$x<count($tf)) $tf[$j][$y+$j-$x] = 'F';
        }
        for ($j=0; $j < count($tf); $j++) { 
            if($tf[$k][$j]==='T'){
                $this->dfs($tf,array_merge($path,[[$k,$j]]));
            }
        }
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->solveNQueens(4));