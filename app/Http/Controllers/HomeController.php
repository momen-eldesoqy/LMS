<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        $borroweds = Borrowed::all();
        $studentBorrowedBooks = Borrowed::all()->where('std_id', Auth::id());
        return view('home')->with('books', $books)->with('borroweds', $borroweds)->with('studentBorrowedBooks', $studentBorrowedBooks);
    }
    public function handleAdmin()
    {
        $students = User::all()->where('is_admin', 0);
        $books = Book::all();
        $studentBorrowedBooks = Borrowed::all();
        return view('handleAdmin')->with('students', $students)->with('books', $books)->with('studentBorrowedBooks', $studentBorrowedBooks);
    }
    public function createNewStudent()
    {
        return view('newstudent');
    }
    public function storeNewStudent(Request $request)
    {
        $addstudent = new User();
        $addstudent->name = $request->name;
        $addstudent->email = $request->email;
        $addstudent->address = $request->address;
        $addstudent->save();
        return redirect('admin/home');
    }
    public function showOneStudent($id)
    {
        $id = User::find($id);
        return view('onestydent')->with('id', $id);
    }
    public function editStudent($editid)
    {
        $editid = User::find($editid);
        return view('editform')->with('editid', $editid);
    }
    public function updateStudent(Request $request, $student)
    {
        $student = User::find($student);
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->address = $request->get('address');
        $student->save();
        return redirect('admin/home');
    }
    public function deleteStudent($id)
    {
        $id = User::find($id);
        $id->delete();
        return redirect('admin/home');
    }
    public function getsearch()
    {
        return view('search');
    }
    public function searchdone(Request $request)
    {
        $id =  $request->id;
        $searchedstd = User::find($id);
        return view('searchdone')->with('searchedstd', $searchedstd);
    }
    public function borrow($id)
    {
        $book = Book::find($id);
        $book->available = false;
        $student = User::find(Auth::id());
        $borrowed_books = new Borrowed();
        $borrowed_books->title = $book->title;
        $borrowed_books->book_id = $book->id;
        $borrowed_books->Std_name = $student->name;
        $borrowed_books->std_id = $student->id;
        $borrowed_books->save();
        $book->save();
        return redirect('home');
    }
    public function return($id)
    {
        $borrowed_books = Borrowed::find($id);
        $book = Book::find($borrowed_books->book_id);
        $book->available = true;
        $book->save();
        $borrowed_books->delete();
        return redirect('home');
    }
    public function updateProfile(Request $request, $user)
    {
        $user = User::find($user);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        if ($user->is_admin == 1) {
            return redirect('admin/home');
        } else {
            return redirect('home');
        }
    }
}
