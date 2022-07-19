<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\ChooseReasonModel;
use App\Models\ContacttItemModel;
use App\Models\CtaModel;
use App\Models\FaqModel;
use App\Models\PolicyPageModel;
use App\Models\SocialIconModel;
use App\Models\TestimonialItemModel;
use App\Models\NewPageModel;


class ManageController extends BaseController
{
    public function create()
    {
        $data=array();
        if($this->request->getMethod() == 'post')
        { 
          
            if (!$this->validate('BlogValidate')) 
            {
                $data['validation'] = $this->validator;
                
            }
            else
            {
                $blogModel = new BlogModel();

                $data['title']=$this->request->getVar('title');
                $data['description']=$this->request->getVar('description');
                
                $blog_image = $this->request->getFile('image_input');
                
                
                if($blog_image != '')
                { 
                    $newNameBlog = $blog_image->getRandomName();
                    $blog_image->move(ROOTPATH . 'public/admin/uploads/blog_section', $newNameBlog);
                
                    $data['image']=$newNameBlog;
                }

                $blogModel->save($data);
                
                return redirect()->to(base_url('admin/frontend/blog_section'))->with('success', 'Blog Insert Successfully');
            }

        }

        return view('admin/blog/create',$data);
    }

    public function delete($id)
    {
        $blogModel = new BlogModel();

        $data=$blogModel->find($id);

        if(file_exists('./admin/uploads/blog_section/'.$data['image']))
        {
            unlink('./admin/uploads/blog_section/'.$data['image']);
        }
        
        $blogModel->where('id', $id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $blogModel = new BlogModel();

        $data['edit_data']=$blogModel->find($id);

        // echo  '<pre>';
        // print_r($data);
        // die();
        return view('admin/blog/edit',$data);
    }

    public function update($id)
    {
        $data=array();
        if($this->request->getMethod() == 'post')
        { 
          
            if (!$this->validate('BlogValidate')) 
            {
                $data['validation'] = $this->validator;
                $blogModel = new BlogModel();

                $data['edit_data']=$blogModel->find($id);
            }
            else
            {
                $blogModel = new BlogModel();

                $data['title']=$this->request->getVar('title');
                $data['description']=$this->request->getVar('description');
                
                $blog_image = $this->request->getFile('image_input');

                $old_image=$this->request->getVar('old_image');
                
                if($blog_image != '')
                { 
                    if(file_exists('./admin/uploads/blog_section/'.$old_image))
                    {

                        unlink('./admin/uploads/blog_section/'.$old_image);
                    }
                    $newNameBlog = $blog_image->getRandomName();
                    $blog_image->move(ROOTPATH . 'public/admin/uploads/blog_section', $newNameBlog);
                
                    $data['image']=$newNameBlog;
                }

                $blogModel->update($id,$data);
                
                return redirect()->to(base_url('admin/frontend/blog_section'))->with('success', 'Blog Successfully Updated');
            }

        }

        return view('admin/blog/edit',$data);
    }

    //Why Choose us section all work----------------------
    public function reason_item_index()
    {
        $reasonModel = new ChooseReasonModel(); 

        $data=$reasonModel->findAll();

        echo json_encode($data);
    }


    public function reason_item_insert()
    { 
        if($this->request->getMethod() == 'post')
           { 
               
               if (!$this->validate('resonitemValidate')) 
               {
        
                   $validation = $this->validator;
                
                   $response = [
                           'success' => false,
                           'msg1' => $validation->getError('title'),
                           'msg2' => $validation->getError('description'),
                       ];
                     
                   return $this->response->setJSON($response);
               } 
            else
            {
                $reasonModel = new ChooseReasonModel(); 

                $data['title']=$this->request->getVar('title');
                $data['description']=$this->request->getVar('description');
                $data['icon']=$this->request->getVar('icon');

                $reasonModel->save($data);

                $response = [
                    'success' => true,
                    'message'=>'successfully Inserted!'
                ];
               
               return $this->response->setJSON($response); 
                
            }

          }
    }

    public function reason_item_delete()
    {
        $reasonModel = new ChooseReasonModel(); 

        $id=$this->request->getVar('id');

        $reasonModel->where('id',$id)->delete();

        echo json_encode('delete');
        
    }

    public function reason_item_edit()
    {
        $reasonModel = new ChooseReasonModel(); 
         $id=$this->request->getVar('id');   
         $data=$reasonModel->where('id',$id)->find();

         echo json_encode($data);
    }

    public function reason_item_update()
    {
        $reasonModel = new ChooseReasonModel(); 
        $id=$this->request->getVar('reason_id');
     
        if($this->request->getMethod() == 'post')
           { 
               
               if (!$this->validate('resonitemValidate')) 
               {
        
                   $validation = $this->validator;
                
                   $response = [
                           'success' => false,
                           'msg1' => $validation->getError('title'),
                           'msg2' => $validation->getError('description'),
                       ];
                     
                   return $this->response->setJSON($response);
               } 
            else
            {

                $data['title']=$this->request->getVar('title');
                $data['description']=$this->request->getVar('description');
                $data['icon']=$this->request->getVar('icon');

                $reasonModel->update($id,$data);

                $response = [
                    'success' => true,
                    'message'=>'successfully Updated!'
                ];
            
                return $this->response->setJSON($response);
           
           
            }

         }
        
    }


    //Contact us section------------------------

    public function contact_item_index()
    {
        $contactModel = new ContacttItemModel();
        $data=$contactModel->findAll();

        echo json_encode($data); 
    }

    public function contact_item_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('contactitemValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('content'),
                    ];
                  
                return $this->response->setJSON($response);
            } 
         else
         {
             $contactModel = new ContacttItemModel(); 

             $data['title']=$this->request->getVar('title');
             $data['content']=$this->request->getVar('content');
             $data['icon']=$this->request->getVar('icon');

             $contactModel->save($data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Inserted!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    public function content_item_delete()
    {
        $contactModel = new ContacttItemModel(); 

        $id=$this->request->getVar('id');
        
        $contactModel->where('id',$id)->delete();

        echo json_encode('delete');
        

    }

    public function content_item_edit()
    {
        $contactModel = new ContacttItemModel();

         $id=$this->request->getVar('id'); 

         $data=$contactModel->where('id',$id)->find();

         echo json_encode($data);
    }

    public function contact_item_update()
    {
        $contactModel = new ContacttItemModel();
        $id=$this->request->getVar('contact_id');

        if($this->request->getMethod() == 'post')
           { 
               
               if (!$this->validate('contactitemValidate')) 
               {
        
                   $validation = $this->validator;
                
                   $response = [
                           'success' => false,
                           'msg1' => $validation->getError('title'),
                           'msg2' => $validation->getError('content'),
                       ];
                     
                   return $this->response->setJSON($response);
               } 
            else
            {

                $data['title']=$this->request->getVar('title');
                $data['content']=$this->request->getVar('content');
                $data['icon']=$this->request->getVar('icon');

                $contactModel->update($id,$data);

                $response = [
                    'success' => true,
                    'message'=>'successfully Updated!'
                ];
            
                return $this->response->setJSON($response);
           
           
            }

         }
    }

    //CTA section-------------------------

    
    public function cta_item_index()
    {
        $ctaModel = new CtaModel();
        $data=$ctaModel->findAll();

        echo json_encode($data); 
    }

    public function cta_item_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('ctaitemValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('description'),
                        'msg3' => $validation->getError('url'),
                        'msg4' => $validation->getError('button_name'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
             $ctaModel = new CtaModel(); 

             $data['title']=$this->request->getVar('title');
             $data['description']=$this->request->getVar('description');
             $data['icon']=$this->request->getVar('icon');
             $data['url']=$this->request->getVar('url');
             $data['button_name']=$this->request->getVar('button_name');

            
             $ctaModel->save($data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Inserted!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    public function cta_item_delete()
    {
        $ctaModel = new CtaModel();  

        $id=$this->request->getVar('id');
        
        $ctaModel->where('id',$id)->delete();

        echo json_encode('delete');
    }

    public function cta_item_edit()
    {
        $ctaModel = new CtaModel(); 

        $id=$this->request->getVar('id'); 

        $data=$ctaModel->where('id',$id)->find();

        echo json_encode($data);  
    }
    

    public function cta_item_update()
    {
        $ctaModel = new CtaModel(); 
        $id=$this->request->getVar('cta_id');

        if($this->request->getMethod() == 'post')
           { 
               
               if (!$this->validate('ctaitemValidate')) 
               {
        
                   $validation = $this->validator;
                
                    
                    $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('description'),
                        'msg3' => $validation->getError('url'),
                        'msg4' => $validation->getError('button_name'),
                    ];
                     
                   return $this->response->setJSON($response);
               } 
            else
            {

                $ctaModel = new CtaModel(); 

                $data['title']=$this->request->getVar('title');
                $data['description']=$this->request->getVar('description');
                $data['icon']=$this->request->getVar('icon');
                $data['url']=$this->request->getVar('url');
                $data['button_name']=$this->request->getVar('button_name');
   
               
                $ctaModel->update($id,$data);
   
                $response = [
                    'success' => true,
                    'message'=>'successfully Updated!'
                ];
               
               return $this->response->setJSON($response); 
           
           
            }

         }
    }

    //Faq section------------------------------

    public function faq_item_index()
    {
        $faqModel = new FaqModel(); 
        $data=$faqModel->findAll();

        echo json_encode($data); 
    }


    public function faq_item_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('faqitemValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('question'),
                        'msg2' => $validation->getError('answer'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
             $faqModel = new FaqModel(); 

             $data['question']=$this->request->getVar('question');
             $data['answer']=$this->request->getVar('answer');
   
             $faqModel->save($data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Inserted!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    public function faq_item_delete()
    {
        $faqModel = new FaqModel();  

        $id=$this->request->getVar('id');
        
        $faqModel->where('id',$id)->delete();

        echo json_encode('delete');
    }

    public function faq_item_edit()
    {
        $faqModel = new FaqModel();  

        $id=$this->request->getVar('id'); 

        $data=$faqModel->where('id',$id)->find();

        echo json_encode($data); 
    }

    public function faq_item_update()
    {
        $ctaModel = new CtaModel(); 
        $id=$this->request->getVar('faq_id');

        if($this->request->getMethod() == 'post')
           { 
               
               if (!$this->validate('faqitemValidate')) 
               {
        
                   $validation = $this->validator;
                
                    
                   $response = [
                    'success' => false,
                    'msg1' => $validation->getError('question'),
                    'msg2' => $validation->getError('answer'),
                   ];

                   return $this->response->setJSON($response);
               } 
            else
            {

                $faqModel = new FaqModel(); 

                $data['question']=$this->request->getVar('question');
                $data['answer']=$this->request->getVar('answer');
    
                $faqModel->update($id,$data);

                $response = [
                    'success' => true,
                    'message'=>'successfully updated!'
                ];
                
                return $this->response->setJSON($response); 
           
           
            }

         }
    }

    //Policy Page section------------------

    public function policy_page_index()
    {
        $policyModel = new PolicyPageModel(); 
        $data=$policyModel->findAll();

        echo json_encode($data); 
    }

    public function policy_page_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('policypageValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('details'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
             $policyModel = new PolicyPageModel(); 

             $data['title']=$this->request->getVar('title');
             $data['details']=$this->request->getVar('details');

             $policyModel->save($data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Inserted!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    public function policy_page_delete()
    {
        $policyModel = new PolicyPageModel(); 

        $id=$this->request->getVar('id');
        
        $policyModel->where('id',$id)->delete();

        echo json_encode('delete');
    }


    public function policy_page_edit()
    {
        $policyModel = new PolicyPageModel(); 

        $id=$this->request->getVar('id'); 

        $data=$policyModel->where('id',$id)->find();

        echo json_encode($data); 
    }

    public function policy_page_update()
    {
        $id=$this->request->getVar('policy_id');

        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('policypageValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('details'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
             $policyModel = new PolicyPageModel(); 

             $data['title']=$this->request->getVar('title');
             $data['details']=$this->request->getVar('details');

     
             $policyModel->update($id,$data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Updated!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    //Social icon-------------------

    public function social_icon_index()
    {
        $socialModel = new SocialIconModel(); 
        $data=$socialModel->findAll();

        echo json_encode($data); 
    }

    public function social_icon_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('socialiconValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('url'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
            $socialModel = new SocialIconModel(); 

             $data['title']=$this->request->getVar('title');
             $data['social_icon']=$this->request->getVar('icon');
             $data['url']=$this->request->getVar('url');

             $socialModel->save($data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Inserted!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    public function social_icon_delete()
    {
        $socialModel = new SocialIconModel(); 

        $id=$this->request->getVar('id');
        
        $socialModel->where('id',$id)->delete();

        echo json_encode('delete');
    }

    public function social_icon_edit()
    {
        $socialModel = new SocialIconModel(); 

        $id=$this->request->getVar('id'); 

        $data=$socialModel->where('id',$id)->find();

        // echo '<pre>';
        // print_r($data);
        // die();

        echo json_encode($data); 
    }

    public function social_icon_update()
    {
        $id=$this->request->getVar('social_id');

        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('socialiconValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('title'),
                        'msg2' => $validation->getError('url'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
            $socialModel = new SocialIconModel(); 

            $data['title']=$this->request->getVar('title');
            $data['social_icon']=$this->request->getVar('icon');
            $data['url']=$this->request->getVar('url');

     
             $socialModel->update($id,$data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Updated!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       } 
    }

    //testimonial section-----------------

    public function testimonial_item_index()
    {
        $testimonialModel = new TestimonialItemModel(); 
        $data=$testimonialModel->findAll();

        echo json_encode($data);
    }

    public function testimonial_item_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('testimonialValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('name'),
                        'msg2' => $validation->getError('address'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
            $testimonialModel = new TestimonialItemModel(); 

             $data['name']=$this->request->getVar('name');
             $data['address']=$this->request->getVar('address');
             $data['quote']=$this->request->getVar('quote');

             $testimonial_image = $this->request->getFile('image');
             

            if($testimonial_image != '')
            { 
                $newNameBlog = $testimonial_image->getRandomName();
                $testimonial_image->move(ROOTPATH . 'public/admin/uploads/testimonial', $newNameBlog);
            
                $data['image']=$newNameBlog;
            }

            $testimonialModel->save($data);
            
            $response = [
                'success' => true,
                'message'=>'successfully inserted!'
            ];
           
           return $this->response->setJSON($response); 
             
         }

       }
    }

    public function testimonial_item_delete(Type $var = null)
    {
        $testimonialModel = new TestimonialItemModel(); 

        $id=$this->request->getVar('id');
         
        $data=$testimonialModel->find($id);

        if(file_exists('./admin/uploads/testimonial/'.$data['image']))
        {
            unlink('./admin/uploads/testimonial/'.$data['image']);
        }

        $testimonialModel->where('id',$id)->delete();

        echo json_encode('delete');
    }

    public function testimonial_item_edit()
    {
        $testimonialModel = new TestimonialItemModel(); 

        $id=$this->request->getVar('id'); 

        $data=$testimonialModel->where('id',$id)->find();

        echo json_encode($data);  
    }

    public function testimonial_item_update()
    {
        $id=$this->request->getVar('testimonial_id');

        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('testimonialValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('name'),
                        'msg2' => $validation->getError('address'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
            $testimonialModel = new TestimonialItemModel(); 

            $data['name']=$this->request->getVar('name');
            $data['address']=$this->request->getVar('address');
            $data['quote']=$this->request->getVar('quote');

            $testimonial_image = $this->request->getFile('image');
            
            $data_new=$testimonialModel->find($id);

           if($testimonial_image != '')
           { 
                if(file_exists('./admin/uploads/testimonial/'.$data_new['image']))
                {
                    unlink('./admin/uploads/testimonial/'.$data_new['image']);
                }
               $newNameBlog = $testimonial_image->getRandomName();
               $testimonial_image->move(ROOTPATH . 'public/admin/uploads/testimonial', $newNameBlog);
           
               $data['image']=$newNameBlog;
           }
           else
           {
             $data['image']=$data_new['image']; 
           }
     
             $testimonialModel->update($id,$data);

             $response = [
                 'success' => true,
                 'message'=>'successfully Updated!'
             ];
            
            return $this->response->setJSON($response); 
             
         }

       }
    }

    //New Pages-----------------------

    public function new_page_insert()
    {
        if($this->request->getMethod() == 'post')
        { 
            
            if (!$this->validate('newpagesValidate')) 
            {
     
                $validation = $this->validator;
             
                $response = [
                        'success' => false,
                        'msg1' => $validation->getError('page_name'),
                        'msg2' => $validation->getError('slug'),
                    ];
      
                return $this->response->setJSON($response);
            } 
         else
         {
            $pageModel = new NewPageModel(); 

             $data['page_name']=$this->request->getVar('page_name');
             $data['slug']=$this->request->getVar('slug');

            $pageModel->save($data);
            
            $response = [
                'success' => true,
                'message'=>'successfully inserted!'
            ];
           
           return $this->response->setJSON($response); 
             
         }

       }
    }

    public function new_page_index()
    {
        $pageModel = new NewPageModel(); 
        $data=$pageModel->findAll();

        echo json_encode($data);
    }

    public function new_page_edit($id)
    {
        $pageModel = new NewPageModel(); 
        $data['pages']=$pageModel->find($id);
 
        if($this->request->getMethod() == 'post')
        { 
       
             $page=$this->request->getVar('secs');
             $data_new['selected_section']=implode(',',$page);

             $pageModel->update($id,$data_new);

             return redirect()->back()->with('success', 'New Page Update Successfully'); 
       } 

    //    echo '<pre>';
    //    print_r($data);
    //    die();
       return view('admin/manage_pages/edit',$data);
    }

}
