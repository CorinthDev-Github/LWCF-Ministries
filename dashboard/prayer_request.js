
    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"fetch_prayerrequest.php",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {
        $('#menuPrayer').html(data.notification);
        if(data.unseen_notification > 0)
        {
         $('#countingPrayer').html(data.unseen_notification);
        }
       }
      });
     }
     
     load_unseen_notification();
     
     $('#formPrayer').on('submit', function(event){
      event.preventDefault();
      if($('#name').val() != '' && $('#prayer_concern').val() != '' && $('#posted_by').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert_prayerrequest.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         alert("POST CREATED SUCCESSFULLY!");
         window.location.href = 'prayer_request.php';
         $('#formPrayer')[0].reset();
         load_unseen_notification();
        }
       });
      }
      else
      {
       alert("Both Fields are Required");
      }
     });
     
     $(document).on('click', '#notificationDropdownprayer', function(){
      $('#countingPrayer').html('');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification();; 
     }, 5000);
     
    });