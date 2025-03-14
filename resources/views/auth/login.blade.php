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
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="{{asset('images/draw2.webp')}}" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="{{route('login')}}" method="POST">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                    name="email" value="{{old('email')}}" required />
                  @error('email')
                      <p class="text-danger text-sm">{{$message}}</p>
                  @enderror  
                </div>

                <div data-mdb-input-init class="form-outline mb-3">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                    name="password" required />
                    @error('password')
                        <p class="text-danger text-sm">{{$message}}</p>
                    @enderror
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <a href="#!" class="text-body">Mot de passe oublié?</a>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas un compte? 
                    <a href="{{route('register')}}" class="link-danger">Souscrire</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>  
      <script src="js/bootstrap-5.bundle.min.js"></script>
</body>
</html>