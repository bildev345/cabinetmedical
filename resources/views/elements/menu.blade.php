<!-- MENU -->
<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

         <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
              </button>

              <!-- lOGO TEXT HERE -->
              <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>Cabinet Medical</a>
         </div>

         <!-- MENU LINKS -->
         <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                   <li><a href="{{ url('/') }}" class="smoothScroll">Home</a></li>
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/') }}">Home</a><br>
                            <a class="dropdown-item" href="{{ url('/about-us') }}">About Us</a>
                            <a class="dropdown-item" href="{{ url('/services') }}">Services</a>
                            <a class="dropdown-item" href="{{ route('documents.index') }}">Documents</a>
                            <a class="dropdown-item" href="{{ url('/blog') }}">News</a>
                            <a class="dropdown-item" href="{{ url('/contact') }}">Contact</a>

                        </div>
                    </li>
                   <li><a href="{{ url('/news') }}" class="smoothScroll">News</a></li>
                   <li class="appointment-btn"><a href="{{ url('/contact') }}">Make an appointment</a></li>
                   <li class="appointment-btn"><a href="{{ url('/login') }}"><img src="images/user.png" alt="" width="22px"></a></li>
              </ul>
         </div>

    </div>
</section>
