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
              <a href="index.html" class="navbar-brand"><span style="font-weight: bold;color: rgb(101, 161, 3);font-size: 1.3em;">C</span>abinet Médical</a>
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
                            <a class="dropdown-item" href="{{ url('/') }}">Accueil</a><br>
                            <a class="dropdown-item" href="{{ url('/about-us') }}">À Propos</a>
                            <a class="dropdown-item" href="{{route('patients.index')}}">Patients</a>
                            <a class="dropdown-item" href="{{ route('prescriptions.index') }}">Préscription</a>
                            <a class="dropdown-item" href="{{ route('documents.index') }}">Documents</a>
                            <a class="dropdown-item" href="{{ url('/contact') }}">Contact</a>
                            <a class="dropdown-item" href="{{ route('analyses.index') }}">Analyses</a>
                            <a class="dropdown-item" href="{{ route('chirurgies.index') }}">chirurgies</a>
                            <a class="dropdown-item" href="{{ route('constants.index') }}">constants</a>

                        </div>
                    </li>
                   <li><a href="{{ url('/news') }}" class="smoothScroll">Actualités</a></li>
                   <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                   <li class="appointment-btn"><a href="{{ route('consultations.index') }}">Prendre un rendez-vous</a></li>
              </ul>
         </div>

    </div>
</section>
