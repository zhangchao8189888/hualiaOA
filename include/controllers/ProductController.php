<?php
/**
 * 产品类型
 *
 */
class ProductController extends FController
{
    private $productType_model;
    private $product_model;
    private $productPublish_model;

    public function __construct($id, $module = null) {

        parent::__construct($id, $module);
        $this->product_model = new Product();

    }
//注释
    protected function beforeAction($action) {

        parent::beforeAction($action);

        return true;
    }

    /**
     * 产品类型列表
     */
    public function actionIndex () {
        //分页参数
        $page = ($this->request->getParam('page') > 0) ? (int) $this->request->getParam('page') : 1;
        $page_size = ($this->request->getParam('size') > 0) ? (int) $this->request->getParam('size') : FConfig::item('config.pageSize');

        $condition_arr = array(
            'limit' => $page_size,
            'offset' => ($page - 1) * $page_size ,
            'order' =>  'type_sort asc'
        );
        //分页
        $data['count'] = $this->productType_model-> count($condition_arr);
        $pages = new FPagination($data['count']);
        $pages->setPageSize($page_size);
        $pages->setCurrent($page);
        $pages->makePages();


        $data['tdataList'] = $this->productType_model->findAll($condition_arr);
        $data['page'] = $pages;

        $this->render('index',$data);
    }


