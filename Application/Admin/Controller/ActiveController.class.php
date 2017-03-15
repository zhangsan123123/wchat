<?php
/**
 * Created by PhpStorm.
 * User: jong
 * Date: 2017/3/15
 * Time: 15:07
 */

namespace Admin\Controller;

class ActiveController extends AdminController
{
    public function index(){

        $row = M('document');
        $list = $row->where(['category_id'=>43])->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function status1($id){
        $row = M('document');
        $row->where(['id'=>$id])->save(['status'=>2]);
        $this->redirect('Active/index');
    }
    public function status2($id){
        $row = M('document');
        $row->where(['id'=>$id])->save(['status'=>0]);
        $this->redirect('Active/index');
    }
}