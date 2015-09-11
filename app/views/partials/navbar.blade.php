{{-- Navigation --}}

<div class="container">
        <nav class="navbar navbar-default container-fluid" id="nav" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             </button>
           </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                <li><a href="{{action("HomeController@showHome") }}">Home</a></li>
                <li><a href="{{action("HomeController@showLogin") }}">Log In</a></li>
                <li><a href="{{action("CalendarEventsController@index") }}">All Events</a></li>
                <li><a href="{{action("CalendarEventsController@create") }}">Add Event</a></li>
                <li><a href="{{action("HomeController@showAbout") }}">About</a></li>
            </ul>
               
{{-- Search form --}}

          {{--  <form method="get" action="{{ action('CalendarEventsController@index') }}" class="navbar-form navbar-left" role="search">
              <div class="form-group">
                 <input name="search" type="text" class="form-control" placeholder="Search Posts">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
           </form> --}}

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>
    $('.dropdown-toggle').dropdown()
</script>

          <ul class="nav navbar-nav navbar-right">
              @if (Auth::check())
                {{-- if logged in then log out; else go to login page --}}
                Hello {{{Auth::user()->first_name}}} {{{Auth::user()->last_name}}}
                    <li><a href="{{{ action('HomeController@doLogout') }}}">Logout</a></li>
                @else
                    
                
              <li class="dropdown">

         <a href="{{ url('login') }}" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
             <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">

                      <li>
                         <div class="row">
                            <div class="col-md-12">
                               <form class="form-group" role="form" method="post" action="{{ action('HomeController@doLogin') }}" accept-charset="UTF-8" id="login-nav">
                                {{ Form::token() }}
                                  <div class="form-group">
                                     <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                     <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                  </div>
                                  <div class="form-group">
                                     <label class="sr-only" for="exampleInputPassword2">Password</label>
                                     <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                  </div>
                                  <div class="checkbox">
                                     <label>
                                     <input type="checkbox"> Remember me
                                     </label>
                                  </div>
                                  <div class="form-group">
                                     <button type="submit" class="btn navbar-btn btn-success btn-block">Log in</button>
                                  </div>
                               </form>
                            </div>
                         </div>
                      </li>
              </ul>
              @endif

          </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>




