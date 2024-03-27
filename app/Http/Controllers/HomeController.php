<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UseMiddleware;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Response;
use App\Http\Requests\ContactFormRequest;
use App\Http\Session;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Role');

        $this->middleware('auth')->only('practice');

        $this->middleware('auth')->except('twocreated');
    }

    public function Role()
    {
        echo 'Hello Welcome';
    }

    public function practice()
    {
        echo 'controller in laravel';
    }

    public function twocreated()
    {
        echo 'Welcome your controller in laravel';
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {

        return view('home');
    }

    public function table()
    {
        $data = User::paginate(5);
        return view('table', ['User' => $data]);
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('edit', ['User' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->update();
        return redirect('tableview')->with('status', 'Student Updated Successfully');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('tableview')->with('status_msg', 'User record delete Successfully');
    }

    // public function email()
    // {
    //     $subject = 'Test Subject';
    //     $body = 'Test Message';

    //     Mail::to('ankurc@whizkraft.net')->send(new TestMail($subject, $body));
    //     return ("Email is sent successfully.");
    // }
    public function email()
    {
        $subject = 'Test Subject';
        $body = 'Test Message';

       // Mail::to('ankurc@whizkraft.net')->send(new TestMail($subject, $body));
        dispatch(new SendEmailJob($subject, $body));
        //echo"<pre>"; print_r($mail);die();

        return "Email is sent successfully.";
    }


    public function front()
    {
        return view('frontshow');
    }

    public function setCookie(Request $request)
    {
        $minutes = 1;
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'virat', $minutes));
        return $response;
    }
    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        return redirect('frontshow')->with('name', 'virat');
    }
    public function deleteCookie(Request $request)
    {
        $request->session()->forget('name');
        return response('Data removed form cookie')->cookie('name', null, -1);
    }

    public function getsession(Request $request)
    {
        if ($request->session()->has('my_name'))
            echo  $request->session()->get('my_name');
        //return redirect()->with('frontshow');
    }

    public function storesession(Request $request)
    {
        $request->session()->put('my_name', 'vicky');
        echo "Data added to session";
    }

    public function deletesession(Request $request)
    {
        $request->session()->forget('my_name');
        echo "Data removed from session";
    }

    public function index_response()
    {
        //return response("Hello", 200)->header('Content-Type', 'text/plain');

        return response()->json([
            'name' => 'vicky', 'state' => 'up',
            'city' => 'meerut'
        ]);

        //return response("welcome to delhi", 200)->header('content-type', 'text/plain');

    }

    public function showForm()
    {
        return view('formhandling');
    }

    public function store(ContactFormRequest $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'message' => 'required|min:5|max:200',
        ], [
            'name.required' => 'Please enter your name is empty',
            'email.required' => 'Please enter your email is empty',
            'message.required' => 'Please enter your message is empty',
        ]);

        return back()->with('success', 'form submitted successful');
    }

    public function dashboard()
    {
        $totalAllUsers = User::count();

        return view('dashboard', ['totalAllUsers' => $totalAllUsers]);
    }

}
