<?php
/**
 * 账户合并 中等
 * 给定一个列表 accounts，每个元素 accounts[i] 是一个字符串列表，其中第一个元素 accounts[i][0] 是 名称 (name)，其余元素是 emails 表示该账户的邮箱地址。

现在，我们想合并这些账户。如果两个账户都有一些共同的邮箱地址，则两个账户必定属于同一个人。请注意，即使两个账户具有相同的名称，它们也可能属于不同的人，因为人们可能具有相同的名称。一个人最初可以拥有任意数量的账户，但其所有账户都具有相同的名称。

合并账户后，按以下格式返回账户：每个账户的第一个元素是名称，其余元素是按顺序排列的邮箱地址。账户本身可以以任意顺序返回。

示例 1：
输入：
accounts = [["John", "johnsmith@mail.com", "john00@mail.com"], ["John", "johnnybravo@mail.com"], ["John", "johnsmith@mail.com", "john_newyork@mail.com"], ["Mary", "mary@mail.com"]]
输出：
[["John", 'john00@mail.com', 'john_newyork@mail.com', 'johnsmith@mail.com'],  ["John", "johnnybravo@mail.com"], ["Mary", "mary@mail.com"]]
解释：
第一个和第三个 John 是同一个人，因为他们有共同的邮箱地址 "johnsmith@mail.com"。 
第二个 John 和 Mary 是不同的人，因为他们的邮箱地址没有被其他帐户使用。
可以以任何顺序返回这些列表，例如答案 [['Mary'，'mary@mail.com']，['John'，'johnnybravo@mail.com']，
['John'，'john00@mail.com'，'john_newyork@mail.com'，'johnsmith@mail.com']] 也是正确的。
并查集解决
 */
class Solution {
    function accountsMerge($accounts) {
        $len=count($accounts);
        $uf=new UnionFind($len); //初始化并查集 以accounts的下标做节点
        $hashMap=[];
        foreach ($accounts as $index=>$arr){
            foreach ($arr as $k=>$v){
                if($k>0){//第一个元素是名字  不入hashMap
                    if(isset($hashMap[$v])){
                        $point=$hashMap[$v];
                        $uf->union($point,$index);   //两个邮箱组合并
                    }else{
                        $hashMap[$v]=$index;
                    }
                }
            }
        }
        $result=[]; //重新构建$accounts
        foreach ($hashMap as $k=>$v){
            $index=$uf->findRoot($v);
            if(!isset($result[$index])){
                $result[$index][]='00';
            }
                $result[$index][]=$k;
        }
        foreach ($result as $k=>$v){
            sort($v);
            $result[$k]=$v;
            $result[$k][0]=$accounts[$k][0];
        }
        return $result; 
    }
}
//并查集
class UnionFind {
    public $map=[];
    public $sizeof=[];
    public function __construct($n){
        for($i=0;$i<$n;$i++){
            $this->map[$i]=$i;
            $this->sizeof[$i]=1;
        }
    }
    //找根节点 路径压缩
    public function findRoot($n){
        if ($n != $this->map[$n]){
            $this->map[$n]=$this->findRoot($this->map[$n]);
        }
        return $this->map[$n];
    }
    //按大小合并
    public function union($a,$b){
        $rootA=$this->findRoot($a);
        $rootB=$this->findRoot($b);
        if($rootA!=$rootB){
            $this->map[$rootA]=$rootB;
        }
    }
}