    /**
     * 产品类型添加
     */
    public function actionAdd () {
        $type_name = $this->request->getParam('type_name');
        $type_code = $this->request->getParam('type_code');
        $type_desc = $this->request->getParam('type_desc');
        $type_sort = $this->request->getParam('type_sort');
        $create_time = $update_time = FF_DATE_TIME;

        $condition_attr = array(
            'condition'=>"type_name=:type_name",
            'params' => array(':type_name'=>$type_name,),
        );
        $count = $this->productType_model->count($condition_attr);
        if($count > 0){
            $response['status'] = 100002;
            $response['content'] = '用户名已存在';
            Yii::app()->end(FHelper::json($response['content'], $response['status']));
        }
        $condition_attr = array(
            'type_name' =>  $type_name,
            'type_code' =>  $type_code,
            'description' =>  $type_desc,
            'type_sort' =>  $type_sort,
            'create_time' =>  $create_time,
            'update_time' =>  $update_time,
        );

        $this->productType_model->attributes = $condition_attr;
        $res = $this->productType_model->save();

        if ($res) {
            $response['status'] = 100000;
            $response['content'] = 'success';

        } else {
            $response['status'] = 100001;
            $response['content'] = 'error';
        }

        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

    /**
     * 产品列表
     */
    public function actionProductList () {
        $product_name = trim($this->request->getParam('search_product_name') ? $this->request->getParam('search_product_name') : '');
        $product_type = trim($this->request->getParam('search_product_type') ? $this->request->getParam('search_product_type') : '');

        //分页参数
        $page = ($this->request->getParam('page') > 0) ? (int) $this->request->getParam('page') : 1;
        $page_size = ($this->request->getParam('size') > 0) ? (int) $this->request->getParam('size') : FConfig::item('config.pageSize');

        $condition_arr = array(
            'limit' => $page_size,
            'offset' => ($page - 1) * $page_size ,
        );
        //查询
        $where ='1=1';
        if ($product_type) {
            $where.= " and product_type_id = '$product_type' ";
        }
        if ($product_name) {
            $where.= " and name like :product_name ";
        }

        $condition_arr['condition'] = $where;
        $condition_arr['params'] = array(
            ':product_name' => "%".$product_name."%"
        );

        //分页
        $data['count'] = $this->product_model-> count($condition_arr);
        $pages = new FPagination($data['count']);
        $pages->setPageSize($page_size);
        $pages->setCurrent($page);
        $pages->makePages();

        $data['dataList'] = $this->product_model->findAll($condition_arr);
        $data['business_list'] =  Business::model()->findAll();


        $data['loan_type_text'] = FConfig::item('config.loan_type_text');
        $data['mortgage_type_text'] = FConfig::item('config.mortgage_type_text');
        $data['month_rate_type_text'] = FConfig::item('config.month_rate_type_text');
        $data['identity_type_text'] = FConfig::item('config.identity_type_text');

        $data['product_type'] = $product_type;
        $data['product_name'] = $product_name;

        $data['page'] = $pages;

        $this->render('productList',$data);
    }
    /**
     * 产品添加
     */
    public function actionProductAdd(){
        $earn_days_sign = '';
        $product_name           = $this->request->getParam('product_name');
        $loan_type       = $this->request->getParam('loan_type');
        $star        = $this->request->getParam('star');
        $mortgage_type          = $this->request->getParam('mortgage_type');
        $money_least        = $this->request->getParam('money_least');
        $money_max            = $this->request->getParam('money_max');
        $period_least    = $this->request->getParam('period_least');
        $period_max    = $this->request->getParam('period_max');
        $month_rate_type    = $this->request->getParam('month_rate_type');
        $month_rate_least    = $this->request->getParam('month_rate_least');
        $month_rate_max    = $this->request->getParam('month_rate_max');
        $service_cost    = $this->request->getParam('service_cost');
        $lend_day    = $this->request->getParam('lend_day');
        $apply_condition    = $this->request->getParam('apply_condition');
        $need_info    = $this->request->getParam('need_info');
        $business_id    = $this->request->getParam('business_id');

        $create_time            = $update_time = FF_DATE_TIME;


        $condition_attr = array(
            'condition'=>"name=:product_name",
            'params' => array(':product_name'=>$product_name,),
        );
        $count = $this->product_model->count($condition_attr);
        if($count > 0){
            $response['status'] = 100002;
            $response['content'] = '产品名已存在';
            Yii::app()->end(FHelper::json($response['content'], $response['status']));
        }
        $condition_attr = array(
            'name'          =>  $product_name,
            'loan_type'          =>  $loan_type,
            'star'       =>  $star,
            'mortgage_type'       =>  $mortgage_type,
            'money_least'          =>  $money_least,
            'money_max'       =>  $money_max,
            'period_least'           =>  $period_least,
            'period_max'   =>  $period_max,
            'month_rate_type'   =>  $month_rate_type,
            'month_rate_least'    =>  $month_rate_least,
            'month_rate_max'         =>  $month_rate_max,
            'service_cost'         =>  $service_cost,
            'lend_day'   =>  $lend_day,
            'apply_condition'   =>  $apply_condition,
            'need_info'   =>  $need_info,
            'business_id'   =>  $business_id,

            'create_time'           =>  $create_time,
            'update_time'           =>  $update_time,
        );

        $this->product_model->attributes = $condition_attr;
        $res = $this->product_model->save();
        if ($res) {
            $response['status'] = 100000;
            $response['content'] = 'success';

        } else {
            $response['status'] = 100001;
            $response['content'] = '添加失败！';
        }

        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

    /**
     * 修改前  获取原有数据
     */
    public function actionGetUpdate(){
        $id = $this->request->getParam('id');
        $data['oldDataList'] = $this->product_model->findByPk($id);
        if(!empty($data['oldDataList'])){
            $response['status'] = 100000;
            $response['content'] = $data['oldDataList']->getAttributes();

        } else {

            $response['status'] = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

    /**
     * 产品修改
     */
    public function actionProductUpdate(){

        $id = $this->request->getParam('id');
        $product_name           = $this->request->getParam('product_name');
        $loan_type       = $this->request->getParam('loan_type');
        $star        = $this->request->getParam('star');
        $mortgage_type          = $this->request->getParam('mortgage_type');
        $money_least        = $this->request->getParam('money_least');
        $money_max            = $this->request->getParam('money_max');
        $period_least    = $this->request->getParam('period_least');
        $period_max    = $this->request->getParam('period_max');
        $month_rate_type    = $this->request->getParam('month_rate_type');
        $month_rate_least    = $this->request->getParam('month_rate_least');
        $month_rate_max    = $this->request->getParam('month_rate_max');
        $service_cost    = $this->request->getParam('service_cost');
        $lend_day    = $this->request->getParam('lend_day');
        $apply_condition    = $this->request->getParam('apply_condition');
        $need_info    = $this->request->getParam('need_info');
        $business_id_up    = $this->request->getParam('business_id_up');
        $update_time = FF_DATE_TIME;

        $condition_attr = array(
            'name'          =>  $product_name,
            'loan_type'       =>  $loan_type,
            'star'       =>  $star,
            'mortgage_type'          =>  $mortgage_type,
            'money_least'       =>  $money_least,
            'money_max'           =>  $money_max,
            'period_least'   =>  $period_least,
            'period_max'   =>  $period_max,
            'month_rate_type'   =>  $month_rate_type,
            'month_rate_least'   =>  $month_rate_least,
            'month_rate_max'    =>  $month_rate_max,
            'service_cost'         =>  $service_cost,
            'lend_day'         =>  $lend_day,
            'apply_condition'   =>  $apply_condition,
            'need_info'   =>  $need_info,
            'business_id_up'   =>  $business_id_up,
            'update_time'   =>  $update_time,
        );

        $res = $this->product_model->updateByPk($id,$condition_attr);
        //print_r($this->product_model);
        if ($res) {
            $response['status'] = 100000;
            $response['content'] = 'success';
        } else {
//            print_r($this->product_model);
            $response['status'] = 100001;
            $response['content'] = 'error';
        }

        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

    /**
     * 产品删除
     */
    public function actionProductDelete () {
        $id = $this->request->getParam('id');
        $condition_attr = array(
            'id' => $id,

        );

        $res = $this->product_model->deleteByPk($condition_attr);
        if($res){
            $response['status'] = 100000;
            $response['content'] = 'success';

        }else{
            $response['status'] = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'],$response['status']));
    }


    /**
     * 产品类型删除
     */
    public function actionDelete () {
        $tid = $this->request->getParam('tid');
        $condition_attr = array(
            'id' => $tid,

        );

        $res = $this->productType_model->deleteByPk($condition_attr);
        if($res){
            $response['status']  = 100000;
            $response['content'] = 'success';

        }else{
            $response['status']  = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'],$response['status']));
    }

    /**
     * 产品类型排序
     */
    public function actionProTypeSort(){
        $id         = $this->request->getParam('id');               //原记录id
        $new_sort       = $this->request->getParam('new_sort');             //添加的sort值

        //修改原纪录的type_sort
        $condition_attr = array(
            'type_sort'     =>  $new_sort,
        );
        $result = $this->productType_model->updateByPk($id,$condition_attr);
        if($result){
            $response['status']  = 100000;
            $response['content'] = success;
        }else{

            $response['status']  = 100002;
            $response['content'] = error;
        }
        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }
    public function actionPublish (){
        $page = ($this->request->getParam('page') > 0) ? (int) $this->request->getParam('page') : 1;
        $page_size = ($this->request->getParam('size') > 0) ? (int) $this->request->getParam('size') : FConfig::item('config.pageSize');

        $condition_arr = array(
            'limit' => $page_size,
            'offset' => ($page - 1) * $page_size ,
        );
        //分页
        $data['count'] = $this->productPublish_model-> count($condition_arr);
        $pages = new FPagination($data['count']);
        $pages->setPageSize($page_size);
        $pages->setCurrent($page);
        $pages->makePages();

        $data['proTypeList'] = $this->productType_model->findAll();
        $data['publishList'] = array();
        $data['productList'] = array();

        //查询产品
        $proRes = $this->product_model->findAll();
        foreach($proRes as $val){
            $data['productList'][$val['id']] = $val->getAttributes();
        }

        $res = $this->productPublish_model->findAll($condition_arr);
        if (is_array($res)) {
            foreach ($res as $val) {
                $publish = $val->getAttributes();
                $publish['product'] = $data['productList'][$val['product_id']];
                $data['publishList'][] = $publish;
            }
        }

        $data['invest_issue_types'] = FConfig::item('config.invest_issue_types');
        $data['publish_status'] = FConfig::item('config.publish_status');

        $data['page'] = $pages;

        $this->render('publish',$data);
    }
    public function actionProductPublish(){
        $proId = $this->request->getParam('id');
        $product = $this->product_model->findByPk($proId);

        $code_prefix = $product['product_code'];

        $condiation = array(
            'condition'=>"product_id=:product_id",
            'params' => array(':product_id'=>$proId,),
        );
        $count = $this->productPublish_model->count($condiation);
        if ($count) {
            $count+=1;
            $count = $count>10 ? $count :'0'.$count;
        } else {
            $count = '01';
        }

        $condition_attr = array(
            'product_id' =>  $proId,
            'publish_code' =>  $code_prefix.$count,
            'create_time' =>  FF_DATE_TIME,
            'publish_status' =>  1,
        );
        $this->productPublish_model->attributes = $condition_attr;
        $res = $this->productPublish_model->save();
        if ($res) {
            $response['status'] = 100000;
            $response['content'] = 'success';

        } else {
//            print_r($this->product_model);
            $response['status'] = 100001;
            $response['content'] = 'error';
        }

        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }

    /**
     * 状态 开启和停用
     */
    public function actionModifyProduct () {
        $id = $this->request->getParam('id');
        $publish_status = $this->request->getParam('publish_status');
        $condition = array(
            'publish_status'   =>  $publish_status,
        );
        $res = $this->productPublish_model->updateByPk($id,$condition);
        if($res){
            $response['status'] = 100000;
            $response['content'] = 'success';
        }else{
            $response['status'] = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'],$response['status']));
    }
    /**
     * 推送
     */
    public function actionPushProduct(){
        $id = $this->request->getParam('id');
        $publish_personal = $this->request->getParam('publish_personal');
        $publish_index = $this->request->getParam('publish_index');
        $condition_attr = array(
            'publish_personal' => $publish_personal,
            'publish_index' => $publish_index
        );
        $res = $this->productPublish_model->updateByPk($id,$condition_attr);
        if($res){
            $response['status'] = 100000;
            $response['content'] = 'success';
        }else{
            $response['status'] = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'],$response['status']));
    }
    /**
     * 获取推送状态
     */
    public function actionGetPush () {
        $id = $this->request->getParam('id');
        $res = $this->productPublish_model->findByPk($id);
        if(!empty($res)){
            $response['status'] = 100000;
            $response['content'] = $res->getAttributes();
        } else {
            $response['status'] = 100001;
            $response['content'] = 'error';
        }
        Yii::app()->end(FHelper::json($response['content'], $response['status']));
    }
}