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
                url: GLOBAL_CF.DOMAIN+"/product/productDelete",
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
        data.business_id = $('#business_id').val();
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

        $("#pro_update_form")[0].reset();
        $('#modal-update-event').modal({show:true});
        var id = $(this).attr('data-id');
        $.ajax(
            {
                type:"post",
                url: GLOBAL_CF.DOMAIN+"/product/getUpdate",
                data:{
                    id : id
                },
                dataType : "json",
                success:function(data){
                    if(data.status > 100000){
                        alert(data.content);
                    } else{
                         var product = data.content;
                        $('#id').val(id);
                        $('#product_name_up').val(product.name);
                        $('#star_up').val(product.star);
                        $('#loan_type_up').val(product.loan_type);
                        $('#mortgage_type_up').val(product.mortgage_type);
                        $('#money_least_up').val(product.money_least);
                        $('#money_max_up').val(product.money_max);
                        $('#period_least_up').val(product.period_least);
                        $('#period_max_up').val(product.period_max);
                        $('#month_rate_type_up').val(product.month_rate_type);
                        $('#month_rate_least_up').val(product.month_rate_least);
                        $('#month_rate_max_up').val(product.month_rate_max);
                        $('#service_cost_up').val(product.service_cost);
                        $('#lend_day_up').val(product.lend_day);
                        $('#apply_condition_up').val(product.apply_condition);
                        $('#need_info_up').val(product.need_info);
                    }
                }
            }
        );
    });

    $(".btn_update").click(function(){
        var data = {

        };
        data.id = $('#id').val();
        data.product_name = $('#product_name_up').val();
        data.star = $('#star_up').val();
        data.loan_type = $('#loan_type_up').val();
        data.mortgage_type = $('#mortgage_type_up').val();
        data.money_least = $('#money_least_up').val();
        data.money_max = $('#money_max_up').val();
        data.period_least = $('#period_least_up').val();
        data.period_max = $('#period_max_up').val();
        data.month_rate_type = $('#month_rate_type_up').val();
        data.month_rate_least = $('#month_rate_least_up').val();
        data.month_rate_max = $('#month_rate_max_up').val();
        data.service_cost = $('#service_cost_up').val();
        data.lend_day = $('#lend_day_up').val();
        data.apply_condition = $('#apply_condition_up').val();
        data.need_info = $('#need_info_up').val();

        $.ajax(
            {
                type:"post",
                url: GLOBAL_CF.DOMAIN+"/product/productUpdate",
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