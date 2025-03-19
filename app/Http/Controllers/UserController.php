<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Subscribe;
use App\Address;

class UserController extends Controller
{

    public function index()
    {
        $aut = User::where('id', session()->get('logged'))->first();
        return view('user.index', compact('aut'));
    }

    public function password()
    {
        $aut = User::where('id', session()->get('logged'))->first();
        return view('user.infos', compact('aut'));
    }

    public function orders()
    {
        $aut = User::where('id', session()->get('logged'))->first();
        return view('user.orders', compact('aut'));
    }




    public function register(Request $req)
    {
        $users = User::orderby('id', 'DESC')->first();
        $emailcheck = User::where('email', $req->email)->first();
        if ($req->password == $req->conpassword && empty($emailcheck)) {

            if (!empty($users)) {

                $id = $users->id + 1;
            } else {
                $id = 1;
            }
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => 2,
                'lastname' => $req->lastname,
                'country' => $req->country,
                'day' => $req->day,
                'mounth' => $req->mounth,
                'year' => $req->year
            ]);
            $req->session()->put('logged', $id);
            return redirect('/');
        }
        if ($req->password != $req->conpassword) {
            return redirect()->back()->with('confpass', 'Passwords dont mutch');
        }
        if (!empty($emailcheck)) {
            return redirect()->back()->with('confemail', 'Email already exist');
        }
    }

    public function subscribe(Request $req)
    {
        $user = Subscribe::create([
            'email' => $req->mail,
        ]);
        $req->session()->put('Registred', $req->mail);
        return redirect()->back();
    }

    public function login(Request $req)
    {
        $cheks = User::where('email', $req->email)->first();
        if (!empty($cheks) && Hash::check($req->password, $cheks->password)) {
            $req->session()->put('logged', $cheks->id);
            return redirect('/');
        } else {
            return redirect()->back()->with('conflogin', 'البريد غير موجود');
        }
    }

    public function editpassword(Request $req)
    {
        $auth = User::where('id', session()->get('logged'))->first();
        if (!empty($auth) && Hash::check($req->oldpwd, $auth->password)) {
            if ($req->newpwd == $req->confirmNewPwd) {
                $users = User::where('id', $auth->id)->update([
                    'password' => Hash::make($req->newpwd)
                ]);
                toastr()->info('Password edited seccussfully');
                return redirect()->back();
            } else {
                toastr()->error('New password do not match password confirmation');
                return redirect()->back();
            }
        } else {
            toastr()->error('Old password do not match this account');
            return redirect()->back();
        }
    }

    public function edit(Request $req)
    {

        $auth = User::where('id', session()->get('logged'))->first();
        $users = User::where('id', $auth->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'lastname' => $req->lastname,
            'phone' => $req->phone,
            'country' => $req->country,
            'day' => $req->day,
            'mounth' => $req->mounth,
            'year' => $req->year
        ]);
        toastr()->info('Informations edited seccussfully');
        return redirect()->back();
    }

    public function delete(Request $req)
    {

        $users = User::where('id', $req->id)->firstOrFail();
        $users->delete();
        toastr()->error('User is deleted seccussfully');
        return redirect()->back();
    }

    public function logout(Request $req)
    {
        $req->session()->forget('logged');
        return redirect('/');
    }


    public function saveAddress(Request $request)
    {
        $auth = User::where('id', session()->get('logged'))->first();
        $address  = Address::where("user_id", $auth->id)->first();
        if ($address != null) {
            $address->delete();
        }
        $address = Address::create([
            'user_id' => $auth->id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,

        ]);
        toastr()->success('Address is saved seccussfully');
        return redirect()->back();
    }
}
