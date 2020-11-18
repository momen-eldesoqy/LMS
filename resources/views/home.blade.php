@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">

            <li class="nav-item active" data-class="students">
              <a class="nav-link" href="#">
                <span data-feather="shopping-bag"></span>
                My Borrowed Books
              </a>
              
            </li>

            <li class="nav-item" data-class="books">
              <a class="nav-link" href="#">
                <span data-feather="book-open"></span>
               All Books
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
          <h1 class="h2">My Borrowed Books</h1>
          
        </div>




        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Book Title</th>
                <th>Book ID</th>
                <th>Return Date</th>
                <th>Return</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($studentBorrowedBooks as $bk)
             <tr>
             <td>{{$bk->title}}</td>
                <td>{{$bk->book_id}}</td>
                <td>{{$bk->return_date}}</td>
                    <td>
                    <a href="return/{{$bk->id}}" class="mr-2"><span data-feather="refresh-ccw"></span></a>
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
         
        </div>




        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Available</th>
                <th>Borrow</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->price}}</td>
                <td>{{boolval($book->available) ? 'available' : 'taken'}}</td>
                <td>
                  @if ($book->available == 0)
                  <span data-feather="slash"></span>
                  @else
                  <a href="borrow/{{$book->id}}" class="mr-2"><span data-feather="pocket"></span></a>
                  @endif
                
                  
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
              @foreach ($borroweds as $borrow)
              <tr>
                <td>{{$borrow->title}}</td>
                <td>{{$borrow->book_id}}</td>
                <td>{{$borrow->Std_name}}</td>
                <td>{{$borrow->std_id}}</td>
                <td>{{$borrow->return_date}}</td>


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