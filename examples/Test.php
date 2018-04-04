<?php
/**
 * 类&文件说明
 * Created by PhpStorm.
 * User: Demo.Ran
 * Date: 2018/4/4
 * Time: 10:55
 * Email: demo.ran@icloud.com
 */

class ArrayToTreeTest
{

    public function toLevel()
    {
        $data = [];
//        return ArrayToTree::arr2level($data);
        return \Torans\Tree\ArrayToTree::arr2tree($data);
    }
}