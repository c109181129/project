<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\shop\Entity\Merchandise;

class UserAuthController extends Controller
{
    public function Login()
    {
        $binding = [
        'title' => '登入頁面'
        ];
        return view('auth.login',$binding);
        
    }

    public function Home()
    {

        // 每頁資料量
        $row_per_page = 10;
        // 撈取商品分頁資料
        $MerchandisePaginate = Merchandise::OrderBy('created_at', 'desc')
            ->paginate($row_per_page);

        // 設定商品圖片網址
        foreach ($MerchandisePaginate as &$Merchandise) {
            if (!is_null($Merchandise->photo)) {
                // 設定商品照片網址
                $Merchandise->photo = url($Merchandise->photo);
            }
        }

        $binding = [
            'title' => '綠盾塗料',
            'MerchandisePaginate'=> $MerchandisePaginate,
        ];

        // dd($MerchandisePaginate);


        return view('auth.home',$binding);
        
    }

    public function SignOut()
    {
        session()->forget('user_id');
        // session()->forget('user_id');
        session()->flush();
        return redirect('/user/auth/login');
    }

    public function LoginProcess()
    {
        $form_data = request()->all();
        //dd($form_data);
        $user = User::where('email', $form_data['email'])->FirstOrFail();
        if (Hash::check($form_data['password'], $user->password)){
            echo '登入成功'; 
            session()->put('user_id', $user->id);
            session()->put('user_email',$user->email);
            session()->put('user_type',$user->type);
            return redirect('/user/auth/home');
        }else{
            echo '登入失敗';
            return redirect('/user/auth/login')
            ->withInput()
            ->withErrors(['無此帳號','帳號密碼錯誤']);
        }
        // $form_data = request()->all();
        // dd($form_data);
    }

    public function Signup()
    {
        $binding = [
            "title" => '註冊頁面'
        ];
        return view('auth.signup',$binding);
    }

    public function SignupProcess()
    {
        $form_data = request()->all();
        if ($form_data['password'] == '' || $form_data['email'] == '' || $form_data['nickname'] == '') {
            return redirect('/user/auth/signup')
            ->withInput()
            ->withErrors(['資料不齊全','請檢查表單']);
        }else{
            #判斷帳號是否存在
            $user = User::where('email', $form_data['email'])->first();
            if (!is_null($user)) {
                return redirect('/user/auth/signup')
                ->withInput()
                ->withErrors(['此帳號已被註冊','請更換帳號']);
            }
            $user = User::create([
                'email' => $form_data['email'],
                'password' => Hash::make($form_data['password']),
                'type' => $form_data['type'],
                'nickname' => $form_data['nickname'],
            ]);

            Mail::send('email.signUpEmailNotification', 
            ['nickname' => $form_data['nickname']], 
            function($message) use ($form_data) {
                $message->to($form_data['email'], $form_data['nickname'])
                ->from('a0984026880@gmail.com')
                ->subject('恭喜');
            });

        //dd($user);
            return redirect('/user/auth/home');
        }
    }
}