var bg = $('.cover2[image-bg]');
var url = bg.attr('image-bg');

$('head').append('<style>.cover2:before{background-image: url("'+url+'")');

function search_match(race_id, list_line){
    event_id = $('#event_id').val();
    $.ajax({
        url: '/get_match/'+ event_id+'/'+race_id,
        success: function(data){
            $('#group').html(data);
            var dragAndSwap = new DragAndSwap({
                containers: ['#table-match'],
                element: '.team_mem',
                isEnabled: true,
                swapBetweenContainers: true,
                onChange: function (boxes) {
                    var latestLine;
                    var race_id;
                    var team_id;
                    var line;
                    var i,j,x,count=0,temp = [],chunk = 4;
                var array = Array.from(boxes);
                for (i=0,j=array.length; i<j; i+=chunk) {

                    
                    for(x=i; x<i+chunk;x++) {
                        if(!temp[count])
                            temp[count] = []
                        temp[count].push(parseInt($(array[x]).children(':first').attr('team-id')));
                    }
                    count++;
                }
                    // boxes.forEach(function(ele) {
                    //     race_id = $(ele).children(':first').attr('race-id');
                    //     team_id = $(ele).children(':first').attr('team-id');
                    //     line = $(ele).children(':first').attr('line');
                    //     console.log(team_id);
    
                    //     if(!lineChanged[race_id]){
                    //         lineChanged[race_id] = {}
                    //         lineChanged[race_id][line] = [];
                    //     }
                    //     if(!lineChanged[race_id][line]) {
                    //         lineChanged[race_id][line] = [];
                    //     }
                    //     if(line !== latestLine){
                    //         lineChanged[race_id][line] = [];
                    //     }
                    //     lineChanged[race_id][line].push(parseInt(team_id));
                    //     latestLine = line;
                    // })
                    $.ajax({
                        url: '/split_line/'+event_id+'/race/'+$('#hand_dropdown').val(),
                        method: 'patch',
                        data: JSON.stringify(temp),
                        success: function(data){
                            search_match($('#hand_dropdown').val());
                        }
                    });
                }
            });
        }
    });
    $.ajax({
        url: '/get_knockout/'+ event_id+'/'+race_id,
        success: function(data){
            $('#knockout').html(data);
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

function clickminitab(tab){
    switch(tab){
        case 'group':
            $('#group_tab').addClass('is-active');
            $('#knockout_tab').removeClass('is-active');
            $('#knockout').removeClass('active');
            setTimeout(function(){
                $('#knockout').css('display', 'none');
                $('#group').css('display', 'block');
                $('#group').addClass('active');
            }, 100);
            break;
        case 'knockout':
            $('#knockout_tab').addClass('is-active');
            $('#group_tab').removeClass('is-active');
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

var searchTable = (function(element){
    var data = selectDropdown(element);
    if(data == 'ทั้งหมด')
        data = ''
    tb_member.search(data).draw();
})

var timeScoreToggle = (function(element){
    if($(element).hasClass('is-active'))
        return false;
    $('.match-select.is-active').removeClass('is-active');
    $(element).addClass('is-active');

    $('.score').toggleClass('show');
    $('.match_time').toggleClass('hide');
})

$(document).ready(function(){

    var select;
    var hash;

    $(window).hashchange(function() {
      hash = window.location.hash;
      if(hash)
        select = hash.slice(2,hash.length);
      else 
        select = 'detail';

      if($('.'+select).length == 0) 
        select = 'detail';

      var active = $('.tab-pane.active');
      active.removeClass('active');
      $('.button-detail.is-active').removeClass('is-active');
     // $('#group').css('display', 'block');
      $('.'+select).addClass('is-active');
      $('#'+select).css('display', 'block');
      setTimeout(function(){

         $('.tab-pane').css('display', 'none');
         var tab = $('a.max.is-active');
         if(tab.length != 0){
            var tabId = tab.attr('id');
            var tabEle = tabId.slice(0,tabId.length-4);
            $('#'+tabEle).css('display', 'block');
            setTimeout(function(){
                $('#'+tabEle).addClass('active');
            });
         }
        $('#'+select).css('display', 'block');
        setTimeout(function(){
            $('#'+select).addClass('active');
        });
            
      },100)
    })
     
    

    hash = window.location.hash;

    if(hash)
        select = hash.slice(2,hash.length);
    else
        select = 'detail';

    if($('.'+select).length == 0) 
        select = 'detail';

    $('#'+select).addClass('active');
    $('.'+select).addClass('is-active');

    $( 'table' ).each(function( i ) { 

    var worktable = $(this);
    var num_head_columns = worktable.find('thead tr th').length;
    var rows_to_validate = worktable.find('tbody tr');

    rows_to_validate.each( function (i) {

        var row_columns = $(this).find('td').length;
        for (i = $(this).find('td').length; i < num_head_columns; i++) {
            $(this).append('<td class="hidden"></td>');
        }

    });

});

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {

            race_id = $( ".input .display" ).html();
            if(race_id == "ทั้งหมด" || race_id == "เลือกอันดับ"){
                return true;
            }
            if(data[3].replace(/<a.*>.*?<\/a>/ig,'').trim() == race_id){
                return true;
            }
            return false;
        }
    );

    window.tb_member = $('#table-member').DataTable({
          pageLength: -1,
          bLengthChange: false,
          order: [[ 5, "desc" ]],
        //   searching: false,
          bSort:false,
          sDom: 't' 
    });
        
    $('.button-detail').click(function($e) {
        if($(this).hasClass('is-active'))
             return false;
    })


    $('[data-toggle="tooltip"]').tooltip();  

});

  
