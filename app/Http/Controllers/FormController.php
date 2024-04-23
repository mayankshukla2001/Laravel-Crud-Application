<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
   
class FormController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate
        ([
                'name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email'
            ], 
            [
                'name.required' => 'Name field is required.',
                'password.required' => 'Password field is required.',
                'password.min' => 'Password length should be at least 5.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be email address.'
        ]);

            $user= new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);

            $res=$user->save();

            if(\Auth::attempt($request->only('email','password')))
            {
                return redirect('add-student')->with('success', 'User created successfully.');
            }
            else{
                return back()->with('fail', 'Something went wrong.');
            }
    }

    public function loginUser(Request $request): RedirectResponse
    {
        // die('here');
        $request->validate(
            [
                'password' => 'required|min:5',
                'email' => 'required|email'
            ],
            [
                'password.required' => 'Password field is required.',
                'password.min' => 'Password length should be at least 5.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be email address.',
                // 'email.unique' => 'This email address is already taken.',
        ]
        );

        $user=User::where('email', '=', $request->email)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('id',$user->id);
                return redirect('add-student');
            }
            else{
                return back()->with('fail','password mismatch');
            }
        }
        else{
            return back()->with('fail',"user not found");
        }
    }

    public function ShowUserlist(){

        $users = User::all();
        return view('allUserList', compact('users'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('id');
        return redirect('user/login')->with('success', 'Logged out successfully.');
    }
}