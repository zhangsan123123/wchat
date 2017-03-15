<?php
/**
 * Created by PhpStorm.
 * User: jong
 * Date: 2017/3/15
 * Time: 14:16
 */

namespace Home\Controller;


class BusinessController extends HomeController
{
    public function index($p = 1){
        $data = time();
        $row = M('document');
        //page 第1个参数是第几页    第二个参数是每夜显示多少条
        $list = $row->where(['category_id'=>43,'status'=>2])->page($p,C('LIST_ROWS'))->select();
        foreach($list as $value){
            if($value['deadline'] < $data){
                $row->where(['id'=>$value['id']])->save([(['status'=>0])]);
            }
        }
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
}