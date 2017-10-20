"use strict";

$(document).ready(function() {
  $(document).on("click", "a.login-window", function() {
    // Getting the variable's value from a link
    var loginBox = $("#modal");
    var path = window.location.pathname.split("/");
    var action = $(this).attr("href");

    action = action.slice(1, action.length);

    if (action === "login") {
      showLogin();
    } else if (action === "regis") {
      showRegister();
    } else if (action === "guest") {
      showGuest();
    } else if (action === "eventRegis") {
      showEventRegis(path[2]);
    }

    //Body Overflow hidde
    $("body").css("overflow", "hidden");

    //Fade in the Popup and add close button
    $(loginBox).fadeIn(300);

    // Add the mask to body
    $("body").append('<div id="mask"></div>');
    $("#mask").fadeIn(300);

    return false;
  });

  // When clicking on the button close or the mask layer the popup closed
  $("a.close, #mask").live("click", function() {
    $("#mask , .login-popup").fadeOut(300, function() {
      $("#mask").remove();
      $("body").css("overflow-y", "auto");
    });
    return false;
  });
});

var ajaxPost = function ajaxPost(form, url) {
  var error =
    arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "";

  $(".ui.primary.button").addClass("loading");
  $(".ui.primary.button").prop("disabled", true);
  $.ajax({
    type: "post",
    dataType: "json",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    data: $(form).serialize(),
    url: url,
    success: function success(data) {
      $("#mask , .login-popup").fadeOut(300, function() {
        $("#mask").remove();
        $("body").css("overflow-y", "auto");
      });
      if (url.indexOf("/event/") >= 0) {
        document.getElementById("get-content").scrollIntoView();
        getStatus("#box_1", window.myEvent);
      } else {
        setTimeout(function() {
          location.reload();
        }, 300);
      }
    },
    error: (function(_error) {
      function error(_x2) {
        return _error.apply(this, arguments);
      }

      error.toString = function() {
        return _error.toString();
      };

      return error;
    })(function(data) {
      var jsonData = JSON.parse(data.responseText);
      var result = "";
      Object.keys(jsonData).forEach(function(key) {
        result += "<li>" + jsonData[key] + "</li>";
      });
      $(error).show();
      $(error + " .error").html(result);
      $(".ui.primary.button").prop("disabled", false);
      $(".ui.primary.button").removeClass("loading");
      document.getElementById("error-box").scrollIntoView();
    })
  });
};

var ajaxGet = function ajaxGet(ele, url, callback) {
  // Loading element
  $(ele).html(
    '\n\t<div class="ui segment">\n\t\t<p></p>\n\t\t<div class="ui active dimmer">\n\t\t<div class="ui small loader"></div>\n\t\t</div>\n\t</div>\n   '
  );
  $.ajax({
    type: "get",
    dataType: "json",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: url,
    success: function success(data) {
      callback(data.data);
    },
    error: (function(_error2) {
      function error(_x3) {
        return _error2.apply(this, arguments);
      }

      error.toString = function() {
        return _error2.toString();
      };

      return error;
    })(function(data) {
      var jsonData = JSON.parse(data.responseText);
      callback(error);
    })
  });
};

var showLogin = function showLogin() {
  var data =
    '\n\t\t\t<div id="error-box" class="ui message red">\n\t\t\t\t<h5>Something wrong !</h5>\n\t\t\t\t<ul class="list error">\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t\t<form onsubmit="ajaxPost(\'#signin\', \'/login\', \'.ui.message\');return false;" id="signin" class="signin">\n\t\t\t\t<fieldset class="textbox">\n\t\t\t\t\t<label class="username">\n\t\t\t\t\t\t<span>Email</span>\n\t\t\t\t\t\t<input required id="email" name="email" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<label class="password">\n\t\t\t\t\t\t<span>Password</span>\n\t\t\t\t\t\t<input required id="password" name="password" value="" type="password">\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<!-- <button class="submit button" type="button"></button> -->\n\t\t\t\t\t<div align="center">\n\t\t\t\t\t\t<button type="submit" class="ui primary button">\n\t\t\t\t\t\t\u0E22\u0E37\u0E19\u0E22\u0E31\u0E19\n\t\t\t\t\t\t</button>\n\t\t\t\t\t\t<br><br>\n\t\t\t\t\t\t<button type="button" onclick="window.location=\'/fb/redirect\'" class="loginBtn loginBtn--facebook ui button" style="width:100%;text-align:center">\n\t\t\t\t\t\t\tLogin with Facebook\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t</fieldset>\n\t\t\t</form>\n\t\t\t';
  $("#modal-content").html(data);
};

