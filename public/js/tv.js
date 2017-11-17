$(function () {
    $.ajax({
        url: '/show_table_match/1',
        success: function(data){
            var timer = 1;
            var sprint = 5 * 1000;
            max = data.length * sprint;
                
            data.forEach(function(element) {
                setTimeout(function() {
                    $.ajax({
                        url: element,
                        success: function(d){
                            $('#main-tv').html(d);
                        }});
                }, timer += sprint);
                console.log("max" + max);
                console.log("timer" + timer);
            }, this);
            setTimeout(function() {
                location.reload();
            }, timer += 100);
        }
    });
});