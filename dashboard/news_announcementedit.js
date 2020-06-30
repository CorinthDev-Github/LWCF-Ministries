//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var title = $('#'+id).children('td[data-target=title]').text();
	  var description = $('#'+id).children('td[data-target=description]').text();
	  var date_posted = $('#'+id).children('td[data-target=date_posted]').text();

	  $('#title').val(title);
	  $('#description').val(description);
	  $('#date_posted').val(date_posted);
	  $('#newsId').val(id);
	  $('#myModal').modal('toggle');
	});

	//creating event to get data from fields

	$('#save').click(function(){
	  var id = $('#newsId').val();
	  var title = $('#title').val();
	  var description = $('#description').val();
	  var date_posted = $('#date_posted').val();
	  $.ajax({
	      url     : 'news_announcementedit.php',
	      method  : 'post',
	      data    : {title : title, description : description, date_posted : date_posted, id : id},
	      success : function(data){
	                    alert("Successfully Edited!");
	                    location.href= "news_announcement.php";
	                }
	  });
	});
})