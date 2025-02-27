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
              <a href="{{ url('/') }}" class="navbar-brand"><span style="font-weight: bold;color: rgb(152, 238, 66);">C</span>abinet Médical</a>

         </div>

         <!-- MENU LINKS -->
         <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                   <li><a href="{{ url('/') }}" class="smoothScroll">Accueil</a></li>

                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/patients') }}">Patients</a><br>
                            <a class="dropdown-item" href="{{ url('/consultations') }}">Consultations</a>
                            <a class="dropdown-item" href="{{ url('/prescriptions') }}">Prescriptions</a>
                            <a class="dropdown-item" href="{{ url('/analyses') }}">Analyses</a>
                        </div>
                    </li>
                   <li><a href="{{ url('/news') }}" class="smoothScroll">Actualités</a></li>
                   <li><a href="{{ url('/profile') }}" class="smoothScroll">Profil</a></li>
                   <li><a class="smoothScroll" href="{{ url('/settings') }}">Paramètres</a></li>
                   <li class="appointment-btn"><a href="{{ url('/contact') }}">Prendre un rendez-vous</a></li>
                   <li class="appointment-btn"><a href="{{ url('/login') }}"><img src="images/user.png" alt="" width="22px"></a></li>
              </ul>
         </div>

    </div>

</section>
