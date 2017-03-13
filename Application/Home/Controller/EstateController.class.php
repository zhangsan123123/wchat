<?php
/**
 * Created by PhpStorm.
 * User: jong
 * Date: 2017/3/13
 * Time: 14:54
 */

namespace Home\Controller;


class EstateController extends HomeController
{
    public function index($p = 1){


        $row = M('document');

        $list = $row->page($p,C('LIST_ROWS'))->select();
        $this->assign('list',$list);
        $this->display();
    }

}