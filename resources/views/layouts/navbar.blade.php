<div class="navbar">
  <div class="nav">
  <div class="ui two column grid">
    <div class="row">
      <div class="column twelve wide padding0 text-right">
        <button class="ui inverted red button font-small">สมัครเป็นผู้จัดแข่ง</button>
        <button id="coin" class="ui yellow button font-small" style="position:relative"><img style="position:absolute; left:10px; top:50%; transform:translateY(-50%)" src="/ICONWEBSITE KMUTTOPEN/Kmutt web prototype2-38.png"><span style="padding-left:20px"></span>Coin Shop</button>
      </div>
  @if(Auth::guest())
      <div class="column right floated four wide padding0 text-center">
        <a href="#login" class="login-window"><img src="/ICONWEBSITE KMUTTOPEN/Kmutt web prototype2-27.png " height="58" width="42"/></a>
        <br>
        <a href="#regis" class="login-window ui blue label">Register</a>
      </div>
    </div>
    </div>
  @else
      <div class="column right floated four wide padding0 text-center">
        <img style="margin-bottom:7px" class="profile" src="/images/no_pic.jpg">
        <div style="margin-bottom:7px;">{{ Auth::user()->Fullname }}</div>
        <a href="#" class="ui blue label">Competitor</a><br>
        <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
          {{ csrf_field() }}
          <a class="ui red label" onclick="$('#logout-form').submit();">
            Logout
          </a>
        </form>
      </div>
    </div>
    </div>
  @endif
  </div>
</div>