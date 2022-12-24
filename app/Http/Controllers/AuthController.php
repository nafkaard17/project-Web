<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Http\Request;
use App\Repositories\Customers;
use Hash;

class AuthController extends Controller
{

    public function getRegister()
    {
        return view('front.register');
    }
    public function getLogin()
    {
        if (getCustSessions()) {
            return redirect('/shop');
        }
        return view('front.login');
    }

    public function postLogin(Request $request)
    {
       	$validator = Validator::make($request->all(),
			[
				'email'	=> 'required|email:dns',
				'password'	=> 'min:6|required',
			]
        );

        if ($validator->fails()) {
            $message = $validator->errors()->all();
            return redirect()->back()->with('danger', implode(', ',$message));
        }
        $customers = Customers::findBy('email', $request->email);

        if($customers->id == null) {
            return redirect()->back()->with('danger', 'Email tidak ditemukan');
        }

        if(!Hash::check($request->password,$customers->password)) {
            return redirect()->back()->with('danger', 'Password salah!');
        }

        storeCustSession($customers);
        return redirect('/shop')->with('success', 'Welcome back! ' .$customers->name);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'photo' => 'required|max:255',
                'email' => 'required|email|unique:customers',
                'password' => 'required|min:5|max:100'
            ]
        );



        if ($validator->fails()) {
            $message = $validator->errors()->all();
            return redirect()->back()->with('danger', implode(', ',$message));
        }

        $uploadPath = public_path("uploads");
        $save['name'] = $request->get('name');
        $save['email'] = $request->get('email');
        $save['password'] = \Illuminate\Support\Facades\Hash::make($request->get('password'));

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath,755, true, true);
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $rename = 'file_'.time().'.'.$ext;
            $save['photo'] = 'uploads/'.$rename;
            $photo->move($uploadPath,$rename);
        }
        DB::table('customers')->insert($save);

        return redirect('/')->with('success', 'Berhasil daftar. Silahkan login!');
    }

    public function postLogout(Request $request)
    {
        if (getCustSessions() == null) {
            return redirect('/');
        }
        session()->forget('customers');
        return redirect('/')->with(['success' => 'Terima kasih sudah berkunjung!']);
    }
}
