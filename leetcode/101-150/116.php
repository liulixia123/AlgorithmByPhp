<?php
//填充每个节点使其指向右节点，最右节点指向为null
class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        $stack = [$root];
        while($stack){
            $len = count($stack); $last = null;
            for($i = 1; $i <= $len; $i++){
                $node = array_shift($stack);
                if($node->left != null){
                    array_push($stack, $node->left);
                }

                if($node->right != null){
                    array_push($stack, $node->right);
                }

                if($i != 1){
                    $last->next = $node;
                }

                $last = $node;
            }
        }
        return $root;

    }
}