<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {

     // Creating an instance of modal
     $categoryModel = new CategoryModel(); 
          
     $data=array();   
     if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('CategoryValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('category_name'),
                        'msg2' => $validation->getError('category_icon'),
                    ];
                  
                return $this->response->setJSON($response);
            } 
            else
             {	
                 $data['category_name']=$this->request->getVar('category_name');
                 $data['category_icon']=$this->request->getVar('category_icon');
                
               

                // Creating an instance of entity
                $category = new \App\Entities\CategoryEntitie();


                $category->fill($data);//here use entity class

                $categoryModel->save($category);

                 $response = [
                            'success' => true,
                            'message'=>'successfully Inserted!'
                        ];
                       
                return $this->response->setJSON($response);   
             }
         }

       $data['all_category']=$categoryModel->findAll();   

      return view('admin/category/index.php',$data);
    }

    public function edit()
    {
        $categoryModel = new CategoryModel(); 

            if($this->request->getMethod() == 'post')
           {

            $category_id=$this->request->getVar('id');
            $result=$categoryModel->find($category_id);
            $category_name=$this->request->getVar('category_name');
            $category_icon=$this->request->getVar('category_icon');
            $status=$this->request->getVar('status');

            if(($result->category_name == $category_name) && ($result->category_icon == $category_icon))
            {
                 $datas['category_name']=$this->request->getVar('category_name');
                 $datas['category_icon']=$this->request->getVar('category_icon');

                 if(empty($status)){
                     echo 'hi';
                     die();
                    $datas['status']=1;
                 }
                 else
                 {
                    echo $status;
                    die();
                    $datas['status']=0;
                 }   
                 
                 $categoryModel->update($category_id,$datas);

                 $response = [
                        'success' => true,
                        'message'=>'successfully Updated!'
                    ];
                       
                return $this->response->setJSON($response);   
            }
            else if(($result->category_name != $category_name) && ($result->category_icon == $category_icon))
            {

                 if (!$this->validate('CategoryValidate1')) 
                    {
             
                        $validation = $this->validator;
                     
                        $response = [
                                'success' => false,
                                'msg1' => $validation->getError('category_name'),
                            ];
                          
                        return $this->response->setJSON($response);
                    }
                    else
                    {
                     $datas['category_name']=$this->request->getVar('category_name');
                     $datas['category_icon']=$this->request->getVar('category_icon');
                      if(empty($status)){
                        $datas['status']=1;
                         }
                         else
                         {
                            $datas['status']=0;
                         } 

                     $categoryModel->update($category_id,$datas);

                     $response = [
                            'success' => true,
                            'message'=>'successfully Updated!'
                        ];
                           
                    return $this->response->setJSON($response); 
                }  
            }
            else if(($result->category_name == $category_name) && ($result->category_icon != $category_icon))
            {

                 if (!$this->validate('CategoryValidate2')) 
                    {
             
                        $validation = $this->validator;
                     
                        $response = [
                                'success' => false,
                                'msg2' => $validation->getError('category_icon'),
                            ];
                          
                        return $this->response->setJSON($response);
                    }
                    else
                    {
                     $datas['category_name']=$this->request->getVar('category_name');
                     $datas['category_icon']=$this->request->getVar('category_icon');
                      if(empty($status)){
                        $datas['status']=1;
                     }
                     else
                     {
                        $datas['status']=0;
                     } 

                     $categoryModel->update($category_id,$datas);

                     $response = [
                            'success' => true,
                            'message'=>'successfully Updated!'
                        ];
                           
                    return $this->response->setJSON($response); 
                }  
            }
            else
            {
                  if (!$this->validate('CategoryValidate')) 
                    {
             
                        $validation = $this->validator;
                     
                        $response = [
                                'success' => false,
                                'msg1' => $validation->getError('category_name'),
                                'msg2' => $validation->getError('category_icon'),
                            ];
                          
                        return $this->response->setJSON($response);
                    }
                    else
                    {
                        $datas_two['category_name']=$this->request->getVar('category_name');
                        $datas_two['category_icon']=$this->request->getVar('category_icon');

                         if(empty($status)){
                              $datas_two['status']=1;
                             }
                             else
                             {
                                $datas_two['status']=0;
                             } 

                          $categoryModel->update($category_id,$datas_two);

                        $response = [
                        'success' => true,
                        'message'=>'successfully Updated!'
                            ];
                               
                        return $this->response->setJSON($response);   
                    }
            }

         }


        $id=$this->request->getVar('cat_id');    
        $data= $categoryModel->find($id);
        echo json_encode($data);
    }
}
