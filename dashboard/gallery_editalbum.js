//for update JS
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
	  var id = $(this).data('id');
	  var album_name = $('#'+id).children('td[data-target=album_name]').text();

	  $('#album_name').val(album_name);
	  $('#galleryId').val(id);
	  $('#myModal').modal('toggle');
	});

	//creating event to get data from fields

	$('#save').click(function(){
	  var id = $('#galleryId').val();
	  var album_name = $('#album_name').val();
	  $.ajax({
	      url     : 'gallery_editalbum.php',
	      method  : 'post',
	      data    : {album_name : album_name, id : id},
	      success : function(data){
	                    alert("Successfully Change Album!");
	                    location.href= "gallery.php";
	                }
	  });
	});
})