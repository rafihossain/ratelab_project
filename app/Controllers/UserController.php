<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserDetailsModel;
use App\Models\ReportModel;
use App\Models\FrontendSettingsModel;

class UserController extends BaseController
{
    public function login()
    {
        $userModel = new UserModel();
        $datas = array();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('UserLoginValidate')) {
                $datas['validation'] = $this->validator;
            } else {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $match_pass = password_hash($password, PASSWORD_BCRYPT);

                $users = $userModel->where('email_address', $email)->first();
                // echo '<pre>';
                // print_r($users);
                // die();
                $data['users'] = $users;
                if ((!empty($users)) && password_verify($password, $users->user_password) && ($email == $users->email_address)) {


                    // $session_data['login_info']=[
                    //     'email'=>$email,
                    //     'password'=>$match_pass,
                    //     'loggedIn' => 'login',
                    //     'name'=>$users->first_name,
                    //   	'username'=>$users->user_name,
                    //  ];


                    $reportModel = new ReportModel();

                    // Creating an instance of entity
                    $reportEntity = new \App\Entities\ReportEntitie();


                    $data_two['last_login'] = time();
                    $data_two['user_name'] = $users->user_name;
                    $data_two['windows_os'] = $_SERVER['HTTP_USER_AGENT'];
                    $data_two['ip_address'] = $_SERVER['SERVER_ADDR'];

                    $reportEntity->fill($data_two); //here use entity class

                    $reportModel->save($reportEntity);


                    //$this->session->set($session_data);

                    //return view('frontend/user/usser_profile',$data);
                    return redirect()->to(base_url('/user/user-profile/' . $users->tbl_user_id));
                } else {
                    return redirect()->to(base_url('/user/login'))->with('success', 'Sorry! emails or password are incorrect');
                }
            }
        }
        return view('frontend/login', $datas);
    }

    public function registration()
    {
        $datas = array();
        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('UserRegistrationValidate')) {
                // echo 'hii';
                // die();
                $datas['validation'] = $this->validator;
                // echo '<pre>';
                // print_r( $datas);
            } else {
                // Creating an instance of modal
                $userModel = new UserModel();
                $userDetailsModel = new UserDetailsModel();

                // Creating an instance of entity
                $user = new \App\Entities\User();
                $userdetails = new \App\Entities\UserDetailsEntitie();

                $password = $this->request->getVar('password');
                $datas['first_name'] = $this->request->getVar('first_name');
                $datas['last_name'] = $this->request->getVar('last_name');
                $datas['email_address'] = $this->request->getVar('email');
                $datas['user_name'] = $this->request->getVar('user_name');
                $datas['phone_number'] = $this->request->getVar('phone_number');
                $datas['user_password'] = password_hash($password, PASSWORD_BCRYPT);

                $datas['user_type'] = 1;
                // echo '<pre>';
                // print_r($datas);
                // die();
                $datas1['user_country'] = $this->request->getVar('country');


                $user->fill($datas); //here use entity class
                $userModel->save($user);
                $user_id = $userModel->getInsertID();
                $id = $user_id;
                $datas1['user_id'] = $user_id;
                $userdetails->fill($datas1);
                $userDetailsModel->save($userdetails);



                //for login history-------------
                $reportModel = new ReportModel();

                // Creating an instance of entity
                $reportEntity = new \App\Entities\ReportEntitie();


                $data_two['last_login'] = time();
                $data_two['user_name'] = $datas['user_name'];
                $data_two['windows_os'] = $_SERVER['HTTP_USER_AGENT'];
                $data_two['ip_address'] = $_SERVER['SERVER_ADDR'];

                $reportEntity->fill($data_two); //here use entity class

                $reportModel->save($reportEntity);


                // $session_data['login_info']=[
                //         'email'=>$datas['email_address'], 
                //         'loggedIn' => 'login',
                //       	'username'=>$datas['user_name'],
                //      ];


                //$this->session->set($session_data);
                return redirect()->to(base_url('/user/user-profile/' . $id));
            }
        }
        return view('frontend/registration', $datas);
    }

    public function ratelab($id)
    {
        // echo $id;
        // die();
        $userModel = new UserModel();
        $userDetailsModel = new UserDetailsModel();

        $datas = array();
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('userProfileValidate')) {

                $datas['validation'] = $this->validator;
            } 
            else 
            {
                $image = $this->request->getFile('image');
                $old_image=$this->request->getVar('old_image');
                
                //  echo '<pre>';
                // print_r($image);
                // echo $old_image;
                // die();
    
                if($image != '')
                { 

                    if(!empty($old_image))
                    {
                        unlink('./frontend/images/users/'.$old_image);
                    }
                    $newNameBanner = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/frontend/images/users', $newNameBanner);
                 
                    $datas_new['user_image']=$newNameBanner;
                }
                else
                {
                    $datas_new['user_image']=$old_image;
                }

                $datas['first_name'] = $this->request->getVar('first_name');
                $datas['last_name'] = $this->request->getVar('last_name');
                $datas['phone_number'] = $this->request->getVar('phone_number');
                $datas['email_address'] = $this->request->getVar('email');


                $datas_new['user_address'] = $this->request->getVar('address');
                $datas_new['user_state'] = $this->request->getVar('state');
                $datas_new['zip_code'] = $this->request->getVar('zip_code');
                $datas_new['user_about'] = $this->request->getVar('user_about');
                $datas_new['user_country'] = $this->request->getVar('country');
                $datas_new['user_city'] = $this->request->getVar('city');

                $update = $userModel->where('tbl_user_id', $id)->set($datas)->update();
                $userDetailsModel->where('user_id', $id)->set($datas_new)->update();
            }
        }


        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('tbl_user_id', $id);
        $query = $builder->get();
        $user = $query->getResult();
        $datas['users'] = $user;

       
        //$this->session->destroy();   
        $session_data['login_info'] = [
            'email' => $user[0]->email_address,
            'name' => $user[0]->first_name . ' ' . $user[0]->last_name,
            'loggedIn' => 'login',
            'username' => $user[0]->user_name,
            'user_id' => $user[0]->tbl_user_id,
        ];
        //  echo '<pre>';
        //  print_r($datas);
        //  die();
        $this->session->set($session_data);

          //Footer-----------------------
          $frontsetting = new FrontendSettingsModel();
          $datas['footer_section']=$frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/user/usser_profile', $datas);
    }

    public function  user_logout()
    {
        //$this->session = \Config\Services::session();
        // $session_data= $this->session->get('login_info');

        //      echo '<pre>';
        //     print_r($session_data);
        //     die();
        //    if($session_data['email'])
        //    {
        $this->session->destroy();
        return redirect()->to(base_url('/user/login'));

        // }
    }

    //Admin Panel----------------------

    public function all_users()
    {
        // $userModel = new UserModel();
        // $data['all_user']=$userModel->findAll();
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $query = $builder->get();
        $data['all_user'] = $query->getResult();
        // echo '<pre>';
        // print_r($data);
        // die();
        return view('admin/user/index.php', $data);
    }

    public function user_details($id)
    {
        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('UserDetailsValidate')) {
                $datas['validation'] = $this->validator;
            } else {
                $post = $this->request->getVar();
                // echo "<pre>";
                // print_r($post);
                // die();

                // if (empty($post['status']) && empty($post['email_verification']) && empty($post['sms_verification'])) {
                //     $datas['status'] = 1;
                //     $datas['email_verification'] = 1;
                //     $datas['sms_verification'] = 1;
                // } else {

                //     $datas['status'] = 0;
                //     $datas['email_verification'] = 0;
                //     $datas['sms_verification'] = 0;
                // }



                $datas['first_name'] = $this->request->getVar('first_name');
                $datas['last_name'] = $this->request->getVar('last_name');
                $datas['phone_number'] = $this->request->getVar('phone_number');
                $datas['email_address'] = $this->request->getVar('email');

                $datas['status'] = $this->request->getVar('status');
                $datas['email_verification'] = $this->request->getVar('email_verification');
                $datas['sms_verification'] = $this->request->getVar('sms_verificaton');


                $datas_new['user_address'] = $this->request->getVar('address');
                $datas_new['user_state'] = $this->request->getVar('state');
                $datas_new['zip_code'] = $this->request->getVar('zip_code');
                $datas_new['user_country'] = $this->request->getVar('country');
                $datas_new['user_city'] = $this->request->getVar('city');

                // echo '<pre>';print_r($datas); die();


                $userModel = new UserModel();
                $userDetailsModel = new UserDetailsModel();

                $update = $userModel->where('tbl_user_id', $id)->set($datas)->update();
                $userDetailsModel->where('user_id', $id)->set($datas_new)->update();
            }
        }
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('tbl_user_id', $id);
        $query = $builder->get();
        $datas['users'] = $query->getResult();

        return view('admin/user/user_details.php', $datas);
    }

    public function login_history($id)
    {

        $userModel = new UserModel();
        $reportModel = new ReportModel();

        $user = $userModel->where('tbl_user_id', $id)->first();

        $data['report'] = $reportModel->where('user_name', $user->user_name)->findAll();

        // echo '<pre>'; print_r($data['report']); die();

        return view('admin/user/user_login_history.php', $data);
    }


    public function send_email($id)
    {
        $userModel = new UserModel();
        $user = $userModel->where('tbl_user_id', $id)->first();
        $data['user'] = $user;

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('sendEmailValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $mail_subject = $this->request->getVar('subject');
                $mail_body = $this->request->getVar('message');


                $mail_to = $user->email_address;

                $abc = rs_send_email($mail_to, $mail_subject, $mail_body);

                echo '<pre>';
                print_r($abc);
                die();
            }
        }

        return view('admin/user/user_send_mail.php', $data);
    }

    public function active_users()
    {
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('status', 0);
        $query = $builder->get();
        $data['users'] = $query->getResult();

        //$data['user']=$userModel->where('status',1)->findAll();

        return view('admin/user/active_user.php', $data);
    }

    public function banned_users()
    {
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('status', 1);
        $query = $builder->get();
        $data['banned_users'] = $query->getResult();

        return view('admin/user/banned_users.php', $data);
    }

    public function email_unverified()
    {
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('email_verification', 1);
        $query = $builder->get();
        $data['email_unverified'] = $query->getResult();

        return view('admin/user/email_unverified.php', $data);
    }

    public function sms_unverified()
    {
        $builder = $this->db->table('tbl_users');
        $builder->select('*');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = tbl_users.tbl_user_id');
        $builder->where('sms_verification', 1);
        $query = $builder->get();
        $data['sms_unverified'] = $query->getResult();

        return view('admin/user/sms_unverified.php', $data);
    }

    public function send_email_all()
    {
        $data = array();
        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('sendEmailValidate')) {
                $data['validation'] = $this->validator;
            } else {


                $userModel = new UserModel();
                $user = $userModel->findAll();

                $mail_subject = $this->request->getVar('subject');
                $mail_body = $this->request->getVar('message');

                foreach ($user as $key => $row) {
                    if ($key == 0) {
                        $single_email = $row->email_address;
                    } else {
                        $email_to[] = $row->email_address;
                    }
                }

                $abc = rs_send_email($email_to, $mail_subject, $mail_body, $single_email);
                echo '<pre>';
                print_r($abc);
                die();
            }
        }

        return view('admin/user/send_email_all.php', $data);
    }
}
