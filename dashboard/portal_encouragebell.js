
    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"fetch.php",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {
        $('#menus').html(data.notification);
        if(data.unseen_notification > 0)
        {
         $('#counting').html(data.unseen_notification);
        }
       }
      });
     }
     
     load_unseen_notification();
     
     $('#comment_form').on('submit', function(event){
      event.preventDefault();
      if($('#subject').val() != '' && $('#comment').val() != '' && $('#name_enc').val() != '' && $('#concern_enc').val() != '' && $('#type_concern').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         $('#comment_form')[0].reset();
         load_unseen_notification();
        }
       });
      }
      else
      {
       alert("Both Fields are Required");
      }
     });
     
     $(document).on('click', '#notificationDropdown', function(){
      $('#counting').html('');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification();; 
     }, 5000);
     
    });