<?php

namespace App\Controllers;
use App\Models\SettingsModel;
use App\Models\CompanyModel;
use App\Models\UserModel;
use App\Models\FrontendSettingsModel;
use App\Models\ChooseReasonModel;
use App\Models\CategoryModel;
use App\Models\CtaModel;
use App\Models\TestimonialItemModel;
use App\Models\CompanyReviewsModel;
use App\Models\BlogModel;
use App\Models\NewPageModel;


class Home extends BaseController
{
    public function __construct()
    {
        helper('category_helper');
        helper('whychooseus_helper');
        helper('review_helper');
        helper('cta_helper');
        helper('testimonial_helper');
        helper('blog_helper');
    }

    public function index()
    {
        $setting = new SettingsModel();
        $seomanager = $setting->where('group_name', 'Seo Manager')->findAll();
        // echo "<pre>"; print_r($seomanager); die();
        $data['seomanager'] = [
            'meta_keywords' => $seomanager[0]->settings_value,
            'meta_description' => $seomanager[1]->settings_value,
            'social_title' => $seomanager[2]->settings_value,
            'social_description' => $seomanager[3]->settings_value,
            'image' => $seomanager[4]->settings_value
        ];


        $general_settings = $setting->where('group_name', 'General Setting')->findAll();
        $data['general'] = [
            'site_title' => $general_settings[0]->settings_value,
        ];


        $logoandfav = $setting->where('group_name', 'Logo and favicon')->findAll();
        $data['logoandfav'] = [
            'logo' => $logoandfav[0]->settings_value,
            'favicon' => $logoandfav[1]->settings_value,
        ];


        $setting = new SettingsModel();
        $extensions = $setting->where('group_name', 'extensions')->findAll();
        $data['tawkto'] = json_decode($extensions[0]->settings_value, true);
        // echo "<pre>"; print_r($data['recaptcha']); die();


        $frontsetting = new FrontendSettingsModel();
        $banner = $frontsetting->where('group_name', 'banner_section')->findAll();
        $data['banner'] = [
            'heading' => $banner[0]['settings_value'],
            'subheading' => $banner[1]['settings_value'],
            'image' => $banner[2]['settings_value'],
        ];


        $data['category'] = $frontsetting->where('group_name', 'category_section')->findAll();
        $categorymodel = new CategoryModel();
        $data['categorymodel'] = $categorymodel->findAll();

        
        $whychooseus = $frontsetting->where('group_name', 'why_choose_us')->findAll();
        $crmodel = new ChooseReasonModel();
        $data['chooseuscontent'] = $crmodel->findAll();
        $data['chooseushead'] = [
            'heading' => $whychooseus[0]['settings_value'],
            'subheading' => $whychooseus[1]['settings_value'],
        ];


        $ctasection = $frontsetting->where('group_name', 'cta_section')->findAll();
        $ctamodel = new CtaModel();
        $data['ctacontents'] = $ctamodel->findAll();
        
        $data['ctasectionhead'] = [
            'heading' => $ctasection[0]['settings_value'],
            'subheading' => $ctasection[1]['settings_value'],
        ];


        $testimonial = $frontsetting->where('group_name', 'testimonial')->findAll();
        $titemmodel = new TestimonialItemModel();
        $data['titemcontents'] = $titemmodel->findAll();
        // echo "<pre>"; print_r($data['titemcontents']); die();
        
        $data['titemhead'] = [
            'heading' => $testimonial[0]['settings_value'],
            'subheading' => $testimonial[1]['settings_value'],
            'image' => $testimonial[2]['settings_value'],
        ];


        //Reviews---------------------
        $builder = $this->db->table('company_reviews');
        $builder->select('company_reviews.*,tbl_users.first_name,tbl_users.last_name,companies.company_name,tbl_user_details.user_image');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = company_reviews.user_id');
        $builder->join('companies', 'companies.id = company_reviews.	company_id');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = company_reviews.	user_id');
        $query = $builder->get();
        $data['all_reviews']=$query->getResult();

        //Page------------------
        $page = new NewPageModel();
        $data['section'] = $page->where('id', 1)->first();

        //Get review heading--------------------
        $data['review_heading']=$frontsetting->where('group_name', 'review')->findAll();

        //blog section------------------
        $data['blog_section']=$frontsetting->where('group_name', 'blog_section')->findAll();
       
        $blog=new BlogModel();
        $data['blog']=$blog->findAll();

        //Footer-----------------------
        $data['footer_section']=$frontsetting->where('group_name', 'footer_section')->findAll();
      
        //Theme Load---------------------------------------------
        $manage_templates= $frontsetting->where('group_name', 'manage_templates')->find();

        //   echo '<pre>';
        // print_r($manage_templates[0]['settings_value']);
        // die();

        if($manage_templates[0]['settings_value'] == 'theme1')
        {

            return view('frontend/forntend_layout', $data);
        }



        //return view('welcome_message');
    }
    
    public function dashboard(){
        $company = new CompanyModel();
        $user = new UserModel();

        $totalcompany = $company->findAll();
        $data['totalcompany'] = count($totalcompany);

        $approvedcompany = $company->where('status', 1)->findAll();
        $data['approvedcompany'] = count($approvedcompany);

        $pendingcompany = $company->where('status', 0)->findAll();
        $data['pendingcompany'] = count($pendingcompany);
        
        $rejectcompany = $company->where('status', 2)->findAll();
        $data['rejectcompany'] = count($rejectcompany);
        
        $totaluser = $user->findAll();
        $data['totaluser'] = count($totaluser);
        
        $activeuser = $user->where('status', 0)->findAll();
        $data['activeuser'] = count($activeuser);
        
        $emailunverified = $user->where('email_verification', 1)->findAll();
        $data['emailunverified'] = count($emailunverified);
        
        $smsunverified = $user->where('sms_verification', 1)->findAll();
        $data['smsunverified'] = count($smsunverified);
        
        // echo "<pre>"; print_r($data); die();

        return view('admin/home/home', $data);
    }
}
