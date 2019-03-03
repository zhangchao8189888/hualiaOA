/**
 * Created by zhangchao8189888 on 15-4-17.
 */
$(function(){
    $("#invest_start_type").on("change",function(){
        var interestType = $("#invest_start_type").val();
        if(interestType == 1){
            $("#div_tN_type").show();
            $("#div_tN_days").show();
            $("#div_tEND_days").show();
            $("#div_invest_start_date").hide();
            $("#div_invest_end_date").hide();
        } else if(interestType == 2){
            $("#div_tN_type").hide();
            $("#div_tN_days").hide();
            $("#div_tEND_days").hide();
            $("#div_invest_start_date").show();
            $("#div_invest_end_date").show();
        }
    });
    $("#pro_add").click(function(){
        $('#modal-add-event').modal({show:true});
        $("#pro_form")[0].reset();
        $("#invest_start_type").val(1);
        var interestType = $("#invest_start_type").val();
        if(interestType == 1){
            $("#div_tN_type").show();
            $("#div_tN_days").show();
            $("#div_tEND_days").show();
            $("#div_invest_start_date").hide();
            $("#div_invest_end_date").hide();
        } else if(interestType == 2){
            $("#div_tN_type").hide();
            $("#div_tN_days").hide();
            $("#div_tEND_days").hide();
            $("#div_invest_start_date").show();
            $("#div_invest_end_date").show();
        }
    });
    $(".rowDelete").click(function(){
        var id = $(this).attr("data-id");
        $.ajax(
            {
                type: "post",
                url: "/product/productDelete",
                data: {
                    id:id
                },
                dataType: "json",
                success: function(data){

                    if (data.status > 100000) {

                        alert('删除失败！');
                    } else {
                        alert('删除成功！');
                        window.location.reload();
                    }
                }
            }
        );
    });
    $(".btn_add").click(function(){
        var data = {};
        data.product_name = $('#product_name').val();
        data.loan_type = $('#loan_type').val();
        data.star = $('#star').val();
        data.mortgage_type = $('#mortgage_type').val();
        data.money_least = $('#money_least').val();
        data.money_max = $('#money_max').val();
        data.period_least = $('#period_least').val();
        data.period_max = $('#period_max').val();
        data.month_rate_type = $('#month_rate_type').val();
        data.month_rate_least = $('#month_rate_least').val();
        data.month_rate_max = $('#month_rate_max').val();
        data.service_cost = $('#service_cost').val();
        data.lend_day = $('#lend_day').val();
        data.apply_condition = $('#apply_condition').val();
        data.need_info = $('#need_info').val();
        $.ajax(
            {
                type:"post",
                url: GLOBAL_CF.DOMAIN+"/product/productAdd",
                data: data,
                dataType : "json",
                success:function(data){
                    if(data.status > 100000){
                        alert(data.content);
                    } else{
                        alert('添加成功！');
                        window.location.reload();
                    }
                }
            }
        );
    });
    /**
     * 产品修改
     */

    $("#update_invest_start_type").on("change",function(){
        var interestType = $("#update_invest_start_type").val();
        if(interestType == 1){
            $("#update_div_tN_type").show();
            $("#update_div_tN_days").show();
            $("#update_div_tEND_days").show();
            $("#update_div_invest_start_date").hide();
            $("#update_div_invest_end_date").hide();
        } else if(interestType == 2){
            $("#update_div_tN_type").hide();
            $("#update_div_tN_days").hide();
            $("#update_div_tEND_days").hide();
            $("#update_div_invest_start_date").show();
            $("#update_div_invest_end_date").show();
        }
    });
    $(".pro_update").click(function(){
        var interestType = $("#update_invest_start_type").val();
        if(interestType == 1){
            $("#update_div_tN_type").show();
            $("#update_div_tN_days").show();
            $("#update_div_tEND_days").show();
            $("#update_div_invest_start_date").hide();
            $("#update_div_invest_end_date").hide();
        } else if(interestType == 2){
            $("#update_div_tN_type").hide();
            $("#update_div_tN_days").hide();
            $("#update_div_tEND_days").hide();
            $("#update_div_invest_start_date").show();
            $("#update_div_invest_end_date").show();
        }

        $("#pro_update_form")[0].reset();
        $('#modal-update-event').modal({show:true});
        var id = $(this).attr('data-id');
        $.ajax(
            {
                type:"post",
                url: "/product/getUpdate",
                data:{
                    id : id
                },
                dataType : "json",
                success:function(data){
                    if(data.status > 100000){
                        alert(data.content);
                    } else{
                         var product = data.content;
                         var product_name = product.product_name;
                         var product_type_id = product.product_type_id;
                         var yield_rate_year = product.yield_rate_year;
                         var fund_min_val = product.fund_min_val;
                         var guarantee_level  = product.guarantee_level;
                         var upper_limit  = product.upper_limit;
                        var invest_issue_type = product.invest_issue_type;
                        var invest_start_type  = product.invest_start_type;
                        var invest_date_type  = product.invest_date_type;
                        var invest_days = product.invest_days;
                        var earn_days = product.earn_days;
                        var invest_start_date = product.invest_start_date;
                        var invest_end_date = product.invest_end_date;
                        var earn_days_sign = product.earn_days_sign;

                        $('#update_product_name').val(product_name);
                        $('#update_invest_start_type').val(invest_start_type);
                        if(invest_start_type ==1){
                            $('#update_invest_date_type').val(invest_date_type);
                            $('#update_invest_days').val(invest_days);
                            $('#update_earn_days').val(earn_days);
                            $("#update_div_tN_type").show();
                            $("#update_div_tN_days").show();
                            $("#update_div_tEND_days").show();
                            $("#update_div_invest_start_date").hide();
                            $("#update_div_invest_end_date").hide();
                        }else{
                            $('#update_invest_start_date').val(invest_start_date);
                            $('#update_invest_end_date').val(invest_end_date);
                            $("#update_div_tN_type").hide();
                            $("#update_div_tN_days").hide();
                            $("#update_div_tEND_days").hide();
                            $("#update_div_invest_start_date").show();
                            $("#update_div_invest_end_date").show();
                        }
                         $('#id').val(id);
                         $('#update_product_type_id').val(product_type_id);
                         $('#update_yield_rate_year').val(yield_rate_year);
                         $('#update_fund_min_val').val(fund_min_val);
                         $('#update_guarantee_level').val(guarantee_level);
                         $('#update_upper_limit').val(upper_limit);
                         $('#update_earn_days_sign').val(earn_days_sign);
                         $('#update_invest_issue_type').val(invest_issue_type);
                    }
                }
            }
        );
    });

    $(".btn_update").click(function(){
        var data = {

        };
        data.id = $('#id').val();
        data.product_name = $('#update_product_name').val();
        data.product_type_id = $('#update_product_type_id').val();
        data.yield_rate_year = $('#update_yield_rate_year').val();
        data.fund_min_val = $('#update_fund_min_val').val();
        data.guarantee_level = $('#update_guarantee_level').val();
        data.upper_limit = $('#update_upper_limit').val();
        data.invest_issue_type = $('#update_invest_issue_type').val();
        data.earn_days_sign = $('#update_earn_days_sign').val();
        data.invest_start_type = $('#update_invest_start_type').val();
        if(data.invest_start_type == 1){
            data.invest_date_type = $('#update_invest_date_type').val();
            data.invest_days = $('#update_invest_days').val();
            data.earn_days = $('#update_earn_days').val();
            $('#update_invest_start_date').val('');
            $('#update_invest_end_date').val('');
        } else {
            $('#update_invest_date_type').val('');
            $('#update_invest_days').val('');
            $('#update_earn_days').val('');
            data.invest_start_date = $('#update_invest_start_date').val();
            data.invest_end_date = $('#update_invest_end_date').val();
        }

        $.ajax(
            {
                type:"post",
                url: "/product/productUpdate",
                data: data,
                dataType : "json",
                success:function(data){
                    if(data.status > 100000){
                        //alert('修改失败！');
                        alert(data.content);
                    } else{
                        alert('修改成功！');
                        window.location.reload();
                    }
                }
            }
        );
    });

});