<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 18:08
 */

$typeList=$data['typeList'];
?>



<style>
    .month_tips{float: left;}
</style>



<div id="content-header">
    <div id="breadcrumb">
        <a href="/index.php" title="返回首页" class="tip-bottom"><i class="icon-home"></i>首页</a>
        <a href="/product/" class="current">产品管理</a>
        <a href="/product/productList" class="current">产品列表</a>
    </div>
</div>
<div class="container-fluid">
    <div class="accordion-heading">
        <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse" class="collapsed"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>高级搜索</h5>
            </a> </div>
    </div>
    <div class="accordion-body collapse" id="collapseGTwo" style="height: 0px;">
        <form name="search-form" class="search-form" action="/product/productList">
            <div class="search-message">
                产品名称 ：<input type="text" value="<?php echo $product_name;?>" name="search_product_name" /><br />
                产品类型 ：<input type="text" value="<?php echo $product_type;?>" name="search_product_type" /><br />
                产品类型 ：<select name="search_product_type">
                    <?php foreach ($mortgage_type_text as $k => $v){
                        if($k == $product_type){?>
                            <option value="<?php echo $k;?>" selected="selected"><?php echo $v;?></option>
                        <?php }else{?>
                            <option value="<?php echo $k;?>"><?php echo $v;?></option>
                        <?php }}?>
                </select><br />
                <input type="submit" class="search-mobile btn btn-primary" value="查找" />
            </div>
        </form>
    </div>
    <div class="row-fluid">

        <div class="span12">
            <div class="controls">
                <div style="float: right;margin-right: 20px"><a href="#" id="pro_add" class="btn btn-success"/>添加产品</a></div>
            </div>
        </div>

        <div class="span12">
            <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="dataTables_length">
                                <span class="pull-right">
                                <span class="badge badge-warning"><?php echo $count; ?></span>&nbsp;
                                </span>
                            </div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="tl" width="4%"><div>ID</div></th>
                                <th class="tl"><div>产品名称</div></th>
                                <th class="tl"><div>贷款机构</div></th>
                                <th class="tl"><div>贷款分类</div></th>
                                <th class="tl"><div>星级</div></th>
                                <th class="tl"><div>城市</div></th>
                                <th class="tl"><div>产品类型</div></th>
                                <th class="tl"><div>额度范围</div></th>
                                <th class="tl"><div>贷款期限范围</div></th>
                                <th class="tl"><div>月利率类型</div></th>
                                <th class="tl"><div>月利率范围</div></th>
                                <th class="tl"><div>服务费</div></th>
                                <th class="tl"><div>放款时间（天）</div></th>
                                <th class="tl"><div>适用身份</div></th>
                                <th class="tl"width="6%"><div>操作</div></th>
                            </tr>
                            </thead>
                            <tbody  class="tbodays">
                            <?php if($count == 0){?>
                                <tr><td colspan="10">没有符合条件记录</td></tr>
                            <?php }else {  foreach ($dataList as $k => $row){
                                $b_res = Business::model()->findByPk($row['business_id']);

                                //$row['business_name'] = $b_res->name;
                                ?>
                                <tr >
                                    <td><div><?php echo $row['id'];?></div></td>
                                    <td><div><?php echo $row['name'];?></div></td>
                                    <td><div><?php echo $b_res->name;?></div></td>
                                    <td><div><?php echo $loan_type_text[$row['loan_type']];?></div></td>
                                    <td><div><?php echo $row['star'];?></div></td>
                                    <td><div><?php echo $row['city'];?></div></td>
                                    <td><div><?php echo $mortgage_type_text[$row['mortgage_type']];?></div></td>
                                    <td><div><?php echo $row['money_least']."-".$row['money_max'];?></div></td>
                                    <td><div><?php echo $row['period_least']."-".$row['period_max'];?></div></td>
                                    <td><div><?php echo $month_rate_type_text[$row['month_rate_type']];?></div></td>
                                    <td><div><?php echo $row['month_rate_least']."-".$row['month_rate_max'];?></div></td>
                                    <td><div><?php echo $row['service_cost'];?></div></td>
                                    <td><div><?php echo $row['lend_day'];?></div></td>
                                    <td><div><?php echo $identity_type_text[$row['identity_type']];?></div></td>
                                    <td class="tr">
                                        <a title="删除" href="#" data-id="<?php echo $row['id'];?>"  class=" rowDelete pointer theme-color">删除</a> |
                                        <a title="修改" href="#" data-id="<?php echo $row['id'];?>"  class="pro_update pointer theme-color">修改</a>
                                    </td>
                                </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <?php $this->renderPartial('//page/index',array('page'=>$page)); ?>
        </div>
    </div>
</div>



<script src="<?php echo FF_STATIC_BASE_URL;?>/common-js/ff.product.js?6" type="text/javascript"></script>

<!--产品添加--START---->
<div class="modal hide" id="modal-add-event">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>产品新增</h3>
    </div>
    <div class="modal-body">
        <form id="pro_form">
        <div class="form-horizontal form-alert">
            <div class="control-group">
                <label class="control-label"><em class="red-star">*</em>产品名称 :</label>
                <div class="controls">
                    <input type="text" id="product_name" class="span3" name="product_name" placeholder="产品名称">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><em class="red-star"></em>星级 :</label>
                <div class="controls">
                    <input type="text" id="star" class="span3" name="star" placeholder="星级">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">贷款机构 :</label>
                <div class="controls">
                    <select id="business_id">
                        <?php
                        if (!empty($business_list)) {
                            foreach($business_list as $key=>$val){
                                echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">贷款分类 :</label>
                <div class="controls">
                    <select id="loan_type">
                        <?php
                        if (!empty($loan_type_text)) {
                            foreach($loan_type_text as $key=>$val){
                                echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">产品类型 :</label>
                <div class="controls">
                    <select id="mortgage_type">
                        <?php
                        if (!empty($mortgage_type_text)) {
                            foreach($mortgage_type_text as $key=>$val){
                                echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">贷款金额 :</label>
                <div class="controls">
                    <input type="text" class="span1" id="money_least" placeholder="贷款金额min"><span class="month_tips">-</span>
                    <input type="text" class="span1" id="money_max" placeholder="贷款金额max">（万）
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">贷款期限 :</label>
                <div class="controls">
                    <input type="text" class="span1" id="period_least" placeholder="贷款期限最小值"><span class="month_tips">-</span>
                    <input type="text" class="span1" id="period_max" placeholder="贷款期限最大值">（月）
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">月利率类型 :</label>
                <div class="controls">
                    <select id="month_rate_type">
                        <?php
                        if (!empty($month_rate_type_text)) {
                            foreach($month_rate_type_text as $key=>$val){
                                echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">月利率 :</label>
                <div class="controls">
                    <input type="text" class="span1" id="month_rate_least" placeholder="月利率最小值"><span class="month_tips">-</span>
                    <input type="text" class="span1" id="month_rate_max" placeholder="月利率最大值">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">服务费 :</label>
                <div class="controls">
                    <input type="text" id="service_cost" placeholder="服务费">元
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">放款时间 :</label>
                <div class="controls">
                    <input type="text" id="lend_day" placeholder="项目总金额">天
                </div>
            </div>
            <div class="control-group" id="div_tEND_days">
                <label class="control-label">申请条件 :</label>
                <div class="controls">
                    <textarea id="apply_condition" name="apply_condition"></textarea>
                </div>
            </div>
            <div class="control-group" id="div_tEND_days">
                <label class="control-label">所需资料 :</label>
                <div class="controls">
                    <textarea id="need_info" name="need_info"></textarea>
                </div>
            </div>
            <div class="control-group" style="display: none" id="div_invest_start_date">
                <label class="control-label">固定日期开始 :</label>
                <div class="controls">
                    <input type="text" id="invest_start_date" name="invest_start_date"  onFocus="WdatePicker({isShowClear:false,readOnly:true,dateFmt:'yyyy-MM-dd',realDateFmt:'yyyy-MM-dd'})"/>
                </div>
            </div>
            <div class="control-group" style="display: none" id="div_invest_end_date">
                <label class="control-label">固定日期结束 :</label>
                <div class="controls">
                    <input type="text" id="invest_end_date" name="invest_end_date"  onFocus="WdatePicker({isShowClear:false,readOnly:true,dateFmt:'yyyy-MM-dd',realDateFmt:'yyyy-MM-dd'})"/>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="modal-footer modal_operate">
        <button type="button" class="btn btn-primary btn_add">添加</button>
        <a href="#" class="btn" data-dismiss="modal">取消</a>
    </div>
</div>
<!--产品添加--END---->


<!--产品修改--START---->
<div class="modal hide" id="modal-update-event">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>产品修改</h3>
    </div>
    <div class="modal-body">
        <form id="pro_update_form">
            <div class="form-horizontal form-alert">
                <div class="control-group">
                    <label class="control-label"><em class="red-star">*</em>产品名称 :</label>
                    <div class="controls">
                        <input type="text" id="product_name_up" class="span3" name="product_name" placeholder="产品名称">
                        <input type="hidden" id="id" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><em class="red-star"></em>星级 :</label>
                    <div class="controls">
                        <input type="text" id="star_up" class="span3" name="star" placeholder="星级">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">贷款机构 :</label>
                    <div class="controls">
                        <select id="business_id_up">
                            <?php
                            if (!empty($business_list)) {
                                foreach($business_list as $key=>$val){
                                    echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">贷款分类 :</label>
                    <div class="controls">
                        <select id="loan_type_up">
                            <?php
                            if (!empty($loan_type_text)) {
                                foreach($loan_type_text as $key=>$val){
                                    echo '<option value="'.$key.'">'.$val.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">产品类型 :</label>
                    <div class="controls">
                        <select id="mortgage_type_up">
                            <?php
                            if (!empty($mortgage_type_text)) {
                                foreach($mortgage_type_text as $key=>$val){
                                    echo '<option value="'.$key.'">'.$val.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">贷款金额 :</label>
                    <div class="controls">
                        <input type="text" class="span1" id="money_least_up" placeholder="贷款金额min"><span class="month_tips">-</span>
                        <input type="text" class="span1" id="money_max_up" placeholder="贷款金额max">（万）
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">贷款期限 :</label>
                    <div class="controls">
                        <input type="text" class="span1" id="period_least_up" placeholder="贷款期限最小值"><span class="month_tips">-</span>
                        <input type="text" class="span1" id="period_max_up" placeholder="贷款期限最大值">（月）
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">月利率类型 :</label>
                    <div class="controls">
                        <select id="month_rate_type_up">
                            <?php
                            if (!empty($month_rate_type_text)) {
                                foreach($month_rate_type_text as $key=>$val){
                                    echo '<option value="'.$key.'">'.$val.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">月利率 :</label>
                    <div class="controls">
                        <input type="text" class="span1" id="month_rate_least_up" placeholder="月利率最小值"><span class="month_tips">-</span>
                        <input type="text" class="span1" id="month_rate_max_up" placeholder="月利率最大值">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">服务费 :</label>
                    <div class="controls">
                        <input type="text" id="service_cost_up" placeholder="服务费">元
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">放款时间 :</label>
                    <div class="controls">
                        <input type="text" id="lend_day_up" placeholder="项目总金额">天
                    </div>
                </div>
                <div class="control-group" id="div_tEND_days">
                    <label class="control-label">申请条件 :</label>
                    <div class="controls">
                        <textarea id="apply_condition_up" name="apply_condition_up"></textarea>
                    </div>
                </div>
                <div class="control-group" id="div_tEND_days">
                    <label class="control-label">所需资料 :</label>
                    <div class="controls">
                        <textarea id="need_info_up" name="need_info_up"></textarea>
                    </div>
                </div>
                <div class="control-group" style="display: none" id="div_invest_start_date_up">
                    <label class="control-label">固定日期开始 :</label>
                    <div class="controls">
                        <input type="text" id="invest_start_date_up" name="invest_start_date_up"  onFocus="WdatePicker({isShowClear:false,readOnly:true,dateFmt:'yyyy-MM-dd',realDateFmt:'yyyy-MM-dd'})"/>
                    </div>
                </div>
                <div class="control-group" style="display: none" id="div_invest_end_date_up">
                    <label class="control-label">固定日期结束 :</label>
                    <div class="controls">
                        <input type="text" id="invest_end_date" name="invest_end_date"  onFocus="WdatePicker({isShowClear:false,readOnly:true,dateFmt:'yyyy-MM-dd',realDateFmt:'yyyy-MM-dd'})"/>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer modal_operate">
        <button type="button" class="btn_update btn btn-primary">保存</button>
        <a href="#" class="btn" data-dismiss="modal">取消</a>

    </div>
</div>
<!--产品修改--END---->