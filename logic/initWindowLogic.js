$(document).ready(function($) {
	$(".form-container").hide();
	$(".login-container").hide();
	$(".register-container").hide();

	$("#iconButton").click(function(){
		$(".register-container").slideUp("fast");
		$(".login-container").slideUp("fast");
	});

	$(".login-button").click(function(event) {
		if ($(".login-container").is(":hidden")){
			$(".login-container").slideDown("fast");
			$(".register-container").slideUp("fast");
		}else{
			$(".login-container").slideUp("fast");
		}
	});

	$(".register-button").click(function(event) {
		if ($(".register-container").is(":hidden")){
			$(".register-container").slideDown("fast");
			$(".login-container").slideUp("fast");
		}else{
			$(".register-container").slideUp("fast");
		}
	});

	$("#verifyBtn").click(function(){
		$.get("../operations/verificationNumber.php", function(data) {
			$('#verifyText').val(data);
    	});
	});

	$('.input-group').datepicker({
	    format: "dd/mm/yyyy",
	    todayBtn: "linked",
	    language: "es",
	    daysOfWeekHighlighted: "0,6",
	    autoclose: true,
	    todayHighlight: true
	});

	

});