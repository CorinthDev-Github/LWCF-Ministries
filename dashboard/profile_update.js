//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var fullname = $('#'+id).children('td[data-target=fullname]').text();
	  var age = $('#'+id).children('td[data-target=age]').text();
	  var birthday = $('#'+id).children('td[data-target=birthday]').text();
	  var email = $('#'+id).children('td[data-target=email]').text();
	  var tof = $('#'+id).children('td[data-target=tof]').text();

	  $('#fullname').val(fullname);
	  $('#age').val(age);
	  $('#birthday').val(birthday);
	  $('#email').val(email);
	  $('#tof').val(tof);
	  $('#profileId').val(id);
	  $('#myModal').modal('toggle');
	});

	//creating event to get data from fields

	$('#save').click(function(){
	  var id = $('#profileId').val();
	  var fullname = $('#fullname').val();
	  var age = $('#age').val();
	  var birthday = $('#birthday').val();
	  var email = $('#email').val();
	  var tof = $('#tof').val();
	  $.ajax({
	      url     : 'profile_edit.php',
	      method  : 'post',
	      data    : {fullname : fullname, age : age, birthday : birthday, email : email, tof : tof, id : id},
	      success : function(data){
	                    alert("Successfully Edited!");
	                    location.href= "profile.php";
	                }
	  });
	});
})