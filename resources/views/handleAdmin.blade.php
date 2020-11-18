@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">

            <li class="nav-item active" data-class="students">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Students
              </a>
              
            </li>

            <li class="nav-item" data-class="books">
              <a class="nav-link" href="#">
                <span data-feather="book-open"></span>
                Books
              </a>
            </li>
            <li class="nav-item" data-class="borrowed-books">
              <a class="nav-link" href="#">
                <span data-feather="book"></span>
                Borrowed books
              </a>
            </li>
            <li class="nav-item" data-class="profile">
              <a class="nav-link" href="#">
                <span data-feather="user"></span>
                Edit Profile
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 students">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
          <h1 class="h2">All Studenst</h1>
          <div>
            <a href="search" class="mr-5">
              <button type="button" class="btn btn-secondary">
                <span data-feather="search"></span>
                Search
              </button>
            </a>
            <a href="newstudent" class="mr-5">
              <button type="button" class="btn btn-primary">
                <span data-feather="plus-circle"></span>
                New Student
              </button>
            </a>
        </div>
        </div>




        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>address</th>
                <th>Transactions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($students as $stds)
             <tr>
             <td>{{$stds->id}}</td>
                <td>{{$stds->name}}</td>
                <td>{{$stds->email}}</td>
                <td>{{$stds->address}}</td>
                <td>
                <a href="oneStudent/{{$stds->id}}" class="mr-2"><span data-feather="eye"></span></a>
                <a href="editStudent/{{$stds->id}}" class="mr-2"><span data-feather="edit"></span></a>
                <a href="deleteStudent/{{$stds->id}}"><span data-feather="trash-2"></span></a>
                </td>
              </tr> 
             @endforeach
              
             
             
            </tbody>
          </table>
        </div>
      </main>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 books">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">All Books</h1>
          <a href="newbook" class="mr-5">
            <button type="button" class="btn btn-primary">
              <span data-feather="plus-circle"></span>
              New Book
            </button>
          </a>
        </div>




        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Available</th>
                <th>Transactions</th>

              </tr>
            </thead>
            <tbody>
             @foreach ($books as $boks)
             <tr>
             <td>{{$boks->id}}</td>
                <td>{{$boks->title}}</td>
                <td>{{$boks->price}}</td>
                <td>{{boolval($boks->available) ? 'available' : 'taken'}}</td>
                <td>
                  <a href="onebook/{{$boks->id}}" class="mr-2"><span data-feather="eye"></span></a>
                  <a href="edit/{{$boks->id}}" class="mr-2"><span data-feather="edit"></span></a>
                <a href="delete/{{$boks->id}}"><span data-feather="trash-2"></span></a>
                </td>
              </tr>  
             @endforeach
              
              
              

            </tbody>
          </table>
        </div>
      </main>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 borrowed-books">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Borrowed Books</h1>

        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Book-Title</th>
                <th>book-id</th>
                <th>Borrowed By</th>
                <th>ID</th>
                <th>return-date</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($studentBorrowedBooks as $bk)
              <tr>
                <td>{{$bk->title}}</td>
                <td>{{$bk->book_id}}</td>
                <td>{{$bk->Std_name}}</td>
                <td>{{$bk->std_id}}</td>
                <td>{{$bk->return_date}}</td>


              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
      </main>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 profile">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Profile</h1>

        </div>
          <form action="updateprofile/{{Auth::id()}}" method="POST" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-20">
              @csrf
            <div class="form-group">
              <label>Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="name" value="{{Auth::user()->name}}">
            </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="email" name="email" value="{{Auth::user()->email}}">
              </div>
              <div class="form-group">
                <label>address</label>
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{Auth::user()->address}}">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="text" class="form-control" placeholder="new password" name="password" value="">
              </div>

              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
          </form>
      </main>
    </div>
  </div>
@endsection