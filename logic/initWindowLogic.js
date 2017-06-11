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
			$('#verifyText').val(JSON.parse(data));
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

$(document).on('click', '#verComentarios', function(){ 

	$("#modalHeader").empty();
	$("tr[id=fila]").remove();
	
    var driverUsername = $(this).attr('driver');
    var driverName = $(this).attr('driverName');


    var html2 = '<h4 class="modal-title">Comentarios de '+driverName+'</h4>';
    $(html2).appendTo("#modalHeader");

    var formData = {

			'userLog'    : driverUsername,
		};



		$.ajax({
			type        : 'GET', 
			url         : '../operations/getScoreAverage.php', //archivo que procesa los datos del user
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var ScoreAverage = data.score;

			getDriverInfo(driverUsername,ScoreAverage);
			getComments(driverUsername);
		});
});

function getDriverInfo(driverUsername,ScoreAverage){

	var formData = {
			'username'    : driverUsername,
	};
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getPassengersInfo.php', //archivo que procesa los datos del user
		data        : formData, 
		dataType    : 'json', 
		encode          : true
	}).done(function(data) {
		var name = data[0].name;
		var phone = data[0].phone;
		var email = data[0].email;
		var photo = data[0].photo;
		row = $('<tr id="fila"><th><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/></th><th>'+name+'</th><th>'+email+'</th><th>'+phone+'</th><th>'+ScoreAverage+'</th></tr>'); //create row
		$('#tab_infoDriver').append(row);
	});

}

function getComments(driverUsername){
	var comments = [];
	var formData = {
			'driverUsername'    : driverUsername,
	};
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getCommentsAndScore.php', //archivo que procesa los datos del user
		data        : formData, 
		dataType    : 'json', 
		encode          : true
	}).done(function(data) {
		data.forEach((data) => {
			comments.push(data);
		});


		for (var i=comments.length-1; i>(comments.length-1)-5; i--){
			//console.log(comments[i].comment);
			var comment = comments[i].comment;
			var score = comments[i].score;

			row = $('<tr id="fila"><th>'+comment+'</th><th>'+score+'</th></tr>'); //create row
			$('#tab_comentarios').append(row);
		}
		
	});

}

$(document).on('click', '#verPasajeros', function(){ 

	$("#modalHeader2").empty();
	$("tr[id=fila]").remove();
	
    var tripID = $(this).attr('tripID');
	var passengers = [];
	
    var html2 = '<h4 class="modal-title">Pasajeros del viaje</h4>';
    $(html2).appendTo("#modalHeader2");
	
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getPassengersTrip.php', //archivo que procesa los datos del user
	data        : {'tripID':tripID}, 
		dataType    : 'json', 
		encode          : true
	}).done(function(data) {
		data.forEach((data) => {
			passengers.push(data);
		});


		for (var i=0; i < passengers.length; i++){

			var photo = passengers[i].photo;
			var name = passengers[i].name;

			row = $('<tr id="fila"><th><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/></th><th>'+name+'</th></tr>'); //create row
			$('#tab_infoPassenger').append(row);
		}
		
	});

});
