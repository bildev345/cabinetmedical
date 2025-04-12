<!-- HEADER -->
<header>
    <div class="container">
         <div class="row">

              <div class="col-md-4 col-sm-5">
                   <p>Bienvenue dans un centre de santé professionnel</p>
              </div>

              <div class="col-md-8 col-sm-7 text-align-right">
                   <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                   <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Lun-Ven)</span>
                   <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                   @guest
                         <span><a href="{{route('login.create')}}">Login</a></span>
                   @endguest
                   @auth
                         <span><button form="form-logout" type="submit" class="logout-btn">Logout</button></span>
                   @endauth
              </div>
              <form action="{{route('logout')}}" method="POST" id="form-logout" hidden>
                    @csrf
              </form>
         </div>
    </div>
</header>
