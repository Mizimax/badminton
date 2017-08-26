<div class="nav">
<div class="ui two column grid">
  <div class="row">
    <div class="column twelve wide padding0 text-right">
      <button class="ui inverted red button font-small">สมัครเป็นผู้จัดแข่ง</button>
      <button class="ui yellow button font-small">Coin Shop</button>
    </div>
@if(Auth::guest())
    <div class="column right floated four wide padding0 text-center">
      <a href="#login" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42"/></a>
      <br>
      <a href="#regis" class="login-window ui blue label">Register</a>
    </div>
  </div>
  </div>
@else
    <div class="column right floated four wide padding0 text-center">
      <img class="profile" src="/images/guest.jpg">
      <a href="#regis" class="login-window ui blue label">Competitor</a><br>
      <form id="logout-form" action="logout" method="POST">
        {{ csrf_field() }}
        <a onclick="$('#logout-form').submit();">
          Logout
        </a>
      </form>
    </div>
  </div>
  </div>
@endif
</div>