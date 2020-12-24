<?php
/**
 * 线段树
 */
class SegmentTree 
{
	public $arr; //复制一个原数组的四倍长度数组
	public $sum; //和
	public $lazy; //懒加载数组
	public $update; //更新数组
	function __construct($origin)
	{
		$n = count($origin);
		$this->arr = array_fill(0, $n<<2, 0);
		$this->sum = array_fill(0, $n<<2, 0);
		$this->lazy = array_fill(0, $n<<2, 0);
		for ($i=0; $i < $n; $i++) { 
			$this->arr[$i+1] = $origin[$i];
		}
	}
	public function sumTree($origin){

	}
	/**
	 * [构建树]
	 * @param  [type] $l  左边位置
	 * @param  [type] $r  右边位置
	 * @param  [type] $rt 当前位置的值
	 * @return [type]     [description]
	 */
	public function build($l,$r,$rt){
		if($l==$r){// 左右相等为叶子节点
			$this->sum[$rt] = $this->arr[$l];
			return;
		}
		$mid = $l+(($r-$l)>>1);		
		$this->build($l,$mid,$rt<<1);
		$this->build($mid+1,$r,$rt<<1|1);
		$this->pushup($rt);
	}
	// 求累加和
	public function pushup($rt){
		$this->sum[$rt] = $this->sum[$rt<<1]+$this->sum[$rt<<1|1];
	}
	/**
	 * [add description]
	 * @param [type] $rangel [范围左区间]
	 * @param [type] $ranger [范围左区间]
	 * @param [type] $l      [左树位置]
	 * @param [type] $r      [左树位置]
	 * @param [type] $rt     [当前位置]
	 * @param [type] $c      [加的值]
	 */
	public function add($rangel,$ranger,$l,$r,$rt,$c){
		if($rangel<=$l&&$ranger<=$l){
			$this->lazy[$rt] += $c;
			$this->sum[$rt] = $c*($r-$l+1);
			return;
		}
		$mid = $l+(($r-$l)>>1);
		if($rangel<=$mid){
			$this->add($rangel,$mid,$l,$r,$rt<<1,$c);
		}
		if($ranger>$mid){
			$this->add($mid,$ranger,$l,$r,$rt<<1|1,$c);
		}
		$this->pushdown($l-$rangel,$r-$ranger,$rt);
	}
	// 下推标记函数 ln,rn 左子树数量右子树数量
	public function pushdown($ln,$rn,$rt){
		if($this->update[$rt]){
			// 下推标记
			$this->update[$rt<<1]+=$this->update[$rt];
			$this->update[$rt<<1|1]+=$this->update[$rt];
			//修改子节点sum与update对应
			$this->sum[$rt<<1] = $this->update[$rt]*$ln;
			$this->sum[$rt<<1|1] = $this->update[$rt]*$rn;
			$this->lazy[$rt] = 0;
		}
		if($this->lazy[$rt]){
			// 下推标记
			$this->lazy[$rt<<1]+=$this->lazy[$rt];
			$this->lazy[$rt<<1|1]+=$this->lazy[$rt];
			//修改子节点sum与lazy对应
			$this->sum[$rt<<1] = $this->lazy[$rt]*$ln;
			$this->sum[$rt<<1|1] = $this->lazy[$rt]*$rn;
			//清楚本节点标记
			$this->lazy[$rt] = 0;
		}
	}

	// 更新
	public function update($rangel,$ranger,$l,$r,$rt,$c){
		if($rangel<=$l&&$ranger<=$l){
			$this->update[$rt] = $c;
			$this->sum[$rt] = $c*($r-$l+1);
			return;
		}
		$mid = $l+(($r-$l)>>1);
		if($rangel<=$mid){
			$this->update($rangel,$mid,$l,$r,$rt<<1,$c);
		}
		if($ranger>$mid){
			$this->update($mid,$ranger,$l,$r,$rt<<1|1,$c);
		}
		$this->pushdown($l-$rangel,$r-$ranger,$rt);
	}

}
$origin = [1,2,3,4];
$l = 1; $r=4;
$obj = new SegmentTree($origin);
$obj->build($l,$r,1);
echo "<pre>";
print_r($obj->sum);