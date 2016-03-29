<?php
/**
 * Created by PhpStorm.
 * User: nosurino
 * Date: 3/23/2016
 * Time: 2:53 PM
 */

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === false) {
            return view('login.login');
        } else {
            return redirect('dashboard');
        }

    }

    public function isLogin()
    {
        $isLogin = false;
        if (session::get('isLogin') === true) {
            $isLogin = true;
        }
        return $isLogin;
    }

    public function checkLogin(Request $request)
    {
        $admUsername = $request->input('Adm_Username');
        $admPassword = $request->input('Adm_Password');
        $adminModel = new Admin();
        $dataAdmin = $adminModel->checkLogin($admUsername, $admPassword);
        if (empty($dataAdmin) === false) {
            session(
                [
                    'isLogin' => true,
                    'dataAdmin' => $dataAdmin
                ]
            );
            return redirect('dashboard');
        } else {
            session::flash('message', 'Username dan Password salah !');
            return redirect('/');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

}