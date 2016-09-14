var overall = 0;
var clean = 0;
var facility = 0;
var safety = 0;
var beachView = 0;
var bid;
$(function(){
     $('#star').raty({
        half: false,
        number:5,
        size:36,
        target: '#hint',
        targetKeep: true,
        score: function() {
          return $(this).attr('data-number');
        }
      });
     $('.overallStar').raty({
	half  : false,
        number: 5,
        score : 0,
        target: '#hint',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get id value and store in variable pid				
		bid=$(this).prop('id');
                overall = score;
            }    
     });
     $('.cleanStar').raty({
	half  : false,
        number: 5,
        score : 0,
        target: '#hint',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get id value and store in variable pid				
		clean = score;
          }
     });
     $('.facilityStar').raty({
	half  : false,
        number: 5,
        score : 0,
        target: '#hint',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get id value and store in variable pid				
		facility = score;
          }
     });
     $('.safetyStar').raty({
	half  : false,
        number: 5,
        score : 0,
        target: '#hint',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get id value and store in variable pid				
		safety = score;
          }
     });
     $('.beachViewStar').raty({
	half  : false,
        target: '#hint',
        targetKeep: true,
        number: 5,
        size: 36,
//        score : 0,
        click: function(score, evt) {
//Below will get id value and store in variable pid				
		beachView = score;
          }
     });
     $('#btnSubmit').click(function(){
         if(overall === 0){
             alert("You must rate the beach first!");
         }
         else{
             $.post('storeRate.php',{bid:bid, overall:overall, clean:clean, facility:facility, safety:safety, beachView:beachView},
                    function(data){    
                        alert(data);
         });
         } 
     });
});



