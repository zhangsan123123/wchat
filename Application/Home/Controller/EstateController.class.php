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
        //page 第1个参数是第几页    第二个参数是每夜显示多少条
        $list = $row->where(['category_id'=>40])->page($p,C('LIST_ROWS'))->select();
        foreach($list as &$value){
            $value['path'] = get_cover($value['cover_id'],'path');
            $value['add_time'] = time_format($value['create_time']);
        }
        if(IS_AJAX){
            $this->ajaxReturn($list);
        }
        $this->assign('list',$list);
        $this->display();

    }
    public function detail($id){
        $row = M('document');
        $list = $row->where(['id'=>$id])->select();
        $view = $list[0]['view'] += 1;
        $a = $row->where(['id'=>$id])->save(['view'=>$view]);
        $this->assign('list',$list);
        $this->display();
    }

}