<?php
#namespace App\Libraries;
// use App\Models\UserModel;
// use App\Models\Thrifttwowinwinner;

class Rs_ratelab{
    var $db;

    public function __construct(){
        $this->db = db_connect();         
    }

    public function all_company()
    {
                  
       $builder = $this->db->table('companies');
       $builder->select('companies.*,categories.category_name,tbl_users.user_name');
       $builder->join('categories', 'categories.id = companies.category_id');
       $builder->join('tbl_users', 'tbl_users.tbl_user_id = companies.user_id');
       $builder->where('companies.status',1);
       $query = $builder->get();
       $datas=$query->getResult();

       return $datas;
    }

    public function all_review_company($data)
    {
        foreach($data as $all_review)
        {
          
          $builder = $this->db->table('companies');
          $builder->select('companies.*,categories.category_name');
          $builder->join('categories', 'categories.id = companies.category_id');
          $builder->where('companies.id', $all_review->company_id);
          $query = $builder->get();
          $data=$query->getResult();

  
           $all_info_review[]= $data[0];
           
        }

        return $all_info_review;
    }

    public function all_support_ticket($User_id)
    {
        //$session_data= $this->session->get('login_info');

        $builder =$this->db->table('support_tickets');
        $builder->select('*');
        $subQuery = $this->db->table('support_tickets')
        ->select('max(support_tickets.id) as id')
        ->Where('user_id', $User_id)
        ->groupBy('ticket_id');
    
        $builder->whereIn('id',$subQuery);
 
        $query = $builder->get();
        $result= $query->getResult();

        return $result;
    }

   
}