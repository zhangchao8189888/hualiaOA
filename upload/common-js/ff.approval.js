/**
 * Created by zhangchao8189888 on 15-4-17.
 */
$(function(){
    $(".approval").click(function(){
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");
        $.ajax(
            {
                type: "post",
                url: GLOBAL_CF.DOMAIN+"/approval/updateStatus",
                data: {
                    id:id,
                    status: status
                },
                dataType: "json",
                success: function(data){

                    if (data.status > 100000) {

                        alert('操作失败！');
                    } else {
                        alert('操作成功！');
                        window.location.reload();
                    }
                }
            }
        );
    });

});