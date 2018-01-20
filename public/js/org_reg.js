$(document).ready(function() {
     $('input[type="file"]').change(function (){
       var fileName = $(this)[0].files[0].name;
       var id = $(this).attr('id');
       var box = $(this).parent().parent();
       var parent = $(this).parent().next();
       var icon = parent.children().eq(0);
       var text = parent.children().eq(1);
       var success = parent.children().eq(2);
       var progress = parent.next();
       var formData = new FormData();
       var imageType = /image.*/;
       var file = $(this)[0].files[0];

      if (!file.type.match(imageType)) {
        alert('Image only !');
        return;
      }

       formData.append('image', file);
       icon.hide();
       progress.show();
       text.show();
       success.removeClass('show');
       success.hide();
       text.html(fileName);
       $.ajax({
          xhr: function() {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
                progress.children().eq(0).css('width', percentComplete);

              }
            }, false);

            return xhr;
          },
          url: '/org/register/step/verify/upload?name='+id,
          type: "POST",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(result) {
            progress.children().eq(0).css('width', '0');
            box.css('background-image', 'url('+ result.image +')');
            success.show();
            progress.hide();
            text.hide();
          },
          error: function(error){
            alert('upload failed.');
            progress.children().eq(0).css('width', '0');
            icon.show();
            progress.hide();
            text.hide();
          }
        });

     });
})