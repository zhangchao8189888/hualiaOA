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
        <a href="/approval/approvalList" class="current">审批列表</a>
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
                产品类型 ：
                <select name="search_loan_type">
                    <option value="1" <?php echo $searchLoanType==1 || empty($searchLoanType) ? 'selected' : '' ?>>信用贷</option>
                    <option value="2" <?php echo $searchLoanType==2 ? 'selected' : '' ?>>房贷</option>
                </select>
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
                                <th class="tl" width="4%"><div>产品ID</div></th>
                                <th class="tl"><div>产品名称</div></th>
                                <th class="tl"><div>贷款金额</div></th>
                                <th class="tl"><div>贷款期限</div></th>
                                <th class="tl"><div>用户名</div></th>
                                <th class="tl"><div>手机号</div></th>
                                <th class="tl"><div>操作进度</div></th>
                                <th class="tl"><div>   操作   </div></th>
                            </tr>
                            </thead>
                            <tbody  class="tbodays">
                            <?php if($count == 0){?>
                                <tr><td colspan="10">没有符合条件记录</td></tr>
                            <?php }else {  foreach ($dataList as $k => $row){ ?>
                                <tr >
                                    <td><div><?php echo $row['pro_id'];?></div></td>
                                    <td><div><?php echo $row['pro_name'];?></div></td>
                                    <td><div><?php echo $row['money'];?></div></td>
                                    <td><div><?php echo $row['period'];?></div></td>
                                    <td><div><?php echo $row['user_name'];?></div></td>
                                    <td><div><?php echo $row['phone'];?></div></td>
                                    <?php
                                    $statusList = explode(',', $row['status_list']);
                                    $updateTimeList = explode(',', $row['update_time_list']);
                                    echo "<td><div><url>";
                                    foreach ($statusList as $key=>$status) {
                                        echo '<li>'.$status_config[$status].': '.$updateTimeList[$key].'</li>';
                                    }
                                    echo "</div></td>";
                                    ?>
                                    <td class="tr">
                                        <?php
                                        $maxStatus = max($statusList);
                                        $nextStatus = intval($maxStatus+1);
                                        if (isset($status_config[$nextStatus])) {
                                            $opText = $status_config[$nextStatus];
                                            $class = $maxStatus==2 ? 'btn-success' : ($maxStatus==1 ? 'btn-primary' : '');
                                            echo "<a title='{$opText}' href='javascript:void();' class='approval btn {$class}' data-id='{$row['user_pro_id']}' data-status='{$nextStatus}' data-loantype='{$row['loan_type']}'>{$opText}</a>";
                                        } else {
                                            echo "已放款";
                                        }
                                        ?>
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



<script src="<?php echo FF_STATIC_BASE_URL;?>/common-js/ff.approval.js?11" type="text/javascript"></script>

