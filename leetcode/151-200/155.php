<?php
/*设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。

push(x) —— 将元素 x 推入栈中。
pop() —— 删除栈顶的元素。
top() —— 获取栈顶元素。
getMin() —— 检索栈中的最小元素。
*/
class MinStack {
    /**
     * initialize your data structure here.
     */
    function __construct() {
        
    }
    private $stack = [];
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->stack,$x);
    }
  
    /**
     * @return NULL
     */
    function pop() {
        array_pop($this->stack);
    }
  
    /**
     * @return Integer
     */
    function top() {
        $count = count($this->stack);
        if($count>=1){
            return $this->stack[$count-1];
        }
        return ;        
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        sort($this->stack);
        return $this->stack[0];
    }
}

/*
/ * Your MinStack object will be instantiated and called as such:*/
 $obj = new MinStack();
 $obj->push(-2);
 $obj->push(0);
 $obj->push(-3);
 //$obj->pop();
 $ret_3 = $obj->top();
 $ret_4 = $obj->getMin();
 var_dump($ret_3);
 var_dump($ret_4);
 