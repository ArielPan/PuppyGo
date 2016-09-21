$(document).ready(function () {
    $("input[name='suburb']").change(function () {
        var maxAllowed = 1;
        var cnt = $("input[name='suburb']:checked").length;
        if (cnt > maxAllowed)
        {
            $(this).prop("checked", "");
            alert('Select maximum ' + maxAllowed + ' suburb!');
        }
    });
    $("input[name='sport']").change(function () {
        var maxAllowed = 3;
        var cnt = $("input[name='sport']:checked").length;
        if (cnt > maxAllowed)
        {
            $(this).prop("checked", "");
            alert('Select maximum ' + maxAllowed + ' sports!');
        }
    });
    function test() {
        var inputs = "";
        var cboxes = document.getElementsByName('suburb');
        var len = cboxes.length;
        for (var i = 0; i < len; i++) {
            if (cboxes[i].checked){
                inputs+= cboxes[i].value;
            }
        }
        if(inputs!=""){
        inputs = inputs+",";}
        var cboxes1 =document.getElementsByName('facility');
        var len1 = cboxes1.length;
        for (var i = 0; i < len1; i++) {
            if (cboxes1[i].checked){
                inputs+= (cboxes1[i].value+",");
            }
        }
        var cboxes2 =document.getElementsByName('sport');
        var len2 = cboxes2.length;
        for (var i = 0; i < len2; i++) {
            if (cboxes2[i].checked){
                inputs+= (cboxes2[i].value+",");
            }
        }
        window.location.href = "selectList.php?w1=" + inputs;
    }

    $("#GO").click(function () {

        test();
        
        

    });
});