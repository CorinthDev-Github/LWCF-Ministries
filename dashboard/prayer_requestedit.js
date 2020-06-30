//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var name = $('#'+id).children('td[data-target=name]').text();
	  var prayer_concern = $('#'+id).children('td[data-target=prayer_concern]').text();
	  var date_posted = $('#'+id).children('td[data-target=date_posted]').text();

	  $('#name').val(name);
	  $('#prayer_concern').val(prayer_concern);
	  $('#date_posted').val(date_posted);
	  $('#prayerId').val(id);
	  $('#myModal').modal('toggle');
	});

	//creating event to get data from fields

	$('#save').click(function(){
	  var id = $('#prayerId').val();
	  var name = $('#name').val();
	  var prayer_concern = $('#prayer_concern').val();
	  var date_posted = $('#date_posted').val();
	  $.ajax({
	      url     : 'prayer_requestedit.php',
	      method  : 'post',
	      data    : {name : name, prayer_concern : prayer_concern, date_posted : date_posted, id : id},
	      success : function(data){
	                    alert("Successfully Edited!");
	                    location.href= "prayer_request.php";
	                }
	  });
	});
})