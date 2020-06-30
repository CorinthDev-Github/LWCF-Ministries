
    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"fetch_encrequest.php",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {
        $('#menuEnc').html(data.notification);
        if(data.unseen_notification > 0)
        {
         $('#countingEnc').html(data.unseen_notification);
        }
       }
      });
     }
     
     load_unseen_notification();
     
     $('#formEncouragement').on('submit', function(event){
      event.preventDefault();
      if($('#name').val() != '' && $('#encouragement_concern').val() != '' && $('#posted_by').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert_encrequest.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         alert("POST CREATED SUCCESSFULLY!");
         window.location.href = 'encouragement.php';
         $('#formEncouragement')[0].reset();
         load_unseen_notification();
        }
       });
      }
      else
      {
       alert("Both Fields are Required");
      }
     });
     
     $(document).on('click', '#notificationDropdownenc', function(){
      $('#countingEnc').html('');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification();; 
     }, 5000);
     
    });