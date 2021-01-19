<?php
/**
 * 前缀树 字典树
 */
class TrieNode{
	public $path;
	public $end;
	public $nexts;
	public function __construct(){
		$this->path = 0;
		$this->end = 0;
		$this->nexts = [];
	}
}

class Trie{
	private $root;//定义头结点
	public function __construct(){
		$this->root = new TrieNode();
	}
	//添加
	public function insert($word){
		if($word=="") return 0;
		$chararr = str_split($word);//分割成单个字符
		$len = count($chararr);
		$node = $this->root;
		for ($i=0; $i < $len; $i++) { 
			$index = ord($chararr[$i])-ord('a');
			if($node->nexts[$index]==null){
				$node->nexts[$index] = new TrieNode();
				
			}
			$node = $node->nexts[$index];
			$node->path++;
			
		}
		$node->end++;
	}
	//搜索
	public function search($word){
		if($word=="") return 0;
		$chararr = str_split($word);//分割成单个字符
		$len = count($chararr);
		$node = $this->root;
		for ($i=0; $i < $len; $i++) { 
			$index = ord($chararr[$i])-ord('a');
			if($node->nexts[$index]==null){
				return false;
				
			}
			$node = $node->nexts[$index];
			
		}
		return $node->end>=1;
	}
	//删除
	public function delete($word){
		if($word=="") return 0;
		$chararr = str_split($word);//分割成单个字符
		$len = count($chararr);
		$node = $this->root;
		for ($i=0; $i < $len; $i++) { 
			$index = ord($chararr[$i])-ord('a');
			if($node->nexts[$index]==null){
				return 0;
				
			}
			$node = $node->nexts[$index];
			$node->path--;
			//等于0后面节点的都需删除
			if($node->path == 0){
				$node = null;break;
			}
			
		}
		$node->end--;
	}
	//前缀
	public function startsWith($prefix){
		if($prefix=="") return false;
		$chararr = str_split($prefix);//分割成单个字符
		$len = count($chararr);
		$node = $this->root;
		for ($i=0; $i < $len; $i++) { 
			$index = ord($chararr[$i])-ord('a');
			if($node->nexts[$index]==null){
				return false;
				
			}
			$node = $node->nexts[$index];
			if($node->path == 0){
				return false;
			}
			
		}
		return $node->path>=1;
	}
}

$Trie  = new Trie();
$Trie->insert("abc");
$Trie->insert("bcd");
$Trie->insert("bcdr");
echo "<pre>";
//print_r($Trie);

var_dump($Trie->search("bcd"));
//$Trie->delete("abc");
print_r($Trie);