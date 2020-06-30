//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var fullname = $('#'+id).children('td[data-target=fullname]').text();
	  var age = $('#'+id).children('td[data-target=age]').text();
	  var birthday = $('#'+id).children('td[data-target=birthday]').text();
	  var email = $('#'+id).children('td[data-target=email]').text();
	  var username = $('#'+id).children('td[data-target=username]').text();

	  $('#fullname').val(fullname);
	  $('#age').val(age);
	  $('#birthday').val(birthday);
	  $('#email').val(email);
	  $('#username').val(username);
	  $('#userId').val(id);
	  $('#myModal').modal('toggle');
	});
})