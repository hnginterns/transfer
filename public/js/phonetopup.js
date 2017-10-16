$(document).ready(function(){
	//network button toggle
    $('.switch-field>input[type="radio"]').click(function(){
        var inputValue = $(this).val();
        var targetBox = $("." + inputValue);
      	$('#accordion .card .show .network-type').val(inputValue);
        $(".box").hide();
        $(targetBox).show();
    });
    $('.data-bundles input[type="radio"]').click(function(){
        var inputValue = $(this).val();
      $('#accordion .card .show .data-type').val(inputValue);
    });
       $('#accordion  .card').find('.show').parent().find('.card-header').hide();


   $('#accordion  .card .card-header').click(function(){
   			
	   		$('.card-header').show();
	   		$(this).hide();
	   		$(this).parent().css({'border':'2px solid #39689c'});
	   		
	   //get the network type from a benefiary selected eairl
	   		var networkType = $(this).parent().find('.network-type').val();
	   	//get the data type from a beneficiary

	   	if(networkType !=""){
	   		//alert("hi");
	   		var dataType = $(this).parent().find('.data-type').val();
	   //target the network
	   		var targetNetwork = $('#switch_'+networkType);
	   	//target the plan
	   		var targetPlan = $('.data-bundles #switch_'+networkType+'_'+dataType);
	   	//display the selection
	   		 targetNetwork.prop('checked','checked');
	   		targetPlan.prop('checked','checked');
	   		var inputValue = targetNetwork.val();
	   		var targetBox = $("." + inputValue);
	        $(".box").not(targetBox).hide();
	        $(targetBox).show();
	       }else{
	       		$(".box").hide();
	       }
       
   });