var showCreateEvent = function showCreateEvent() {
  var data =
    '\n\t\t\t\t<form method="post" class="signin" action="#">\n\t\t\t\t\t<fieldset class="textbox">\n\t\t\t\t\t<label class="username">\n\t\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D\u0E08\u0E23\u0E34\u0E07\u0E02\u0E2D\u0E07\u0E04\u0E38\u0E13</span>\n\t\t\t\t\t<input required id="username" name="username" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\t\t\t\t\t\n\t\t\t\t\t<label class="surname">\n\t\t\t\t\t<span>\u0E19\u0E32\u0E21\u0E2A\u0E01\u0E38\u0E25\u0E02\u0E2D\u0E07\u0E04\u0E38\u0E13</span>\n\t\t\t\t\t<input required id="password" name="password" value="" >\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<label class="surname">\n\t\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D\u0E40\u0E25\u0E48\u0E19</span>\n\t\t\t\t\t<input required id="password" name="password" value="" >\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<div id="one"></div> \n\t\t\t\t\t<div id="two"></div> \n\t\t\t\t\t<div id="three"></div>\n\t\t\t\t\t\t<br>\n\t\t\t\t\t<br>\n\t\t\t\t\t<img src="ICONWEBSITE KMUTTOPENKmutt web prototype2-32.png" width="40%"/>\n\t\t\t\t\t</br>\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\u0E04\u0E38\u0E13\u0E40\u0E04\u0E22\u0E08\u0E31\u0E14\u0E40\u0E40\u0E02\u0E48\u0E07\u0E2B\u0E23\u0E37\u0E2D\u0E44\u0E21\u0E48?\n\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<input required type="radio" id="myRadio1">\u0E40\u0E04\u0E22\n\t\t\t\t\t\t\t\n\t\t\t\t\t</fieldset>\n\t\t\t\t</form>\n\t\t\t\t';
  $("#modal-content").html(data);
};

var showRegister = function showRegister() {
  var data =
    '\n\t\t\t\t<div id="error-box" class="ui message red">\n\t\t\t\t\t<h5>Something wrong !</h5>\n\t\t\t\t\t<ul class="list error">\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t\t<form onsubmit="ajaxPost(\'#signup\', \'/register\', \'.ui.message\');return false;" id="signup" method="post" class="signin">\n\t\t\t\t\t<fieldset class="textbox">\n\t\t\t\t\t<label class="email">\n\t\t\t\t\t\t<span>Email</span>\n\t\t\t\t\t\t<input required id="email" name="email" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\t\t\t\t\t\n\t\t\t\t\t<label class="password">\n\t\t\t\t\t\t<span>Password</span>\n\t\t\t\t\t\t<input required id="password" name="password" value="" type="password">\n\t\t\t\t\t</label>\n\t\t\t\t\t\n\t\t\t\t\t<label class="confirmed-password">\n\t\t\t\t\t\t<span>Confirmed password</span>\n\t\t\t\t\t\t<input required id="password-confirm" name="password_confirmation" value="" type="password">\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<label class="name">\n\t\t\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D\u0E08\u0E23\u0E34\u0E07</span>\n\t\t\t\t\t\t<input required id="firstname" name="firstname" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<label class="name">\n\t\t\t\t\t\t<span>\u0E19\u0E32\u0E21\u0E2A\u0E01\u0E38\u0E25</span>\n\t\t\t\t\t\t<input required id="lastname" name="lastname" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\n\t\t\t\t\t<label class="tel">\n\t\t\t\t\t\t<span>\u0E40\u0E1A\u0E2D\u0E23\u0E4C\u0E15\u0E34\u0E14\u0E15\u0E48\u0E2D</span>\n\t\t\t\t\t\t<input required id="tel" name="tel" value="" type="text" autocomplete="on" >\n\t\t\t\t\t</label>\n\t\t\t\t\t\n\t\t\t\t\t<div align="center">\n\t\t\t\t\t\t<button type="submit" class="ui primary button">\n\t\t\t\t\t\t\u0E22\u0E37\u0E19\u0E22\u0E31\u0E19\n\t\t\t\t\t\t</button>\n\t\t\t\t\t\t<br><br>\n\t\t\t\t\t\t<button type="button" onclick="window.location=\'/fb/redirect\'" class="loginBtn loginBtn--facebook ui button" style="width:100%;text-align:center">\n\t\t\t\t\t\t\tLogin with Facebook\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t\t</fieldset>\n\t\t\t\t</form>\n\t\t\t\t';
  $("#modal-content").html(data);
};

