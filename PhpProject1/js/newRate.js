var overall = 0;
var clean = 0;
var facility = 0;
var safety = 0;
var beachView = 0;
var bid;
$(function(){
//    show the average rate
     $('.star').raty({
        half: false,
        readOnly : true,
        number:5,
        size:56,
        score: function() {
          return $(this).attr('data-number');
        }
      });
//      allow rate the overall condition of the beach
     $('.overallStar').raty({
	half  : false,
        number: 5,
        target: '#hint1',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get id value and store in variable bid				
		bid=$(this).prop('id');
//Below will get score value and store in variable overall               
                overall = score;
            }    
     });
//      allow rate the cleanliness condition of the beach
     $('.cleanStar').raty({
	half  : false,
        number: 5,
        target: '#hint2',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get score value and store in variable clean				
		clean = score;
          }
     });
//     allow rate the facility condition of the beach
     $('.facilityStar').raty({
	half  : false,
        number: 5,
        target: '#hint3',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get score value and store in variable facility				
		facility = score;
          }
     });
//     allow rate the safety condition of the beach
     $('.safetyStar').raty({
	half  : false,
        number: 5,
        target: '#hint4',
        targetKeep: true,
        size: 36,
        click: function(score, evt) {
//Below will get score value and store in variable safety				
		safety = score;
          }
     });
//     allow rate the beach view of the beach
     $('.beachViewStar').raty({
	half  : false,
        target: '#hint5',
        targetKeep: true,
        number: 5,
        size: 36,
        click: function(score, evt) {
//Below will get score value and store in variable beachView				
		beachView = score;
          }
     });
     // submit the rate 
     $('#btnSubmit').click(function(){
         // must rate overall condition of the beach before submit
         if(overall === 0){
             alert("You must rate the beach first!");
         }
         else{
             // post the score of rate to php file
             $.post('storeRate.php',{bid:bid, overall:overall, clean:clean, facility:facility, safety:safety, beachView:beachView},
                    function(data){  
                        //return the rate successful or not 
                        alert(data);
         });
         } 
     });
});



