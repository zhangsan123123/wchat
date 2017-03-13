<?php
/**
 * Created by PhpStorm.
 * User: jong
 * Date: 2017/3/12
 * Time: 13:03
 */

namespace Admin\Controller;


use Think\Page;

class RepairController extends AdminController
{
    public function index(){
        $pid = i('get.pid', 0);
        /* 获取频道列表 */
        $map  = array('status' => array('gt', -1), 'pid'=>$pid);
        $repair = M('repair');
//        import('ORG.Util.page');
        $page = new Page($repair->count(),2);
        $show = $page->show();
        $list = $repair->where($map)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('pid', $pid);
        $this->assign('page', $show);
        $this->meta_title = '导航管理';
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $Repair = D('Repair');
            $Repair->time = time();
            $Repair->sno = rand(00000000000,99999999999);
            $Repair->status = 1;
            $data = $Repair->create();
            if($data){
                $Repair->time = time();
                $Repair->sno = rand(00000000000,99999999999);
                $Repair->status = 1;
                $id = $Repair->add();
                if($id){
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $pid = i('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Repair')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->meta_title = '新增导航';
            $this->display('edit');
        }

    }

    public function edit($id){

        if(IS_POST){
            $Channel = D('repair');
            $data = $Channel->create();
            if($data){
                if($Channel->save()){
                    $this->success('编辑成功', U('index'));
                }
                else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Channel->getError());
            }
        } else {
            $info = array();
            $info = M('repair')->find($id);
            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $pid = i('get.pid', 0);

            //获取父导航
            if(!empty($pid)){
                $parent = M('repair')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }
            $this->assign('pid', $pid);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('repair')->where($map)->delete()){
            //记录行为
            action_log('update_channel', 'channel', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}