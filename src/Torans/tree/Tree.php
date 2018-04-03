<?php
/**
 * Tree&数组格式转换
 * Created by PhpStorm.
 * User: Demo.Ran
 * Date: 2018/4/3
 * Time: 16:01
 * Email: demo.ran@icloud.com
 */

namespace Torans\Tree;


class Tree
{

    /**
     * 数组层级缩进转换
     * @param array $array 源数组
     * @param int   $pid
     * @param int   $level
     * @return array
     */
    function arr2level($array, $pid = 0, $level = 1)
    {
        static $list = [];
        $prefix = '|-';
        foreach ($array as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $v['_name'] = $prefix.$v['name'];
                $list[]     = $v;
                $this->array2level($array, $v['id'], $level + 1);
            }
        }
        return $list;
    }

    /**
     * 将数组转为树形结构
     * @param $tree
     * @param int $rootId
     * @param int $level
     * @return array
     */
    function arr2tree($tree, $rootId = 0,$level=1) {
        $return = array();
        foreach($tree as $leaf) {
            if($leaf['pid'] == $rootId) {
                $leaf["level"] = $level;
                foreach($tree as $subleaf) {
                    if($subleaf['pid'] == $leaf['id']) {
                        $leaf['children'] = $this->arr2tree($tree, $leaf['id'],$level+1);
                        break;
                    }
                }
                $return[] = $leaf;
            }
        }
        return $return;
    }
}