var showEventRegis = function showEventRegis(name) {
  var data =
    '\n\t\t\t\t<div id="error-box" class="ui message red">\n\t\t\t\t\t<h5>Something wrong !</h5>\n\t\t\t\t\t<ul class="list error">\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t\t<form id="event_regis" onsubmit="ajaxPost(\'#event_regis\', \'/event/' +
    name +
    '/regis\', \'.ui.message\');return false;" method="post" class="signin">\n\t\t\t\t<fieldset class="textbox">\n\t\t\t\t<label class="team_name">\n\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D\u0E17\u0E35\u0E21</span>\n\t\t\t\t<input required id="team_name" name="team_name" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\n\t\t\t\t<h6 style="color:black">\u0E0A\u0E37\u0E48\u0E2D\u0E02\u0E2D\u0E07\u0E04\u0E38\u0E13</h6>\n\t\t\t\t<label class="username">\n\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D</span>\n\t\t\t\t<input required id="first_name" name="first_name" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\t\t\t\t\n\t\t\t\t<label class="surname">\n\t\t\t\t<span>\u0E19\u0E32\u0E21\u0E2A\u0E01\u0E38\u0E25</span>\n\t\t\t\t<input required id="last_name" name="last_name" value="" type="text" autocomplete="on" >\n\t\t\t\t</label><label class="surname">\n\t\t\t\t<span>ชื่อเล่น</span>\n\t\t\t\t<input required id="nickname" name="nickname" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\n\t\t\t\t<label class="phone">\n\t\t\t\t<span>\u0E40\u0E1A\u0E2D\u0E23\u0E4C\u0E42\u0E17\u0E23\u0E28\u0E31\u0E1E\u0E17\u0E4C</span>\n\t\t\t\t<input required id="phone" name="phone" value="" type="text" autocomplete="on">\n\t\t\t\t</label>\n\n\t\t\t\t<label class="prize">\n\t\t\t\t<span> \u0E08\u0E33\u0E44\u0E14\u0E49\u0E21\u0E31\u0E49\u0E22 \u0E04\u0E38\u0E13\u0E40\u0E04\u0E22\u0E44\u0E14\u0E49\u0E23\u0E32\u0E07\u0E27\u0E31\u0E25\u0E17\u0E35\u0E48\u0E40\u0E17\u0E48\u0E32\u0E44\u0E2B\u0E23\u0E48\u0E21\u0E32</span>\n\t\t\t\t<input required id="prize" name="prize" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\t\t\t\t<span> \u0E2D\u0E31\u0E1E\u0E42\u0E2B\u0E25\u0E14\u0E20\u0E32\u0E1E\u0E1C\u0E39\u0E49\u0E40\u0E40\u0E02\u0E48\u0E07\u0E02\u0E31\u0E19(\u0E16\u0E49\u0E32\u0E21\u0E35)</span>\n\n\t\t\t\t<label for="pic1" class="custom-file-upload">\n\t\t\t\t<a class="ui blue button small">\u0E40\u0E25\u0E37\u0E2D\u0E01\u0E23\u0E39\u0E1B</a>\n\t\t\t\t<a id="result_1" class="result-pic font-small"></a>\n\t\t\t\t<input id="pic" name="pic" type="text" class="delete"/>\n\t\t\t\t</label>\n\t\t\t\t<input id="pic1" onchange="$(\'#result_1\').html(this.files[0].name); $(\'#pic\').val(this.files[0].name)" type="file"/>\n\n\t\t\t\t<div style="position:relative">\n\t\t\t\t\t<input required class="gender hidden required" type="radio" id="male1" name="gender" value="m">\n\t\t\t\t\t<input required class="gender hidden required" type="radio" id="female1" name="gender" value="f">\n\t\t\t\t</div>\n\t\t\t\t\t<span>\u0E40\u0E1E\u0E28</span>\n\t\t\t\t\t\t<button onclick="$(\'#male1\').prop(\'checked\', true)" type="button" class="circular one ui icon button left attached required">\n\t\t\t\t\t\t\t\u0E0A\u0E32\u0E22\n\t\t\t\t\t\t</button>\n\t\t\t\t\t\t\n\t\t\t\t\t\t<button onclick="$(\'#female1\').prop(\'checked\', true)" type="button" class="circular one ui icon button  right attached required">\n\t\t\t\t\t\t\u0E2B\u0E0D\u0E34\u0E07\n\t\t\t\t\t\t</button>\n\n\t\t\t\t\t\t\t<span>\u0E2D\u0E32\u0E22\u0E38</span>\n\t\t\t\t\t\t\t<div class="ui input" style="width: 30px;">\n\t\t\t\t\t\t\t\t\t<input required type="text" name="age" maxlength="2" />\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<span>\u0E21\u0E37\u0E2D</span>\n\t\t\t\t\t\t\t<select name="rank" class="ui fluid search dropdown">\n\t\t\t\t\t\t\t<option value="5">C</option>\n\t\t\t\t\t\t\t<option value="7">P</option>\n\t\t\t\t\t\t\t<option value="8">P-</option>\n\t\t\t\t\t\t\t</select>\n\t\t\t\t<br>\n\t\t\t\t<h6 style="color:black">\u0E04\u0E39\u0E48\u0E02\u0E2D\u0E07\u0E04\u0E38\u0E13</h6>\n\n\t\t\t\t<label class="username">\n\t\t\t\t<span>\u0E0A\u0E37\u0E48\u0E2D</span>\n\t\t\t\t<input required id="first_name_2" name="first_name_2" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\t\t\t\t\n\t\t\t\t<label class="surname">\n\t\t\t\t<span>\u0E19\u0E32\u0E21\u0E2A\u0E01\u0E38\u0E25</span>\n\t\t\t\t<input required id="last_name_2" name="last_name_2" value="" type="text" autocomplete="on" >\n\t\t\t\t</label><label class="surname">\n\t\t\t\t<span>ชื่อเล่น</span>\n\t\t\t\t<input required id="nickname_2" name="nickname_2" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\n\t\t\t\t<label class="phone">\n\t\t\t\t<span>\u0E40\u0E1A\u0E2D\u0E23\u0E4C\u0E42\u0E17\u0E23\u0E28\u0E31\u0E1E\u0E17\u0E4C</span>\n\t\t\t\t<input required id="phone_2" name="phone_2" value="" type="text" autocomplete="on">\n\t\t\t\t</label>\n\n\t\t\t\t<label class="prize">\n\t\t\t\t<span> \u0E08\u0E33\u0E44\u0E14\u0E49\u0E21\u0E31\u0E49\u0E22 \u0E04\u0E38\u0E13\u0E40\u0E04\u0E22\u0E44\u0E14\u0E49\u0E23\u0E32\u0E07\u0E27\u0E31\u0E25\u0E17\u0E35\u0E48\u0E40\u0E17\u0E48\u0E32\u0E44\u0E2B\u0E23\u0E48\u0E21\u0E32</span>\n\t\t\t\t<input required id="prize" name="prize_2" value="" type="text" autocomplete="on" >\n\t\t\t\t</label>\n\n\t\t\t\t<span> \u0E2D\u0E31\u0E1E\u0E42\u0E2B\u0E25\u0E14\u0E20\u0E32\u0E1E\u0E1C\u0E39\u0E49\u0E40\u0E40\u0E02\u0E48\u0E07\u0E02\u0E31\u0E19(\u0E16\u0E49\u0E32\u0E21\u0E35)</span>\n\t\t\t\t<label for="pic2" class="custom-file-upload">\n\t\t\t\t<a class="ui blue button small">\u0E40\u0E25\u0E37\u0E2D\u0E01\u0E23\u0E39\u0E1B</a>\n\t\t\t\t<a id="result_2" class="result-pic font-small"></a>\n\t\t\t\t<input id="pic_2" name="pic_2" type="text" class="delete" />\n\t\t\t\t</label>\n\t\t\t\t<input name="pic2" id="pic2" onchange="$(\'#result_2\').html(this.files[0].name); $(\'#pic\').val(this.files[0].name)" type="file"/>\n\n\t\t\t\t\n\t\t\t\t<input class="gender_2 delete" type="radio" id="male2" name="gender_2" value="m" />\n\t\t\t\t<input class="gender_2 delete" type="radio" id="female2" name="gender_2" value="f" />\n\t\t\t\t\t<span>\u0E40\u0E1E\u0E28</span>\n\t\t\t\t\t<button onclick="$(\'#male2\').prop(\'checked\', true)" type="button" class="circular two ui icon button left attached ">\n\t\t\t\t\t\t\u0E0A\u0E32\u0E22\n\t\t\t\t\t</button>\n\t\t\t\t\t\n\t\t\t\t\t<button onclick="$(\'#female2\').prop(\'checked\', true)" type="button" class="circular two ui icon button  right attached ">\n\t\t\t\t\t\u0E2B\u0E0D\u0E34\u0E07\n\t\t\t\t\t</button>\n\t\t\t\t\t\t\t<span>\u0E2D\u0E32\u0E22\u0E38</span>\n\t\t\t\t\t\t\t<div class="ui input" style="width: 30px;">\n\t\t\t\t\t\t\t\t\t<input required type="text" name="age_2" maxlength="2" />\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t  <br>\n\t\t\t\t<div align="center">\n\t\t\t    <button class="ui primary button" type="submit">\u0E22\u0E37\u0E19\u0E22\u0E31\u0E19</button>\n\t\t\t\t</div>\n\t\t\t\t</fieldset>\n\t\t</form>\n\t\t';
  $("#modal-content").html(data);
};

