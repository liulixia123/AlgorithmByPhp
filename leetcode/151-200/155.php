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
    private $stack1 = [];
    private $stack2 = [];//存放s1中所有节点最小值
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->stack1,$x);//s1正常入栈
        if(end($this->stack2)>=$x||empty($this->stack2)){//s2存放最小值
           array_push($this->stack2,$x); 
       }
    }
  
    /**
     * @return NULL
     */
    function pop() {
        if(end($this->stack1)==end($this->stack2)){
            array_pop($this->stack2);
        }
        array_pop($this->stack1);
    }
  
    /**
     * @return Integer
     */
    function top() {
        return end($this->stack1);       
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return end($this->stack2);
    }
}

/*
/ * Your MinStack object will be instantiated and called as such:*/
 $obj = new MinStack();
 $obj->push(-2);
 $obj->push(0);
 $obj->push(-3);

 var_dump($obj->getMin());
 var_dump($obj->pop());
 var_dump($obj->top());
 var_dump($obj->getMin());
 