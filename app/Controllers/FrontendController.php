<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\SupportTicketModel;
use App\Models\FrontendSettingsModel;
use App\Models\ContacttItemModel;
use App\Models\SettingsModel;

use Gregwar\Captcha\CaptchaBuilder;

class FrontendController extends BaseController
{
    public function blog()
    {
        $blogModel = new BlogModel();

        $data['blog'] = $blogModel->findAll();
        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();
        return view('frontend/blog/blog_page', $data);
    }

    public function blog_details($id)
    {
        $blogModel = new BlogModel();

        //$data['blog']=$blogModel->whereNotIn('id',$id)->findAll();

        $builder = $this->db->table('blogs');
        $subQuery = $this->db->table('blogs')->select('id')->where('id', $id);
        $builder->whereNotIn('id', $subQuery);
        $query = $builder->get();
        $data['blog'] = $query->getResult();

        $data['single_blog'] = $blogModel->find($id);

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/blog/blog_details', $data);
    }

    public function contact()
    {
        
        // echo $_SESSION['phrase'] = $builder->getPhrase();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('contact_us')) {
                $datas['validation'] = $this->validator;
            } else {
                // Creating an instance of modal
                $support_ticketModel = new SupportTicketModel();

                // Creating an instance of entity
                $support_ticket = new \App\Entities\SupportTicketEntitie();

                $data['full_name'] = $this->request->getVar('full_name');
                $data['email_address'] = $this->request->getVar('email_address');
                $data['subject'] = $this->request->getVar('subject');
                $data['message'] = $this->request->getVar('message');
                $data['ticket_id'] = rand(100000, 1000000);

                $userInput = $this->request->getVar('captcha_text');
                echo $userInput;
                echo "<br>";

                // $_SESSION['phrase'] = $builder->getPhrase();

                $builder = new CaptchaBuilder;

                if($builder->testPhrase($userInput)) {
                    // instructions if user phrase is good
                    echo "success"; die();
                }
                else {
                    echo "error"; die();
                    // user phrase is wrong
                    // session()->setFlashdata('error', 'Something goes to wrong');
                }
                    
                // $secret='6Lcc_JcfAAAAACvfe5gvLAaXUE_9Ii1S0X7dUhnu';
                    
                // $credential = array(
                //         'secret' => $secret,
                //         'response' => $this->request->getVar('g-recaptcha-response')
                //     );
            
                // $verify = curl_init();
                // curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                // curl_setopt($verify, CURLOPT_POST, true);
                // curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
                // curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($verify);

                // // echo '<pre>'; print_r($response); die();
            
                // $status= json_decode($response, true);
                    
                // if($status['success']){
                //     $support_ticket->fill($data); //here use entity class
                //     $support_ticketModel->save($support_ticket);
                //     session()->setFlashdata('msg', 'Form has been successfully submitted');
                // }else{
                //     session()->setFlashdata('msg', 'Something goes to wrong');
                // }

                return redirect()->to(base_url('/support/ticket/view/' . $data['ticket_id']));
            }
        }else{
            $builder = new CaptchaBuilder;
            $builder->build();
            $datas['image'] = $builder->inline();
        }


        // echo "<pre>"; print_r($image); die();

        $contact = new ContacttItemModel;
        $datas['all_contact'] = $contact->findAll();

        $frontsetting = new FrontendSettingsModel();
        $datas['contact_heading'] = $frontsetting->where('group_name', 'contact_us')->findAll();

        //Footer-----------------------
        $datas['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        $setting = new SettingsModel();
        $extensions = $setting->where('group_name', 'extensions')->findAll();
        $datas['recaptcha'] = json_decode($extensions[1]->settings_value, true);

        $extensions = $setting->where('group_name', 'extensions')->findAll();
        $data['tawkto'] = json_decode($extensions[0]->settings_value, true);

        // echo "<pre>"; print_r($data['recaptcha']); die();

        return view('frontend/contact/contact', $datas);
    }
}
