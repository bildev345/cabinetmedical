<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap-5.min.css')}}">
    <style>
        *{
            font-family: sans-serif;
            font-weight: 700;
        }
    </style>
</head>
<body>
<section class="text-center">
    <div class="p-5 bg-image" style="
        background-image: url('images/medicine-7094412_1280.jpg');
        height: 300px;
    ">
    </div>

    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
          margin-top: -100px;
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Créer un compte</h2>
            <form action="{{route('register.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1">Nom</label>
                    <input type="text" id="form3Example1" class="form-control" name="nom" value="{{old('nom')}}" required />
                    @error('nom')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example2">Prénom</label>
                    <input type="text" id="form3Example2" class="form-control" name="prenom" value="{{old('prenom')}}" required />
                    @error('prenom')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="mb-2">vous êtes?</div>
                <div class="col-md-2">
                    <label for="">Medecin</label>
                    <input type="radio" name="role" value="medecin">
                </div>
                <div class="col-md-2">
                    <label for="">Assistante</label>
                    <input type="radio" name="role" value="assistante">
                </div>
                <div class="col-md-2">
                    <label for="">Patient</label>
                    <input type="radio" name="role" value="patient">
                </div>
                @error('role')
                    <p class="text-danger text-sm">{{$message}}</p>
                @enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" id="form3Example3" class="form-control" name="email" value="{{old('email')}}" required />
                    @error('email')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="form3Example4" class="form-control" name="password" required />
                    @error('password')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Confirmer password</label>
                    <input type="password" id="form3Example4" class="form-control" name="password_confirmation" />
                    @error('password_confirmation')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
              </div>
              <a class="btn btn-secondary btn-block mb-4" href="{{route('home')}}">Retour</a>
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                Souscrire
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/bootstrap-5.bundle.min.js"></script>
</body>
</html>
