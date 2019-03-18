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
        <a href="/approval/" class="current">审批管理</a>
        <a href="/approval/entrustList" class="current">委托列表</a>
    </div>
</div>
<div class="container-fluid">
    <div class="accordion-heading">
        <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse" class="collapsed"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>高级搜索</h5>
            </a> </div>
    </div>
    <div class="accordion-body collapse" id="collapseGTwo" style="height: 0px;">
        <form name="search-form" class="search-form" action="/approval/approvalList">
            <div class="search-message">
                产品名称 ：<input type="text" value="<?php echo $product_name;?>" name="search_product_name" /><br />
                <input type="submit" class="search-mobile btn btn-primary" value="查找" />
            </div>
        </form>
    </div>
    <div class="row-fluid">

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
                                <th class="tl" width="4%"><div>委托ID</div></th>
                                <th class="tl"><div>客户名</div></th>
                                <th class="tl"><div>客户手机号</div></th>
                                <th class="tl"><div>客户身份</div></th>
                                <th class="tl"><div>委托时间</div></th>
                            </tr>
                            </thead>
                            <tbody  class="tbodays">
                            <?php if($count == 0){?>
                                <tr><td colspan="10">没有符合条件记录</td></tr>
                            <?php }else {  foreach ($dataList as $k => $row){ ?>
                                <tr >
                                    <td><div><?php echo $row['id'];?></div></td>
                                    <td><div><?php echo $row['name']." (".($row['sex']==1?"先生":"女士").")";?></div></td>
                                    <td><div><?php echo $row['phone'];?></div></td>
                                    <td><div><?php echo $identity_config[$row['identity_type']];?></div></td>
                                    <td><div><?php echo $row['update_time'];?></div></td>
                                </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <?php $this->renderPartial('//page/index',array('page'=>$page)); ?>
        </div>
    </div>
</div>


