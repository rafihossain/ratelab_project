<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class ReportController extends BaseController
{
    public function user_login_history()
    {
    	$reportModel = new ReportModel();
    	$report=$reportModel->orderBy('id', 'DESC')->findAll();
        $data['all_report']=$report;

        // echo $this->db->getLastQuery();  

        // echo '<pre>'; print_r($data['all_report']); die();


        // foreach($report as $row){
        	  
        //       $time=$row->last_login;
        //       $cuurent_time=strtotime(date('Y-m-d h:i:s'));
        // }
        // die();
        
        return view('admin/report/login_history.php',$data);
    }

    public function userEmailHistory()
    {   
        return view('admin/report/email_history.php');
    }
}
