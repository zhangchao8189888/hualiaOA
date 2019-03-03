<?php
/**
 * 产品类型
 *
 */
class ApprovalController extends FController
{
    private $userPro_model;

    public function __construct($id, $module = null) {

        parent::__construct($id, $module);
        $this->userPro_model = new UserPro();

    }
//注释
    protected function beforeAction($action) {

        parent::beforeAction($action);

        return true;
    }

    /**
     * 列表
     */
    public function actionApprovalList () {
        $product_name = trim($this->request->getParam('search_product_name') ? $this->request->getParam('search_product_name') : '');

        //分页参数
        $page = ($this->request->getParam('page') > 0) ? (int) $this->request->getParam('page') : 1;
        $page_size = ($this->request->getParam('size') > 0) ? (int) $this->request->getParam('size') : FConfig::item('config.pageSize');

        $condition_arr = array(
            'limit' => $page_size,
            'offset' => ($page - 1) * $page_size ,
        );

        $where ='1=1';
        $paramsArr = array();
        if ($product_name) {
            $where.= " and t3.name like :product_name ";
            $paramsArr[':product_name'] = $product_name;
        }

        // sql
        $connection = Yii::app()->h_db;
        $findSql = "select t1.id as user_pro_id,t1.user_id, t1.money, t1.pro_id, t1.period, t2.name as user_name, t2.phone, t3.name as pro_name,group_concat(t1.`status` order by t1.`status`) as status_list,group_concat(t1.`update_time` order by t1.`update_time`) as update_time_list from h_user_pro t1 left join h_user t2 on t2.id=t1.user_id left join h_product t3 on t3.id=t1.pro_id where {$where} group by t1.pro_id,t1.user_id order by t1.id desc limit {$condition_arr['offset']},{$condition_arr['limit']}";
//        print_r($findSql);exit;
        $command = $connection->createCommand($findSql);
        $result = $command->query($paramsArr);

        //分页
        $data['count'] = $this->userPro_model-> count($condition_arr);
        $pages = new FPagination($data['count']);
        $pages->setPageSize($page_size);
        $pages->setCurrent($page);
        $pages->makePages();

        $data['dataList'] = $result;

        $data['status_config'] = FConfig::item('config.apply_status');
//        echo '<pre>';print_r($data);exit;


        $data['page'] = $pages;
//        echo '<pre>';
//        print_r($data['dataList'][0]['']);exit;

        $this->render('approvalList',$data);
    }
    /**
     * 产品添加
     */
    public function actionUpdateStatus(){
        $userProId = $this->request->getParam('id');
        $status    = $this->request->getParam('status');

        $result = $this->userPro_model->findByPk($userProId);

        $condition_attr = array(
            'user_id'           => $result['user_id'],
            'pro_id'            => $result['pro_id'],
            'recommend_base_id' => $result['recommend_base_id'],
            'credit_type'       => $result['credit_type'],
            'money'             => $result['money'],
            'period'            => $result['period'],
            'urgent'            => $result['urgent'],
            'is_house'          => $result['is_house'],
            'house_location'    => $result['house_location'],
            'status'            => $status,
            'update_time'       => date('Y-m-d H:i:s'),
        );

        $this->userPro_model->attributes = $condition_attr;
        $res = $this->userPro_model->save();
        if ($res) {
            $response['status'] = 100000;
            $response['content'] = 'success';

        } else {
            $response['status'] = 100001;
            $response['content'] = '添加失败！';
        }

        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

}