var showGuest = function showGuest() {
  var data =
    '\n\t\t\t<br>\n\t\t\t<div align="center" style="color:black">\u0E44\u0E21\u0E48\u0E2A\u0E32\u0E21\u0E32\u0E23\u0E16\u0E2A\u0E21\u0E31\u0E04\u0E23\u0E41\u0E02\u0E48\u0E07\u0E44\u0E14\u0E49 \u0E40\u0E19\u0E37\u0E48\u0E2D\u0E07\u0E08\u0E32\u0E01\u0E22\u0E31\u0E07\u0E44\u0E21\u0E48\u0E44\u0E14\u0E49\u0E25\u0E47\u0E2D\u0E01\u0E2D\u0E34\u0E19\u0E40\u0E02\u0E49\u0E32\u0E2A\u0E39\u0E48\u0E23\u0E30\u0E1A\u0E1A</div>\n\t\t\t<br>\n\t\t\t<div align="center">\n\t\t\t<a href="#login" class="login-window ui primary button">\n\t\t\t\u0E40\u0E02\u0E49\u0E32\u0E2A\u0E39\u0E48\u0E23\u0E30\u0E1A\u0E1A\n\t\t\t</a>\n\t\t\t<a style="margin-top:10px" href="#regis" class="login-window ui blue button">\n\t\t\t\u0E2A\u0E21\u0E31\u0E04\u0E23\u0E2A\u0E21\u0E32\u0E0A\u0E34\u0E01\n\t\t\t</a>\n\t\t\t</div>\n\t\t';
  $("#modal-content").html(data);
};
