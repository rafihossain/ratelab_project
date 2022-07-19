<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupportTicketModel;
use App\Models\FrontendSettingsModel;

class SupportController extends BaseController
{
    public function new_ticket()
    {
        $datas = array();
        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('supportValidate')) {

                $datas['validation'] = $this->validator;
            } else {

                // Creating an instance of modal
                $support_ticketModel = new SupportTicketModel();

                // Creating an instance of entity
                $support_ticket = new \App\Entities\SupportTicketEntitie();


                $session_data = $this->session->get('login_info');

                $data['full_name'] = $this->request->getVar('full_name');
                $data['user_id'] = $session_data['user_id'];
                $data['priority'] = $this->request->getVar('priority');
                $data['email_address'] = $this->request->getVar('email_address');
                $data['subject'] = $this->request->getVar('subject');
                $data['message'] = $this->request->getVar('message');
                $data['ticket_id'] = rand(100000, 1000000);

                $image =  $this->request->getFileMultiple('attachments');


                if ($image != '') {

                    foreach ($image as $file) {
                        if ($file != '') {
                            $newName = $file->getRandomName();
                            $file->move(ROOTPATH . '\public\frontend\images\ticket', $newName);
                            $data_new[] = $newName;
                        }
                    }
                }

                //$data['attachments']=implode(',',$data_new); 
                if (!empty($data_new)) {
                    $data['attachments'] = implode(',', $data_new);
                }

                $support_ticket->fill($data); //here use entity class

                $support_ticketModel->save($support_ticket);

                return redirect()->to(base_url('/support/ticket'));
            }
        }

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $datas['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/support_ticket/open_suppoet_ticket', $datas);
    }


    public function all_ticket()
    {
        $session_data = $this->session->get('login_info');

        $support_ticketModel = new SupportTicketModel();

        //    $data['all_ticket']=$support_ticketModel->where('user_id',$session_data['user_id'])->findAll();

        //    $builder = $this->db->table('support_tickets');
        //    $builder->where('user_id',$session_data['user_id']);
        //    $builder->groupBy('ticket_id');
        //    $builder->orderBy('id','desc');
        //    $query = $builder->get();
        //    $data['all_ticket']=$query->getResult();

        // $builder =$this->db->table('support_tickets');
        // $builder->select('*');
        // $subQuery = $this->db->table('support_tickets')
        // ->select('max(support_tickets.id) as id')
        // ->Where('user_id', $session_data['user_id'])
        // ->groupBy('ticket_id');

        // $builder->whereIn('id',$subQuery);

        // $query = $builder->get();
        // $data['all_ticket'] = $query->getResult();


        $spc = new \Rs_ratelab();
        $all_ticket = $spc->all_support_ticket($session_data['user_id']);

        $data['all_ticket'] = $all_ticket;




        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/support_ticket/all', $data);
    }


    public function ticket_view($id)
    {

        $support_ticketModel = new SupportTicketModel();



        $ticket_reply = $this->request->getVar('ticket_reply');

        if ($ticket_reply == 'reply') {

            if ($this->request->getMethod() == 'post') {

                if (!$this->validate('replyticketValidate')) {

                    $data['validation'] = $this->validator;
                } else {

                    $result = $support_ticketModel->where('ticket_id', $id)->first();


                    $data_one['status'] = 2;
                    $support_ticketModel->where('ticket_id', $id)->set($data_one)->update();


                    $data_two['full_name'] = $result->full_name;
                    $data_two['user_id'] = $result->user_id;
                    $data_two['priority'] = $result->priority;
                    $data_two['email_address'] = $result->email_address;
                    $data_two['subject'] = $result->subject;
                    $data_two['message'] = $this->request->getVar('message');
                    $data_two['status'] = 2;
                    $data_two['ticket_id'] = $id;

                    $image =  $this->request->getFileMultiple('attachments');


                    foreach ($image as $file) {
                        if ($file != '') {

                            $newName = $file->getRandomName();
                            $file->move(ROOTPATH . '\public\frontend\images\ticket', $newName);

                            $data_new[] = $newName;
                        }
                    }

                    if (!empty($data_new)) {
                        $data_two['attachments'] = implode(',', $data_new);
                    }



                    $support_ticketModel->save($data_two);

                    return redirect()->back();
                }
            }
        }

        $data['ticket'] = $support_ticketModel->where('ticket_id', $id)->findAll();

        //Footer-----------------------
        $frontsetting = new FrontendSettingsModel();
        $data['footer_section'] = $frontsetting->where('group_name', 'footer_section')->findAll();

        return view('frontend/support_ticket/view', $data);
    }


    public function ticket_close($id)
    {

        $support_ticketModel = new SupportTicketModel();

        $datas['status'] = 1;
        $datas['created_at'] = date("Y-m-d H:i:s");

        $support_ticketModel->where('ticket_id', $id)->set($datas)->update();

        return redirect()->back();
    }


    //Admin Panel Support Ticket------------
    public function index()
    {
        $builder = $this->db->table('support_tickets');
        $builder->select('*');
        $subQuery = $this->db->table('support_tickets')
            ->select('max(support_tickets.id) as id')
            ->groupBy('ticket_id');

        $builder->whereIn('id', $subQuery);

        $query = $builder->get();

        $data['all_ticket'] = $query->getResult();


        return view('admin/support_ticket/index', $data);
    }

    public function admin_ticket_view($id)
    {

        $support_ticketModel = new SupportTicketModel();


        $ticket_reply = $this->request->getVar('ticket_reply');

        if ($ticket_reply == 'reply') {

            if ($this->request->getMethod() == 'post') {

                if (!$this->validate('replyticketValidate')) {

                    $data['validation'] = $this->validator;
                } else {

                    $result = $support_ticketModel->where('ticket_id', $id)->first();


                    $data_one['status'] = 2;
                    $support_ticketModel->where('ticket_id', $id)->set($data_one)->update();


                    $data_two['full_name'] = $result->full_name;
                    $data_two['user_id'] = $result->user_id;
                    $data_two['priority'] = $result->priority;
                    $data_two['email_address'] = $result->email_address;
                    $data_two['subject'] = $result->subject;
                    $data_two['message'] = $this->request->getVar('message');
                    $data_two['status'] = 2;
                    $data_two['ticket_id'] = $id;

                    $image =  $this->request->getFileMultiple('attachments');


                    foreach ($image as $file) {
                        if ($file != '') {

                            $newName = $file->getRandomName();
                            $file->move(ROOTPATH . '\public\frontend\images\ticket', $newName);

                            $data_new[] = $newName;
                        }
                    }

                    if (!empty($data_new)) {
                        $data_two['attachments'] = implode(',', $data_new);
                    }


                    $support_ticketModel->save($data_two);

                    return redirect()->back();
                }
            }
        }

        $data['ticket'] = $support_ticketModel->where('ticket_id', $id)->findAll();

        return view('admin/support_ticket/view', $data);
    }


    public function admin_ticket_delete($id)
    {
        $support_ticketModel = new SupportTicketModel();

        $edit_data = $support_ticketModel->where('id', $id)->first();

        if ($edit_data->attachments != '') {
            $data_array = explode(',', $edit_data->attachments);

            foreach ($data_array as $image) {

                if (file_exists('./frontend/images/ticket/' . $image)) {
                    unlink('./frontend/images/ticket/' . $image);
                }
            }
        }

        $support_ticketModel->where('id', $id)->delete();

        return redirect()->back();
    }

    public function admin_ticket_closed()
    {
        $builder = $this->db->table('support_tickets');
        $builder->select('*');
        $subQuery = $this->db->table('support_tickets')
            ->select('max(support_tickets.id) as id')
            ->where('status', 1)
            ->groupBy('ticket_id');

        $builder->whereIn('id', $subQuery);

        $query = $builder->get();

        $data['all_ticket'] = $query->getResult();

        // echo '<pre>';
        // print_r($data);
        // die();


        return view('admin/support_ticket/closed_ticket', $data);
    }
}
