<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerM(Request $request)
    {
        $toEmail = $request->email;

        if($request->accept != 'true') return response()->json(['success' => false,'msg' => 'Please accept the terms and conditions.',]);
        if(strlen($request->password) < 8) return response()->json(['success' => false,'msg' => 'Password must be at least 8 characters.',]);
        if($request->confirm_pass != $request->password) return response()->json(['success' => false,'msg' => 'Password does not match.',]);



        $code = Str::random(8);

        $subject = 'Validate Your Email';
        $content = '
                <div style="background-color: #f4f4f4; padding: 20px;">
                    <h2>Validation Code</h2>
                    <p>Dear User,</p>
                    <p>Your validation code is: <strong>' . $code . '</strong></p>
                    <p>Please use this code to validate your account.</p>
                    <p>Thank you.</p>
                </div>';

        Mail::send([], [], function ($message) use ($toEmail, $subject, $content) {
            $message->to($toEmail)
                    ->subject($subject)
                    ->setBody($content, 'text/html'); // You can also use 'text/plain' for plain text emails
        });

        Session::put('code', $code);

        return response()->json([
            'success' => true,
            'message' => 'Email sent successfully. Please check your email and click on the link to validate your email address.',
        ]);
    }

    public function continueRegister(Request $request)
    {
        $code = Session::get('code');

        if($code == $request->validation_code)
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            auth()->loginUsingId($user->id);

            return response()->json([
                'success' => true,
                'msg' => 'Account created successfully.',
            ]);
        }
        else return response()->json([
            'success' => false,
            'msg' => 'Invalid code. Please try again.',
        ]);
    }
}
