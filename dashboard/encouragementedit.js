//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var name = $('#'+id).children('td[data-target=name]').text();
	  var encouragement_concern = $('#'+id).children('td[data-target=encouragement_concern]').text();
	  var date_posted = $('#'+id).children('td[data-target=date_posted]').text();

	  $('#name').val(name);
	  $('#encouragement_concern').val(encouragement_concern);
	  $('#date_posted').val(date_posted);
	  $('#prayerId').val(id);
	  $('#myModal').modal('toggle');
	});

	//creating event to get data from fields

	$('#save').click(function(){
	  var id = $('#prayerId').val();
	  var name = $('#name').val();
	  var encouragement_concern = $('#encouragement_concern').val();
	  var date_posted = $('#date_posted').val();
	  $.ajax({
	      url     : 'encouragementedit.php',
	      method  : 'post',
	      data    : {name : name, encouragement_concern : encouragement_concern, date_posted : date_posted, id : id},
	      success : function(data){
	                    alert("Successfully Edited!");
	                    location.href= "encouragement.php";
	                }
	  });
	});
})