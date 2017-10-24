function selected_sex(sex, order){
    $('#radio_'+sex+order).prop('checked', true);
    switch(sex){
        case 'male':
            $('#button_female'+order).removeClass('btn-danger');
            $('#button_male'+order).addClass('btn-danger');
            $('#button_female'+order).addClass('btn-default');
            $('#button_male'+order).removeClass('btn-default');
            break;
        case 'female':
            $('#button_female'+order).addClass('btn-danger');
            $('#button_male'+order).removeClass('btn-danger');
            $('#button_female'+order).removeClass('btn-default');
            $('#button_male'+order).addClass('btn-default');
            break;
    }
}

function createTeamName(){
    team = $('#first_name1').val();
    team += " " + $('#last_name1').val();
    team += " (" + $('#nickname1').val() + ")";
    $('#team_name').val(team);
}

function check_gender(number_of_team){
    number_of_team = $('#number_of_team').val();
    rank = 1;
    for(i = 1; i<=number_of_team; i++){
        if (!$("input[name='gender"+i+"']:checked").val()) {
            alert('กรุณาเลือกเพศของนักกีฬาคนที่'+i);
            $("#button_male"+i).focus()
            return false;
        }
        // console.log($("input[name='gender"+i+"']:checked").val());
        phone = $('#phone'+i).val();
        phone.replace("-","");
        if(phone.length > 10 || phone.length < 9){
            alert('กรุณาตรวจสอบหมายเลขโทรศัพท์ของนักกีฬาคนที่'+i);
            $('#phone'+i).focus()
            return false;
        }
        if($('#pic'+i).val()){
            var ext = $('#pic'+i).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
                alert('กรุณาใส่ภาพ .png, .jpg, .jpeg เท่านั้น');
                $('#pic'+i).focus()
                return false;
            }
        }
        
    }
    
    return true;
}

function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
}

function testAjax(data,callback) {
    $.ajax({
        url:'/check_team_name',
        type: 'POST',
        data:data
    }).done(function(data){
        can_create = JSON.parse(data).can_create;
        $('#team_ok').prop('checked', can_create); 
        callback();
    });
}


function clicktab(tab){
    switch(tab){
        case 'detail_tab':
                $('#detail_tab').addClass('active');
                $('#member_tab').removeClass('active');
                $('#math_tab').removeClass('active');
                $('#picture_tab').removeClass('active');
                $('#detail_tab2').addClass('active');
                $('#member_tab2').removeClass('active');
                $('#math_tab2').removeClass('active');
                $('#picture_tab2').removeClass('active');
                break;
        case 'member_tab':
                $('#detail_tab').removeClass('active');
                $('#member_tab').addClass('active');
                $('#math_tab').removeClass('active');
                $('#picture_tab').removeClass('active');
                $('#detail_tab2').removeClass('active');
                $('#member_tab2').addClass('active');
                $('#math_tab2').removeClass('active');
                $('#picture_tab2').removeClass('active');
                break;
        case 'math_tab':
                $('#detail_tab').removeClass('active');
                $('#member_tab').removeClass('active');
                $('#math_tab').addClass('active');
                $('#picture_tab').removeClass('active');
                $('#detail_tab2').removeClass('active');
                $('#member_tab2').removeClass('active');
                $('#math_tab2').addClass('active');
                $('#picture_tab2').removeClass('active');
                break;

        case 'picture_tab':
                $('#detail_tab').removeClass('active');
                $('#member_tab').removeClass('active');
                $('#math_tab').removeClass('active');
                $('#picture_tab').addClass('active');
                $('#detail_tab2').removeClass('active');
                $('#member_tab2').removeClass('active');
                $('#math_tab2').removeClass('active');
                $('#picture_tab2').addClass('active');
                break;

    }

}

$(function () {
    $('#table-member').DataTable({
          "pageLength": 20,
          "bLengthChange": false,
          "searching": true
    });
    $('[data-toggle="tooltip"]').tooltip();  
});

  
