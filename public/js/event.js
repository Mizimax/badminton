var bg = $('.cover2[image-bg]');
var url = bg.attr('image-bg');

document.styleSheets[0].addRule('.cover2:before','background-image: url("'+url+'");');

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

function clickminitab(tab){
    switch(tab){
        case 'group':
            $('#group_tab').addClass('active');
            $('#knockout_tab').removeClass('active');
            $('#knockout').removeClass('active');
            setTimeout(function(){
                $('#knockout').css('display', 'none');
                $('#group').css('display', 'block');
                $('#group').addClass('active');
            }, 100);
            break;
        case 'knockout':
            $('#knockout_tab').addClass('active');
            $('#group_tab').removeClass('active');
            $('#group').removeClass('active');
            setTimeout(function(){
                $('#group').css('display', 'none');
                $('#knockout').css('display', 'block');
                $('#knockout').addClass('active');
            }, 100);
            break;
    }
}

function fnCreateSelect( aData )
{
    var r='<select><option value=""></option>', i, iLen=aData.length;
    for ( i=0 ; i<iLen ; i++ )
    {
        r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
    }
    return r+'</select>';
}




$(document).ready(function(){
    
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            
            var age =  data[3]; // use data for the age column
            var rex = /(<([^>]+)>)/ig;
            race_id = $( "#selector_rank option:checked" ).val();
            console.log();
            if(race_id == ""){
                return true;
            }
            if(data[3].replace(/<a.*>.*?<\/a>/ig,'').trim() == race_id){
                return true;
            }
            if(data[4].replace(/<a.*>.*?<\/a>/ig,'').trim() == race_id){
                return true;
            }
            return false;
        }
    );

    var tb_member = $('#table-member').DataTable({
          pageLength: -1,
          bLengthChange: false,
        //   searching: false,
          bSort:false,
          sDom: 't' 
    });

    $('#selector_rank').on('change', function () {
        console.log($(this).val());
        
        tb_member.search($(this).val()).draw();
    })
    
    $('.button-detail').click(function($e) {

        if($(this).hasClass('is-active'))
            return false;
        $(this).toggleClass('is-active');
        $('.button-detail').not(this).removeClass('is-active');

        var active = $('.tab-pane.active');
        var ele = '#' + $e.currentTarget.classList[0];
        $(ele).css('display', 'block');
        $('#group').css('display', 'block');
        active.removeClass('active');
        setTimeout(function(){
            $('.tab-pane').css('display', 'none');
            if(ele === '#match'){
                $('#group').css('display', 'block');
                setTimeout(function(){
                    $('#group').addClass('active');
                });
            }
            $(ele).css('display', 'block');
            setTimeout(function(){
                $(ele).addClass('active');
            });
            
        }, 100)


        return false;
    })


    $('[data-toggle="tooltip"]').tooltip();  

    $('#race_math').change(function() {
        $('#group').html('');
        event_id = $('#event_id').val();
        race_id = $( "#race_math option:checked" ).val();
        $.ajax({
            url: '/get_math/'+ event_id+'/'+race_id,
            success: function(data){
                $('#group').html(data);
            }
        });

        $.ajax({
            url: '/get_knockout/'+ event_id+'/'+race_id,
            success: function(data){
                $('#knockout').html(data);
            }
        });
    });
});

  
