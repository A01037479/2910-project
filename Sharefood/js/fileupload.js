
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
      contentType: false,
      processData: false,
      success: function(response){
        $("#tempdiv").css("display", "none");
        $('#img').attr("src", response);
        $('#imgpath').attr("value", response);
        $('#img').attr("height", "100px");
      }
  
    });
  
    
});