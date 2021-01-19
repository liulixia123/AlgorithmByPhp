<?php
/**
 * 项目管理 困难难度
 * 公司共有 n 个项目和 m 个小组，每个项目要不没有归属，要不就由其中的一个小组负责。
我们用 group[i] 代表第 i 个项目所属的小组，如果这个项目目前无人接手，那么 group[i] 就等于 -1。（项目和小组都是从零开始编号的）
请你帮忙按要求安排这些项目的进度，并返回排序后的项目列表：
同一小组的项目，排序后在列表中彼此相邻。
项目之间存在一定的依赖关系，我们用一个列表 beforeItems 来表示，其中 beforeItems[i] 表示在进行第 i 个项目前（位于第 i 个项目左侧）应该完成的所有项目。
结果要求：
如果存在多个解决方案，只需要返回其中任意一个即可。
如果没有合适的解决方案，就请返回一个 空列表。

示例 1：
输入：n = 8, m = 2, group = [-1,-1,1,0,0,1,0,-1], beforeItems = [[],[6],[5],[6],[3,6],[],[],[]]
输出：[6,3,4,1,5,2,0,7]

示例 2：
输入：n = 8, m = 2, group = [-1,-1,1,0,0,1,0,-1], beforeItems = [[],[6],[5],[6],[3],[],[4],[]]
输出：[]
解释：与示例 1 大致相同，但是在排序后的列表中，4 必须放在 6 的前面。
 */
class Solution {
    function sortItems($n, $m, $group, $beforeItems) {
        $groupItem = [];
        for ($i = 0; $i < $n + $m; ++$i) {            
            $groupItem[] = [];
        }

        // 组间和组内依赖图
        $groupGraph = [];
        for ($i = 0; $i < $n + $m; ++$i) {
            $groupGraph[] = [];
        }
        $itemGraph = [];
        for ($i = 0; $i < $n; ++$i) {           
            $itemGraph[] = [];
        }

        // 组间和组内入度数组       
        $groupDegree = $itemDegree = [];
        $id = [];       
        for ($i = 0; $i < $n + $m; ++$i) {           
            $id[] = $i;
        }

        $leftId = $m;
        // 给未分配的 item 分配一个 groupId
        for ($i = 0; $i < $n; ++$i) {
            if ($group[$i] == -1) {
                $group[$i] = $leftId;
                $leftId += 1;
            }            
            $groupItem[$group[$i]] = [$i];
        }
        // 依赖关系建图
        for ($i = 0; $i < $n; ++$i) {
            $curGroupId = $group[$i];
            foreach ($beforeItems[$i] as $item ) {
                $beforeGroupId = $group[$item];
                if ($beforeGroupId == $curGroupId) {
                    $itemDegree[$i] += 1;
                    $itemGraph[$item]= [$i];   
                } else {
                    $groupDegree[$curGroupId] += 1;
                    $groupGraph[$beforeGroupId] = [$curGroupId];
                }
            }
        }
        echo "<pre>";
        //print_r($itemGraph);die;
        // 组间拓扑关系排序
        $groupTopSort = $this->topSort($groupDegree, $groupGraph, $id);

        if (count($groupTopSort) == 0) {
            return [0];
        }
        $ans = [];
        $index = 0;
        // 组内拓扑关系排序
        foreach ($groupTopSort as $curGroupId) {
            $size = count($groupItem[$curGroupId]);
            if ($size == 0) {
                continue;
            }
            $res = $this->topSort($itemDegree, $itemGraph, $groupItem[$curGroupId]);
            //print_r($res);die; 
            if (count($res) == 0) {
                return [0];
            }
            foreach ($res as $item) {
                $ans[$index++] = $item;
            }
        }
        return $ans;
    }

    function topSort($deg, $graph, $items) {
        $queue = [];
        foreach ($items as $item) {
            if ($deg[$item] == 0) {
                array_push($queue,$item);
            }
        }
        $res = [];
        while (!empty($queue)) {
            $u= array_pop($queue); 
            array_push($res,$u);
            foreach ($graph[$u] as $v) {
                if (--$deg[$v] == 0) {
                    array_push($queue,$v);
                }
            }
        }
        return count($res) == count($items) ? $res : [];
    }
}

$obj = new Solution();
$n = 8;
$m = 2;
$group = [-1,-1,1,0,0,1,0,-1];
$beforeItems = [[],[6],[5],[6],[3,6],[],[],[]];
$res = $obj->sortItems($n, $m, $group, $beforeItems);
print_r($res);

/*

class Solution {
    public int[] sortItems(int n, int m, int[] group, List<List<Integer>> beforeItems) {
        List<List<Integer>> groupItem = new ArrayList<List<Integer>>();
        for (int i = 0; i < n + m; ++i) {
            groupItem.add(new ArrayList<Integer>());
        }

        // 组间和组内依赖图
        List<List<Integer>> groupGraph = new ArrayList<List<Integer>>();
        for (int i = 0; i < n + m; ++i) {
            groupGraph.add(new ArrayList<Integer>());
        }
        List<List<Integer>> itemGraph = new ArrayList<List<Integer>>();
        for (int i = 0; i < n; ++i) {
            itemGraph.add(new ArrayList<Integer>());
        }

        // 组间和组内入度数组
        int[] groupDegree = new int[n + m];
        int[] itemDegree = new int[n];
        
        List<Integer> id = new ArrayList<Integer>();
        for (int i = 0; i < n + m; ++i) {
            id.add(i);
        }

        int leftId = m;
        // 给未分配的 item 分配一个 groupId
        for (int i = 0; i < n; ++i) {
            if (group[i] == -1) {
                group[i] = leftId;
                leftId += 1;
            }
            groupItem.get(group[i]).add(i);
        }
        // 依赖关系建图
        for (int i = 0; i < n; ++i) {
            int curGroupId = group[i];
            for (int item : beforeItems.get(i)) {
                int beforeGroupId = group[item];
                if (beforeGroupId == curGroupId) {
                    itemDegree[i] += 1;
                    itemGraph.get(item).add(i);   
                } else {
                    groupDegree[curGroupId] += 1;
                    groupGraph.get(beforeGroupId).add(curGroupId);
                }
            }
        }

        // 组间拓扑关系排序
        List<Integer> groupTopSort = topSort(groupDegree, groupGraph, id); 
        if (groupTopSort.size() == 0) {
            return new int[0];
        }
        int[] ans = new int[n];
        int index = 0;
        // 组内拓扑关系排序
        for (int curGroupId : groupTopSort) {
            int size = groupItem.get(curGroupId).size();
            if (size == 0) {
                continue;
            }
            List<Integer> res = topSort(itemDegree, itemGraph, groupItem.get(curGroupId));
            if (res.size() == 0) {
                return new int[0];
            }
            for (int item : res) {
                ans[index++] = item;
            }
        }
        return ans;
    }

    public List<Integer> topSort(int[] deg, List<List<Integer>> graph, List<Integer> items) {
        Queue<Integer> queue = new LinkedList<Integer>();
        for (int item : items) {
            if (deg[item] == 0) {
                queue.offer(item);
            }
        }
        List<Integer> res = new ArrayList<Integer>();
        while (!queue.isEmpty()) {
            int u = queue.poll(); 
            res.add(u);
            for (int v : graph.get(u)) {
                if (--deg[v] == 0) {
                    queue.offer(v);
                }
            }
        }
        return res.size() == items.size() ? res : new ArrayList<Integer>();
    }
}




 */
