$(function () {
    $.ajax({
        url: '/show_table_match/1',
        success: function(data){
            var timer = 0;
            var sprint = 5 * 1000;
            data.forEach(function(element) {
                setTimeout(function() {
                    $.ajax({
                        url: element,
                        success: function(d){
                            // console.log(d);
                            $('#main-tv').html(d);
                        }});
                }, timer += sprint);
            }, this);
            // while(timer<10000){
            //     setTimeout(function() {
            //         ran = (Math.floor(Math.random() * (data.length - 0)) + 0);
            //         $('#luckyperson').html(data[ran].name);
            //     }, timer += 100);
            // }
            // setTimeout(function() {
            //     ran = (Math.floor(Math.random() * (data.length - 0)) + 0);
            //     $('#luckyperson').html(" !!! " + data[ran].name + " !!!");
            //     $('#user_id').val(data[ran].special_event_member_id);
            //     $('#luckyperson_img').attr('src',data[ran].user_profile);
            // }, timer += 100);
        }
    });
});