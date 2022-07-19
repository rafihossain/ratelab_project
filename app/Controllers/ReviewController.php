<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyReviewsModel;

class ReviewController extends BaseController
{
    public function all_reviews()
    {
       
       

       $builder = $this->db->table('company_reviews');
       $builder->select('company_reviews.*,tbl_users.*,companies.company_name');
       $builder->join('tbl_users', 'tbl_users.tbl_user_id = company_reviews.user_id');
       $builder->join('companies', 'companies.id = company_reviews.company_id');
       $query = $builder->get();
       $data['all_review']=$query->getResult(); 

       // echo '<pre>';
       // print_r($data);
       // die();
       return view('admin/review/index',$data);
    }

    public function review_view()
    {
    	$review_id=$this->request->getVar('review_id');

    	$reviewModel = new CompanyReviewsModel();

        $single_review=$reviewModel->find($review_id);

        echo json_encode($single_review);
    }

    public function delete($id)
    {
    	 $reviewModel = new CompanyReviewsModel();

    	 $reviewModel->where('id', $id)->delete();

    	 echo json_encode('review_deleted');
    }
}
