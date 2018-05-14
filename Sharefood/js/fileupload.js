
$('#uploadbox').click(function() {
    $("#image").val("");
    $('#image').trigger('click');
});
    
$('#image').change(function(e) {
    var file = e.target.files[0];
    var fd = new FormData();
    fd.append('file', file);
    $.ajax({
      url: 'photo_process.php',
      dataType: "json",
      type: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
    
      xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        $('progress').attr({
                            value: e.loaded * 0.9,
                            max: e.total,
                        });
                    }
                } , false);
            }
            return myXhr;
        },
      success: function(response){
        $("#tempdiv").css("display", "none");
        $('#img').attr("src", response);
        $('#imgpath').attr("value", response);
        $('#img').attr("height", "100px");
        $('progress').attr({
          value: 1,
          max: 1
        });
      }
  
    });
  
    
});