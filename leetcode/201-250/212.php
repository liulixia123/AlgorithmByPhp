<?php
/**
 * 单词搜索II
 * 首先将words数组中的单词存储进一个Trie数据结构中，再进行回溯寻找。

时间复杂度和空间复杂度与所给的words数组中的单词有关。
 */
class TrieNode{	
	public $nexts = [];
	public $word;
}

class Trie{
	//构建前缀树
	public function buildTrie($words){
		if(empty($words)) return 0;
		$root = new TrieNode();
		foreach ($words as $key => $word) {
			$node = $root;
			$chararr = str_split($word);//分割成单个字符
			$len = count($chararr);
			for ($i=0; $i < $len; $i++) { 
				$index = ord($chararr[$i])-ord('a');
				if($node->nexts[$index]==null){
					$node->nexts[$index] = new TrieNode();					
				}
				$node = $node->nexts[$index];				
			}
			$node->word = $word;
		}		
		return $root;
	}
}
class Solution {
	function findWords($board, $words){
		$Trie  = new Trie();
		$trieNode = $Trie->buildTrie($words);
		$res = [];
		$n = count($board);
		for ($i=0; $i < $n; $i++) { 
			for ($j=0; $j < count($board[$i]); $j++) { 
				$this->dfs($board,$i,$j,$trieNode,$res);
			}
		}
		return $res;
	}
	function dfs($board,$i,$j,$trieNode,&$res){
		$c = $board[$i][$j];
		//已经找过字符改为#号或者前缀树中没有前缀因此结束递归
		if($c=="#"|| $trieNode->nexts[ord($c)-ord('a')]==null) return ;
		$trieNode = $trieNode->nexts[ord($c)-ord('a')];
		if($trieNode->word!=null){
			array_push($res,$trieNode->word);
			$trieNode->word = null;//去重
		}
		$board[$i][$j] = "#";
		if($i>0){
			$this->dfs($board,$i-1,$j,$trieNode,$res);
		}
		if($j>0){
			$this->dfs($board,$i,$j-1,$trieNode,$res);
		}
		if($i<count($board)-1){
			$this->dfs($board,$i+1,$j,$trieNode,$res);
		}
		if($j<count($board[0])-1){
			$this->dfs($board,$i,$j+1,$trieNode,$res);
		}
		$board[$i][$j] = $c;
	}
}


$obj = new Solution();
$board = [
	['o','a','a','n'],
	['e','t','a','e'],
	['i','h','k','r'],
	['i','f','l','v']
];
$words = ['eat','oath','rath','pea'];
$res = $obj->findWords($board, $words);
echo "<pre>";
print_r($res);