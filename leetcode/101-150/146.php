<?php
//最近最少使用
//LRU
//使用一个辅助哈希表和一个辅助访问数组
class LRUCache {
    protected $capacity;
    protected $hash;
    protected $used;
    /**
     * @param Integer $capacity
     */
    public function __construct($capacity) 
    {
        $this->capacity = $capacity;
        $this->hash = [];
        $this->used = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key) 
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->used[] = $key;
            return $this->hash[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value) 
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->hash[$key] = $value;
            $this->used[] = $key;
        } else {
            if (count($this->hash) == $this->capacity) {
                $k = reset($this->used);
                array_shift($this->used);
                unset($this->hash[$k]);
            }

            $this->used[] = $key;
            $this->hash[$key] = $value;
        }
    
}

}
$capacity = 2;
$key = 1;
$value = 111;
$obj = new LRUCache($capacity);
$obj->put(1, 1);
$obj->put(2, 2);
var_dump($obj->get(1));       // 返回  1
$obj->put(3, 3);    // 该操作会使得关键字 2 作废
var_dump($obj->get(2));       // 返回 -1 (未找到)
