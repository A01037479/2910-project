// Load more content as you scoll

$(document).ready(function(){
    $(window).scroll(function(){
        var lastID = $('#loaded').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'load_process2.php',
                data:{id: lastID},
                beforeSend:function(){
                    $('.load-more').show().delay(800);
                },
                success:function(data){
                    $('.load-more').fadeOut(2000);
                    $('.item-content').append(data);
                    lastId = newid;
                }
            });
        }
    });
});
