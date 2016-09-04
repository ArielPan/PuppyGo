
  $(function () {    
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

        $("#filter a").click(function () {  
          $(this).parents("dl").children("dd").each(function () {  
                 
               $('a',this).removeClass("seled");  
            });  
  
            $(this).attr("class", "seled");  
  
           
        });  
       
        $("#GO").click(function(){
       
        RetSelecteds();   
     
    });   
        });
       
  
    function RetSelecteds() {  
        var result = "";   
        $("#filter a[class='seled']").each(function () {  
          result += $(this).html()+",";
        });
        window.location.href = "selectList.php?w1="+result;
    }  




