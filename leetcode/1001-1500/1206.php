<?php
//设计跳表
class SkipListNode
{
    /**
     * 数据本身
     *
     * @var null
     */
    public $data;
 
    /**
     * 该节点的最高层级索引
     *
     * @var
     */
    public $maxLevel;
 
 
    /**
     * 该节点在各个层级下的后继节点
     * 默认空节点的第一层的后继节点为 null
     *
     * @var array
     */
    public $forwards = [null];
 
}
class SkipList
{
    /**
     * 允许的最大层数量，默认共32层，层级索引为 0 ~ 31
     * @var int
     */
    private $maxLevelCount;
 
    /**
     * 当前最大层级索引
     * @var
     */
    private $currentMaxLevel = 0;
 
    /**
     * 有下一级的概率，默认 0.25
     * @var float
     */
    private $p;
 
    private $head;
 
    public function __construct($maxLevelCount = 32, $p = 0.25)
    {
        $this->maxLevelCount = $maxLevelCount;
        $this->p = $p;
        $this->head = new SkipListNode();
    }
 
    /**
     * 随机生成一个层级索引
     *
     * @return int
     */
    function randomLevel()
    {
        //层级索引从0开始，[0, 31]
        $level = 0;
        while (lcg_value() < $this->p && $level < $this->maxLevelCount - 1) {
            $level += 1;
        }
        return $level;
    }
 
 
    public function insert($value)
    {
        //获得新节点该在哪个层级
        $level = $this->randomLevel();
        $newNode = new SkipListNode();
        $newNode->data = $value;
        $newNode->maxLevel = $level;
        if ($level > $this->currentMaxLevel) {
            //更新当前最大层级索引
            $this->currentMaxLevel = $level;
        }
        $currentNode = $this->head;
        //待更新的节点数组，保存每一层最后一个小于待插入值的节点
        $update = [];
        for ($i = $level; $i >= 0; $i--) {
            //循环完成一次，就是向下移动一层
            while (isset($currentNode->forwards[$i]) && $currentNode->forwards[$i]->data !== null && $currentNode->forwards[$i]->data < $value) { //向后继节点移动 $currentNode = $currentNode->forwards[$i];
            }
            $update[$i] = $currentNode;
        }
        echo "to insert: $value, level: $level, currentNode value: " . $currentNode->data . PHP_EOL;
 
        for ($j = 0; $j <= $level; $j++) { //更新指针，就是普通链表的操作，新节点的后继节点为前节点的后继节点 
        	//这里有可能待更新的节点层级没有新节点的高导致 forwards 数组中数据不存在，当不存在是即指向 null 
        	$newNode->forwards[$j] = isset($update[$j]->forwards[$j]) ? $update[$j]->forwards[$j]: null;
            //原前节点的后继节点是新节点
            $update[$j]->forwards[$j] = $newNode;
 
        }
 
        return $newNode;
    }
 
    public function find($value)
    {
        $node = $this->head;
        for ($i = $this->currentMaxLevel; $i >= 0; $i--) {
            while (isset($node->forwards[$i]) && $node->forwards[$i]->data !== null && $node->forwards[$i]->data < $value) { $node = $node->forwards[$i];
            }
        }
        //前边寻找到最后一个小于待查找值的节点，它的下一个要么是要找的值，要么就找不到了。
        if ($node->forwards[0] !== null && $node->forwards[0]->data == $value) {
            return $node->forwards[0];
        }
        return null;
    }
 
    public function delete($value)
    {
        //类似插入，找到所要有更新的节点数组
        $currentNode = $this->head;
        $update = [];
        for ($i = $this->currentMaxLevel; $i >= 0; $i--) {
            //循环完成一次，就是向下移动一层
            while (isset($currentNode->forwards[$i]) && $currentNode->forwards[$i]->data !== null && $currentNode->forwards[$i]->data < $value) { //向后继节点移动 $currentNode = $currentNode->forwards[$i];
            }
            $update[$i] = $currentNode;
        }
        $toDelete = $currentNode->forwards[0];
        if ($toDelete === null || $toDelete->data != $value) {
            return false;
        }
        for ($j = $this->currentMaxLevel; $j >= 0; $j--) {
            $next = $update[$j]->forwards[$j];
            if ($next !== null && $next->data == $value) {
                //此类节点需要调整指针
                $update[$j]->forwards[$j] = $next->forwards[$j];
            }
        }
 
        return $toDelete;
 
    }
 
    public function dump()
    {
        $node = $this->head;
        $data = [];
        while (isset($node->forwards[0])) {
            $data[] = $node->forwards[0]->data;
            $node = $node->forwards[0];
        }
        print_r(implode(' -> ', $data));
        echo PHP_EOL;
    }
 
}