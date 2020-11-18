<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Dashboard Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

  <!-- Bootstrap core CSS -->
<link href="{{URL::asset('../resources/css/bootstrap.min.css')}}" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    form 
    {
        padding-top: 30px;
    }
    .linked 
    {
        padding-top: 30px;
        text-align: right;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('../resources/css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">{{Auth::user()->name}}</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>
 
   
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
        
        </div>
      </nav>
      <div class="linked col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <a href="{{ URL::previous() }}" class="mr-5">
            <button type="button" class="btn btn-secondary">
              <span data-feather="arrow-left-circle"></span>
              Back
            </button>
          </a>
            
        </button>
      </div>
      <form action="addNewStudent" method="POST" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-20">
          @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="email" name="email">
          </div>
          <div class="form-group">
            <label>address</label>
            <input type="text" class="form-control" placeholder="Address" name="address">
          </div>
          <div class="form-group">
            <input type="submit" value="Add" class="btn btn-success">
          </div>
          
      </form>
      
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="{{URL::asset('../resources/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{URL::asset('../resources/js/dashboard.js')}}"></script>
  <script src="{{URL::asset('../resources/js/plugin.js')}}"></script>
</body>

</html>