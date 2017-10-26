function check_form_register(){
    
    if($('#password').val() != $('#confirm_password').val()){
        alert("กรุณากรอก Password และ Confirm Password ให้ตรงกัน");
        $("#password").focus();
        return false;
    }
    phone = $('#phone').val();
    phone.replace("-","");
    if(phone.length > 10 || phone.length < 9){
        alert('กรุณาตรวจสอบหมายเลขโทรศัพท์ของท่าน');
        $('#phone').focus();
        return false;
    }
    return true;
}