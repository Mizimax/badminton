$(document).ready(function() {
    $('input[type="file"]').change(function (){
      var fileName = $(this)[0].files[0].name;
      var name = $(this).attr('name');
      var bg = $(this).parent();
      var plus = bg.next();
      var input = bg.prev().children(':first');

      var formData = new FormData();
      var imageType = /image.*/;
      var file = $(this)[0].files[0];

      if (!file.type.match(imageType)) {
        alert('Image only !');
        return;
      }
      formData.append('image', file);

      $.ajax({
         url: '/event/create/upload?name='+name,
         type: "POST",
         data: formData,
         cache: false,
         contentType: false,
         processData: false,
         success: function(result) {
            input.val(result.image);
            bg.css('opacity', 1);
            bg.css('background-image', 'url('+ result.image +')');
            plus.remove();
         },
         error: function(error){
           alert('upload failed.');
         }
       });

    });
})