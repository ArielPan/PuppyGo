
  $(function () {  
        //选中filter下的所有a标签，为其添加hover方法，该方法有两个参数，分别是鼠标移上和移开所执行的函数。  
        $("#filter a").hover(  
            function () {  
                $(this).addClass("seling");  
            },  
            function () {  
                $(this).removeClass("seling");  
            }  
        ); 

        $("#filter facility").hover(  
            function () {  
                $(this).addClass("seling");  
            },  
            function () {  
                $(this).removeClass("seling");  
            }  
        );  
  
  
        //选中filter下所有的dt标签，并且为dt标签后面的第一个dd标签下的a标签添加样式seled。  
       // $("#filter dt+dd a").attr("class", "seled"); /*注意：这儿应该是设置(attr)样式，而不是添加样式(addClass)， 
                                                     // 不然后面通过$("#filter a[class='seled']")访问不到class样式为seled的a标签。*/         
  
        //为filter下的所有a标签添加单击事件  
        $("#filter a").click(function () {  
          $(this).parents("dl").children("dd").each(function () {  
                //下面三种方式效果相同（第三种写法的内部就是调用了find()函数，所以，第二、三种方法是等价的。）  
                //$(this).children("div").children("a").removeClass("seled");  
                //$(this).find("a").removeClass("seled");  
               $('a',this).removeClass("seled");  
            });  
  
            $(this).attr("class", "seled");  
  
           
        });  
        //alert(RetSelecteds()); //返回选中结果  
      //  $("#filter dt+dd b").attr("class", "seled");
       // $("#filter c").click(function(){
           // $(this).parents("dl").children("dd").each(function(){
              //  $('b',this).removeClass("seled");
               // $(this).find("b").addClass("seled");
              //if(('b',this).)
          //  });
           //  $(this).attr("class","seled"); 
       // });
        $("#GO").click(function(){
       
        RetSelecteds(); //发送选中结果  
     
    });   
        });
       
  
    function RetSelecteds() {  
        var result = "";   
       
        $("#filter a[class='seled']").each(function () {  
          result += $(this).html()+",";
        });
        window.location.href = "selectList.php?w1="+result;
//        window.location.href = "test.php?w1="+result;
    }  




