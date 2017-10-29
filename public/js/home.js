function set_event(event_id){
    myUrl='/event_modal/'+event_id;
    $.ajax({
        type: 'GET',
        url: myUrl,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        success: function (response) {
            $('#register_event_modal').html(response);
        }
    });
}

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
    team_phone = $('#team_phone').val();
    team_phone.replace("-","");
    if(team_phone.length > 10 || team_phone.length < 9){
        alert('กรุณาตรวจสอบหมายเลขโทรศัพท์ของผู้จัดการทีม');
        $('#team_phone').focus();
        return false;
    }
    for(i = 1; i<=number_of_team; i++){
        if (!$("input[name='gender"+i+"']:checked").val()) {
            alert('กรุณาเลือกเพศของนักกีฬาคนที่'+i);
            $("#button_male"+i).focus();
            return false;
        }
        // console.log($("input[name='gender"+i+"']:checked").val());
        phone = $('#phone'+i).val();
        phone.replace("-","");
        if(phone.length > 10 || phone.length < 9){
            alert('กรุณาตรวจสอบหมายเลขโทรศัพท์ของนักกีฬาคนที่'+i);
            $('#phone'+i).focus();
            return false;
        }
        if($('#pic'+i).val()){
            var ext = $('#pic'+i).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
                alert('กรุณาใส่ภาพ .png, .jpg, .jpeg เท่านั้น');
                $('#pic'+i).focus();
                return false;
            }
        }
        
    }
    
    return true;
}