<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;
use App\Models\NotificationModel;

class AdminController extends BaseController
{
    public function __construct()
    {

    }

    public function adminLogin()
    {
        $user = new UserModel();
        $data = [
            'request' => $this->request,
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('adminLogin')) {
                $data['validation'] = $this->validator;
            } else {
                $info = $this->request->getVar();

                $email = $info['admin_email'];
                $getUser = $user->where(['email_address' => $email])->first();

                if($getUser){
                    $checkPassword = password_verify($info['admin_pass'], $getUser->user_password);
                    if (get_cookie('login') && !$getUser) {
                        $rememberkey = $this->request->getVar('password');
                        $getUser = $user->where(['email' => $email, 'rememberkey' => $rememberkey])->first();
                    }
                    if($checkPassword){
                        $session_data = [
                            'userId' => $getUser->tbl_user_id,
                            'name' => $getUser->first_name.' '.$getUser->last_name,
                            'type' => $getUser->user_type,
                            'isLoggedIn' => true,
                        ];

                        $this->session->set($session_data);
                        $this->setCookie($getUser, $user);

                   

                        return redirect()->to(base_url('home'));
                    }else{
                        $data['error'] = "<div class='alert alert-warning text-center'>Password didn't match!!</div>";
                    }
                }else{
                    $data['error'] = "<div class='alert alert-warning text-center'>Username didn't match!!</div>";
                }
                
            }
        }

        $getCookie = get_cookie('login');
        if ($getCookie != '') {
            $showGetCookie = base64_decode($getCookie);
            $cookieArray =  explode('|', $showGetCookie);

            $chookieCheck = $user->where(['email' => $cookieArray[0], 'rememberkey' => $cookieArray[1]])->first();

            if ($chookieCheck) {
                $data['email'] = $chookieCheck['email'];
                $data['rememberkey'] = $chookieCheck['rememberkey'];
            }
        }

        return view('admin/login/login', $data);
    }

    protected function setCookie($getUser, $user)
    {
        $remCheck = $this->request->getVar('remember');
        if ($remCheck) {

            $test['rememberkey'] = random_string('alnum', 40);
            $id = $getUser['id'];

            $user->update($id, $test);

            $cookie = [
                'name'          => 'login',
                'value'         => base64_encode($getUser['email'] . '|' . $test['rememberkey']),
                'expire'        => time() + 86500 * 30,
                'domain'        => '',
                'path'          => '/',
                'prefix'        => '',
                'secure'        => false,
                'httpOnly'      => false,
                'sameSite'      => '',
            ];
            set_cookie($cookie);
        }
    }
    public function adminLogout()
    {
        $remove_session = [
            'userId', 'name', 'isLoggedIn', 'type'
        ];
        $this->session->remove($remove_session);
        $this->session->destroy();

        return redirect()->to(base_url('admin/login'));
    }

    public function forgotPass()  
    {
        $data = array();
        $user = new UserModel();
        $notification = new NotificationModel();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('forgotValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $info = $this->request->getVar(); 
                $getUser = $user->where('email_address', $info['admin_email'])->first();

                if ($getUser) {
                    $id = $getUser->tbl_user_id;
                    $token = random_string('alnum', 8);
                    $passToken = [
                        'password_reset_token' => $token,
                    ];
                    $user->where('tbl_user_id', $id)->set($passToken)->update();
                    $getNotification = $notification->where('id', 2)->first();

                    $change = ["{app_name}"];
                    $changeTo = ["RS Property"];
                    echo $emailSubject = str_replace($change, $changeTo, $getNotification->mail_sub);

                    echo $link = base_url() . '/admin/reset_pass/' . $token;
                    $source = ["{receiver_name}", "{app_name}", "{link}"];
                    $dist = [$getUser->first_name.' '.$getUser->last_name, "RS Property", $link];
                    echo $emailBody = str_replace($source, $dist, $getNotification->mail_body);
                    die();
                    $email = $getUser->email_address;

                    rs_send_email($email, $emailSubject, $emailBody);
                    
                    $data['success'] = '<div class="alert alert-success text-center">We are sending password reset link to your email please check!</div>';
                } else {
                    $data['error'] = '<div class="alert alert-warning text-center">Email Does Not Match!</div>';
                }
            }
        }
        return view('admin/login/forgot-pass', $data);
    }

    public function resetPass($userToken)
    {
        // echo 'hii';
        // die();
        $user = new UserModel();
        $getToken = $user->where('password_reset_token', $userToken)->first();

        $data['token'] = $userToken;

        if ($getToken) {
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('resetValidate')) {
                    $data['validation'] = $this->validator;
                } else {
                    $info = $this->request->getVar();
                    
                    $pass = $info['new_password'];
                    $rePass = $info['confirm_pass'];

                    $hashPass = password_hash($pass, PASSWORD_BCRYPT);

                    if (strlen($pass == $rePass)) {
                        $passUpdate = [
                            'user_password' => $hashPass,
                            'password_reset_token' => '',
                        ];

                        $user->where('password_reset_token', $userToken)
                            ->set($passUpdate)
                            ->update();

                        $data['success'] = '<div class="alert alert-success text-center">Password update successfully!</div>';
                    } else {
                        $data['error'] = '<div class="alert alert-warning text-center">Password and confirm password does not match!</div>';
                    }
                }
            }
            return view('admin/login/reset-pass', $data);
        } else {
            $data['invalidToken'] = '<div class="alert alert-warning text-center">Invalid Token!</div>';
            return view('admin/login/invalid-token', $data);
        }
    }


  

}
