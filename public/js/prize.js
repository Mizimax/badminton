function get_lucky_person(){
    $.ajax({
        url: '/get_member_special_rewards/1',
        success: function(data){
            $('#luckyperson_img').attr('src','/images/no_pic.jpg');
            
            var timer = 0;
            while(timer<10000){
                setTimeout(function() {
                    ran = (Math.floor(Math.random() * (data.length - 0)) + 0);
                    $('#luckyperson').html(data[ran].name);
                }, timer += 100);
            }
            setTimeout(function() {
                ran = (Math.floor(Math.random() * (data.length - 0)) + 0);
                $('#luckyperson').html(" !!! " + data[ran].name + " !!!");
                $('#user_id').val(data[ran].special_event_member_id);
                $('#luckyperson_img').attr('src',data[ran].user_profile);
            }, timer += 100);
        }
    });
}