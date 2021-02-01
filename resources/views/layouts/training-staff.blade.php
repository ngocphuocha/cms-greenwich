<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trainer | @yield('title', 'Home')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
  <!-- Styles -->
  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-success">
      <a class="navbar-brand" href="#">Training Staff Page</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('training-staff.home')}}"><i class="fa fa-home" aria-hidden="true">
                Home</i>
              <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">More</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item text-bold text-danger" href=""></a>
              <a class="dropdown-item disabled" href="#">Action 2</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{route('logout')}}" method="POST">
          @csrf
          <input type="submit" value="Logout">
        </form>
        {{-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> --}}
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Welcome Training Staff <i style="color: red">{{\Auth::user()->name}}</i></h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a name="" id="" class="btn btn-primary" href="{{route('training-staff.users.create')}}" role="button">Create
            trainee account</a>
          <a name="" id="" class="btn btn-primary" href="{{route('training-staff.trainees')}}" role="button">View
            Trainees</a>
        </div>
      </div>
      @yield('content')
    </div>
  </main>
</body>

</html>