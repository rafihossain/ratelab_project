<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\CompanyModel;
use App\Models\UserModel;
use App\Models\CompanyReviewsModel;
use App\Models\FrontendSettingsModel;
use App\Models\AdvertisementModel;

class CompanyController extends BaseController
{
    public function __construct()
    {
        helper('impression_helper');
    }

    public function company_create()
    {
        $datas = array();
        // Creating an instance of modal
        $categoryModel = new CategoryModel();
        $companyModel = new CompanyModel();

        $datas['category'] = $categoryModel->where('status', 0)->findAll();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('companyValidate')) {

                $datas['validation'] = $this->validator;
            } else {

                $data['url'] = $this->request->getVar('company_url');
                $data['company_address'] = $this->request->getVar('company_address');
                $data['company_name'] = $this->request->getVar('company_name');
                $data['category_id'] = $this->request->getVar('categroy_id');
                $data['email_address'] = $this->request->getVar('company_email');
                $data['tags'] = $this->request->getVar('tags');
                $data['description'] = $this->request->getVar('description');


                $file = $this->request->getFile('company_image');
                $newName = $file->getRandomName();

                if ($file != '') {
                    $file->move(ROOTPATH . '\public\frontend\images\company', $newName);
                    $data['image'] = $newName;
                }

                // echo '<pre>';
                // print_r($data);
                // die();
                // Creating an instance of entity
                $company = new \App\Entities\CompanyEntitie();

                $session_data = $this->session->get('login_info');

                $data['user_id'] = $session_data['user_id'];


                //    echo '<pre>';
                // print_r($data);
                // die();

                $company->fill($data); //here use entity class

                $companyModel->save($company);

                return redirect()->to(base_url('user/company/list'));
            }
        }
        $frontsetting = new FrontendSettingsModel();
        $datas['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/company/create', $datas);
    }

    public function company_list()
    {
        $companyModel = new CompanyModel();
        $session_data = $this->session->get('login_info');

        $user_id = $session_data['user_id'];

        $data['all_company'] = $companyModel->where('user_id', $user_id)->findAll();
        // echo '<pre>';
        // print_r($data);
        // die();
        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();
        return view('frontend/company/list', $data);
    }

    public function company_edit($id)
    {

        $categoryModel = new CategoryModel();
        $companyModel = new CompanyModel();

        $data['company'] = $companyModel->find($id);
        $data['category'] = $categoryModel->findAll();

        $datas['url'] = $this->request->getVar('company_url');
        $datas['company_address'] = $this->request->getVar('company_address');
        $datas['company_name'] = $this->request->getVar('company_name');
        $datas['category_id'] = $this->request->getVar('categroy_id');
        $datas['email_address'] = $this->request->getVar('company_email');
        $datas['tags'] = $this->request->getVar('tags');
        $datas['description'] = $this->request->getVar('description');

        $file = $this->request->getFile('company_image');
        $old_image = $this->request->getVar('old_company_image');


        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('company_email');
            $company_name = $this->request->getVar('company_name');

            if (($data['company']->email_address == $email) && ($data['company']->company_name == $company_name)) {


                if (!$this->validate('companyValidate_new')) {

                    $data['validation'] = $this->validator;
                } else {


                    if ($file != '') {
                        if (file_exists('./frontend/images/company/' . $old_image)) {
                            //    echo $old_image;
                            //    die();
                            unlink('./frontend/images/company/' . $old_image);
                        }
                        // echo 'hii';
                        //    die();
                        $newName = $file->getRandomName();
                        $file->move(ROOTPATH . '\public\frontend\images\company', $newName);
                        $datas['image'] = $newName;
                    } else {
                        $datas['image'] = $old_image;
                    }
                    $companyModel->update($id, $datas);
                }
            } else if (($data['company']->email_address == $email) && ($data['company']->company_name != $company_name)) {


                if (!$this->validate('companyValidate_new1')) {

                    $data['validation'] = $this->validator;
                } else {


                    if ($file != '') {
                        if (file_exists('./frontend/images/company/' . $old_image)) {
                            //    echo $old_image;
                            //    die();
                            unlink('./frontend/images/company/' . $old_image);
                        }
                        // echo 'hii';
                        //    die();
                        $newName = $file->getRandomName();
                        $file->move(ROOTPATH . '\public\frontend\images\company', $newName);
                        $datas['image'] = $newName;
                    } else {
                        $datas['image'] = $old_image;
                    }
                    $companyModel->update($id, $datas);
                }
            } else if (($data['company']->email_address != $email) && ($data['company']->company_name == $company_name)) {


                if (!$this->validate('companyValidate_new2')) {

                    $data['validation'] = $this->validator;
                } else {


                    if ($file != '') {
                        if (file_exists('./frontend/images/company/' . $old_image)) {
                            //    echo $old_image;
                            //    die();
                            unlink('./frontend/images/company/' . $old_image);
                        }
                        // echo 'hii';
                        //    die();
                        $newName = $file->getRandomName();
                        $file->move(ROOTPATH . '\public\frontend\images\company', $newName);
                        $datas['image'] = $newName;
                    } else {
                        $datas['image'] = $old_image;
                    }
                    $companyModel->update($id, $datas);
                }
            }
        }



        $data['company'] = $companyModel->find($id);
        $data['category'] = $categoryModel->findAll();

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/company/edit', $data);
    }


    public function company_all()
    {
        $companyModel = new CompanyModel();

        $categoryModel = new CategoryModel();
        $data['all_category'] = $categoryModel->findAll();



        foreach ($data['all_category'] as $all_categories) {
            $builder = $this->db->table('categories');
            $builder->select('companies.*');
            $builder->join('companies', 'companies.category_id=categories.id');
            $builder->where('categories.id', $all_categories->id);
            $builder->where('companies.status', 1);
            $query = $builder->get();
            $abc = $query->getResult();

            $num_of_category[] = count($abc);
        }

        $data['number_of_categories'] = $num_of_category;

        $ads = new AdvertisementModel();
        $data['ads'] = $ads->orderBy('rand()')->findAll();
        //    echo '<pre>'; print_r($data['ads']); die();

        $spc = new \Rs_ratelab();
        $all_company = $spc->all_company();
        $data['all_copany'] = $all_company;

        //    echo '<pre>';
        //    print_r($data);
        //    die();
        //    echo count($data['all_copany']);die();

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/company/all_companies', $data);
    }

    public function company_review($id)
    {



        $companyModel = new CompanyModel();

        $builder = $this->db->table('companies');
        $builder->select('companies.*,tbl_users.*');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
        $builder->where('companies.id', $id);
        $query = $builder->get();
        $data['single_copany'] = $query->getRow();


        $reviewModel = new CompanyReviewsModel();

        $session_data = $this->session->get('login_info');

        if ($this->request->getMethod() == 'post') {


            if (!$this->validate('ratingValidate')) {

                $data['validation'] = $this->validator;
            } else {


                $datas['company_rating'] = $this->request->getVar('rating');
                $datas['company_review'] = $this->request->getVar('reveiw');
                $datas['user_id'] = $session_data['user_id'];
                $datas['company_id'] = $id;


                $reviewModel = new CompanyReviewsModel();

                // Creating an instance of entity
                $company_review = new \App\Entities\CompanyReviewsEntitie();


                $company_review->fill($datas); //here use entity class

                $reviewModel->save($company_review);
            }
        }

        //$data['single_copany']=$companyModel->find($id);




        $data['user_reviews'] = $reviewModel->where('user_id', $session_data['user_id'])->find();

        $builder = $this->db->table('company_reviews');
        $builder->select('company_reviews.*,tbl_users.*,tbl_user_details.user_address');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = company_reviews.user_id');
        $builder->join('tbl_user_details', 'tbl_user_details.user_id = company_reviews.user_id');
        $query = $builder->get();
        $data['all_review'] = $query->getResult();

        // echo '<pre>';
        // print_r($data);
        // die();
        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/company/company_review', $data);
    }

    public function company_review_edit()
    {
        $reviewModel = new CompanyReviewsModel();
        $review_id = $this->request->getVar('review_id');



        if ($this->request->getMethod() == 'post') {


            if (!$this->validate('ratingValidate')) {

                $validation = $this->validator;

                $response = [
                    'success' => false,
                    'msg1' => $validation->getError('rating'),
                    'msg2' => $validation->getError('reveiw'),
                ];

                return $this->response->setJSON($response);
            } else {
                $id = $this->request->getVar('new_review_id');
                // echo $id;
                // die();

                $datas['company_rating'] = $this->request->getVar('rating');
                $datas['company_review'] = $this->request->getVar('reveiw');


                $reviewModel->update($id, $datas);
                // echo $this->db->getLastQuery();
                // die();

                $response = [
                    'success' => true,
                ];

                return $this->response->setJSON($response);
            }
        }





        $data['edit_review'] = $reviewModel->find($review_id);



        echo json_encode($data);
    }

    public function company_review_delete($id)
    {
        $reviewModel = new CompanyReviewsModel();

        $reviewModel->where('id', $id)->delete();

        echo json_encode('review deleted');
    }

    //user panel company search-------------------
    public function company_search()
    {

        $search = $this->request->getVar('search_company');

        $builder = $this->db->table('companies');
        $builder->select('companies.*,categories.category_name');
        $builder->join('categories', 'categories.id = companies.category_id');
        $builder->where('companies.status', 1);
        $builder->like('company_name', $search);
        $query = $builder->get();
        $data = $query->getResult();



        echo json_encode($data);
    }

    public function category_company_search()
    {
        $id = $this->request->getVar('cat_id');

        $builder = $this->db->table('categories');
        $builder->select('companies.*');
        $builder->join('companies', 'companies.category_id=categories.id');
        $builder->where('categories.id', $id);
        $builder->where('companies.status', 1);
        $query = $builder->get();
        $abc = $query->getResult();

        echo json_encode($abc);
    }

    public function review_search()
    {

        // $abc=date("y",strtotime("2022-04-06 09:23:20"));
        // echo $abc;
        // die();
        // echo FCPATH.'../app/Libraries/Rs_ratelabClass.php';
        // die();



        $review = $this->request->getVar('review_id');

        $reviewModel = new CompanyReviewsModel();

        $all = $reviewModel->where('company_rating', $review)->findAll();


        if ($review == 'all') {
            $spc = new \Rs_ratelab();
            $winner = $spc->all_company();


            echo json_encode($winner);
        } else if (!empty($all)) {
            foreach ($all as $all_review) {

                $builder = $this->db->table('companies');
                $builder->select('companies.*,categories.category_name');
                $builder->join('categories', 'categories.id = companies.category_id');
                $builder->where('companies.id', $all_review->company_id);
                $query = $builder->get();
                $data = $query->getResult();


                $all_info_review[] = $data[0];
            }
            echo json_encode($all_info_review);
        } else {
            echo json_encode($all);
        }
    }

    public function review_by_time()
    {
        $review_time = $this->request->getVar('review_month');

        if ($review_time == 'all') {

            $spc = new \Rs_ratelab();
            $winner = $spc->all_company();



            echo json_encode($winner);
        } else if ($review_time == 'last_1') {

            $lastmonth = date("m", strtotime("-1 month"));

            $builder = $this->db->table('company_reviews');
            $builder->select('*');
            $builder->where('month(created_at)', $lastmonth);
            $query = $builder->get();
            $data = $query->getResult();



            $spc = new \Rs_ratelab();
            $winner = $spc->all_review_company($data);

            //   echo '<pre>';
            //   print_r($winner);
            echo json_encode($winner);
        } else if ($review_time == 'last_2') {
            $stat_date = date("Y-m", strtotime("-2 month"));

            $current_month = date("m");
            $current_year = date("Y");

            $start_year = date("Y", strtotime($stat_date));

            $start_month = date("m", strtotime($stat_date));

            $builder = $this->db->table('company_reviews');
            $builder->select('*');
            $builder->where('MONTH(created_at)>=', $start_month);
            $builder->where('YEAR(created_at)>=', $start_year);
            $builder->where('MONTH(created_at)<', $current_month);
            $builder->where('YEAR(created_at)<=', $current_year);

            $query = $builder->get();
            $data = $query->getResult();

            $spc = new \Rs_ratelab();
            $winner = $spc->all_review_company($data);

            //   echo '<pre>';
            //   print_r($winner);
            echo json_encode($winner);
        } else if ($review_time == 'last_3') {
            $stat_date = date("Y-m", strtotime("-3 month"));

            $current_month = date("m");
            $current_year = date("Y");

            $start_year = date("Y", strtotime($stat_date));

            $start_month = date("m", strtotime($stat_date));

            $builder = $this->db->table('company_reviews');
            $builder->select('*');
            $builder->where('MONTH(created_at)>=', $start_month);
            $builder->where('YEAR(created_at)>=', $start_year);
            $builder->where('MONTH(created_at)<', $current_month);
            $builder->where('YEAR(created_at)<=', $current_year);

            $query = $builder->get();
            $data = $query->getResult();

            $spc = new \Rs_ratelab();
            $winner = $spc->all_review_company($data);


            echo json_encode($winner);
        } else if ($review_time == 'last_6') {

            $stat_date = date("Y-m", strtotime("-6 month"));

            $current_month = date("m");
            $current_year = date("Y");

            $start_year = date("Y", strtotime($stat_date));

            $start_month = date("m", strtotime($stat_date));

            $builder = $this->db->table('company_reviews');
            $builder->select('*');
            $builder->where('MONTH(created_at)>=', $start_month);
            $builder->where('YEAR(created_at)>=', $start_year);
            $builder->where('MONTH(created_at)<', $current_month);
            $builder->where('YEAR(created_at)<=', $current_year);

            $query = $builder->get();
            $data = $query->getResult();

            //   echo '<pre>';
            //   print_r($data);
            if (empty($data)) {

                echo json_encode($data);
            } else {
                $spc = new \Rs_ratelab();
                $winner = $spc->all_review_company($data);


                echo json_encode($winner);
            }
        } else if ($review_time == 'last_year') {
            $last_year = date("Y", strtotime("-1 year"));

            $builder = $this->db->table('company_reviews');
            $builder->select('*');
            $builder->where('YEAR(created_at)', $last_year);
            $query = $builder->get();
            $data = $query->getResult();


            $spc = new \Rs_ratelab();
            $winner = $spc->all_review_company($data);

            echo json_encode($winner);
        }
    }

    //Admin Panel Companies part-----------------

    public function all_campanies()
    {
        $companyModel = new CompanyModel();

        $builder = $this->db->table('companies');
        $builder->select('companies.*,categories.category_name,tbl_users.user_name');
        $builder->join('categories', 'categories.id = companies.category_id');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
        $query = $builder->get();
        $data['company_list'] = $query->getResult();



        return view('admin/company/all_company', $data);
    }

    public function campanies_details($id)
    {
        $companyModel = new CompanyModel();
        $userModel = new UserModel();

        $data['details'] = $companyModel->find($id);

        // $builder = $this->db->table('companies');
        // $builder->select('tbl_users.user_name,tbl_users.first_name,tbl_users.last_name');
        // $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
        // $query = $builder->get();
        $data['user'] = $userModel->where('tbl_user_id', $data['details']->user_id)->find();

        // echo '<pre>';
        // print_r($data);
        // die();

        return view('admin/company/details', $data);
    }

    public function campanies_approve($id)
    {
        $companyModel = new CompanyModel();
        $data['status'] = 1;

        $companyModel->update($id, $data);

        echo json_encode('approved');
    }

    public function campanies_reject($id)
    {
        $companyModel = new CompanyModel();
        $data['status'] = 2;

        $companyModel->update($id, $data);

        echo json_encode('rejected');
    }

    public function campanies_pending()
    {
        $companyModel = new CompanyModel();

        //$data['pending_company']=$companyModel->where('status', 0)->findAll();

        $builder = $this->db->table('companies');
        $builder->select('companies.*,categories.category_name');
        $builder->join('categories', 'categories.id = companies.category_id');
        $builder->where('companies.status', 0);
        $query = $builder->get();
        $data['pending_company'] = $query->getResult();

        // echo '<pre>';
        // print_r($data);
        // die();

        return view('admin/company/company_pending', $data);
    }

    public function campanies_approve_list()
    {

        $builder = $this->db->table('companies');
        $builder->select('companies.*,categories.category_name,tbl_users.user_name');
        $builder->join('categories', 'categories.id = companies.category_id');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
        $builder->where('companies.status', 1);
        $query = $builder->get();
        $data['approve_company'] = $query->getResult();




        return view('admin/company/company_approve', $data);
    }


    public function campanies_reject_list()
    {


        $builder = $this->db->table('companies');
        $builder->select('companies.*,categories.category_name,tbl_users.user_name');
        $builder->join('categories', 'categories.id = companies.category_id');
        $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
        $builder->where('companies.status', 2);
        $query = $builder->get();
        $data['reject_company'] = $query->getResult();



        return view('admin/company/company_reject', $data);
    }

    public function companyCategoryList($id)
    {
        $categoryModel = new CategoryModel();
        $data['all_category'] = $categoryModel->where('id', $id)->findAll();

        foreach ($data['all_category'] as $all_categories) {
            $builder = $this->db->table('categories');
            $builder->select('companies.*');
            $builder->join('companies', 'companies.category_id=categories.id');
            $builder->where('categories.id', $all_categories->id);
            $query = $builder->get();
            $abc = $query->getResult();

            $num_of_category[] = count($abc);
            // $num_of_category[] = $abc;
        }

        $data['number_of_categories'] = $num_of_category;
        // echo '<pre>'; print_r($data['number_of_categories']); die();

        $builder = $this->db->table('companies');
        $builder->select('*');
        $builder->join('categories', 'companies.category_id=categories.id');
        $builder->where('category_id', $id);
        $query = $builder->get();
        $data['all_copany'] = $query->getResult();


        $builder = $this->db->table('companies');
        $builder->select('*');
        $builder->join('categories', 'companies.category_id=categories.id');
        $builder->where('category_id', $id);
        $query = $builder->get();
        $data['all_copany'] = $query->getResult();

        // echo '<pre>'; print_r($data['number_of_categories']); die();

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/company/all_companies', $data);
    }
}
