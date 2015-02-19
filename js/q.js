
$(document).ready(function(){

        $(window).resize(function (){
            $('.center').css({
                position:'absolute',
                left: ($(window).width() - $('.center').outerWidth())/2,
                top: ($(window).height() - $('.center').outerHeight())/2
            });
        });

        $(window).resize();

        load_php()

    }
);
/*
$('[data-spy="scroll"]').each(function () {
    var $spy = $(this).scrollspy('refresh')
});*/
/*$(function() {
    $('#loading').css({
        'position' : 'absolute',
        'left' : '50%',
        'top' : '50%',
        'margin-left' : -$(this).width()/2,
        'margin-top' : -$(this).height()/2
    });
});*/
function load_php(){
    //alert("clicked! ID = x");

    var value = $("#itemSearch").val();
    console.log(value);
    //animation();



    $.ajax({
        url:"../php/load.php",
        type:"get",
        dataType:"json",
        data:{item:value},
        beforeSend:function(){
            $(".container-fluid").hide();
            $("#loading").show();
            loading();


        },
        error:function(jqXHR, textStatus, errorThrown){

          alert("fail!");
            console.log(textStatus,errorThrown);
        },
        success:function(result){
            console.log("complete");
            console.log("successful!");
            console.log(result);
            insert_jd_data(result['jd']);
            insert_amazon_data(result['amazon']);
            //insert_yhd_data(result['yhd']);
            insert_suning_data(result['suning']);
            reset_loading();
            $(".container-fluid").show();
            //return result;
        },
        complete:function(){







        }
    })
}




/*function animation(){
    //alert("a");
    //$("div[class = 'col-xs-10 col-xs-offset-1']").removeClass().addClass("col-sm-6");
    $("div[class = 'container-fluid']").css("margin-top","20px");
    //$("div[class = 'row col-sm-12']").removeClass().addClass("row col-sm-12 col-sm-offset-1");



}*/



function insert_jd_data(data){
    //alert("insert data!");
    for(var i = 0;i<data.length;i++){
        var append_html = "<div class='col-xs-12'><div class='thumbnail'><a href='"+"http://item.jd.com/"+data[i].id+".html' target = '_blank'> <img src='"+data[i].img+"'><div class='caption'><h5>"+data[i].price+"</h5><p>"+data[i].name+"</p></div></a></div></div>"
        //console.log(append_html);
        $("#jd_panel .panel-body").append(append_html);
    }
}

function insert_amazon_data(data){
    //alert("insert data!");
    for(var i = 0;i<data.length;i++){
        var append_html = "<div class='col-xs-12'><div class='thumbnail'><a href='http://www.amazon.cn/dp/"+data[i].id+"' target = '_blank'> <img src='"+data[i].img+"'><div class='caption'><h5>"+data[i].price+"</h5><p>"+data[i].name+"</p></div></a></div></div>"
        //console.log(append_html);
        $("#amazon_panel .panel-body").append(append_html);
    }
}

function insert_yhd_data(data){
    //alert("insert data!");
    for(var i = 0;i<data.length;i++){
        var append_html = "<div class='col-xs-12'><div class='thumbnail'><a href='http://item.yhd.com/item/"+data[i].id+"' target = '_blank'> <img src='"+data[i].img+"'><div class='caption'><h5>"+data[i].price+"</h5><p>"+data[i].name+"</p></div></a></div></div>"
        //console.log(append_html);
        $("#yhd_panel .panel-body").append(append_html);
    }
}


function insert_suning_data(data){
    //alert("insert data!");
    for(var i = 0;i<data.length;i++){
        var append_html = "<div class='col-xs-12'><div class='thumbnail'><a href='http://product.suning.com/"+data[i].id+".html' target = '_blank'> <img src='"+data[i].img+"'><div class='caption'><h5><img src='"+data[i].price+"'></h5><p>"+data[i].name+"</p></div></a></div></div>"
        //console.log(append_html);
        $("#suning_panel .panel-body").append(append_html);
    }
}


//<!--http://www.amazon.cn/s/ref=sr_nr_p_6_0?rh=p_6%3AA1AJ19PSB66TGU&keywords=%E7%BD%97%E6%B0%8F%E8%A1%80%E7%B3%96%E4%BB%AA-->
function reset_loading(){
    $("#loading").hide();
    $(".progress-bar").text("").width(0);


}
function loading(){

    $("#loading").show();


    var interval = setInterval(function(){
            var full = $(".progress").width();
            var width = $(".progress-bar").width();
            var percent = full/100;
            if( width <= full)
            {
                $(".progress-bar").width(width+percent*10);

                $(".progress-bar").text(parseInt(width/full*100+0.5,10)+"%");

            }else{
                clearInterval(interval);
            }

        }, 50);



}