<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingsModel;
use App\Entities\Settings;
use App\Models\MstemplateModel;

class SettingsController extends BaseController
{
    public function gereral()
    {
        $setting = new SettingsModel();
        $general_settings = $setting->where('group_name', 'General Setting')->findAll();

        if(count($general_settings) > 0){
            $gensettings = [
                'site_title' => $general_settings[0]->settings_value,
                'timezone' => $general_settings[1]->settings_value,
                'base_color' => $general_settings[2]->settings_value,
                'secondary_color' => $general_settings[3]->settings_value,
                'secure_password' => $general_settings[4]->settings_value,
                'agree_policy' => $general_settings[5]->settings_value,
                'user_registration' => $general_settings[6]->settings_value,
                'force_ssl' => $general_settings[7]->settings_value,
                'email_verification' => $general_settings[8]->settings_value,
                'email_notification' => $general_settings[9]->settings_value,
                'sms_verification' => $general_settings[10]->settings_value,
                'sms_notification' => $general_settings[11]->settings_value,
            ];
    
            $data['general_settings'] = $gensettings;
        }

        // echo "<pre>"; print_r($data['general_settings']); die();
        
        
        if($this->request->getMethod() == 'post'){

            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();

            foreach ($info as $key => $row) {
                // echo "<pre>"; print_r($key);
                $builder =$this->db->table('settings');     
                $builder->where('group_name','General Setting');
                $builder->where('settings_name',$key);
                $builder->update(['settings_value'=>$row]);

                // echo "<pre>";
                // echo $this->db->getLastQuery();
            }
            // die();

            return redirect()->to(base_url('admin/settings/general'))->with('success', 'General Settings Update Successfully');
        }

        return view('admin/settings/general', $data);
    }

    public function logoFavicon(){
        // echo "hello rafi"; die();
        $setting = new SettingsModel();
        $logoandfav = $setting->where('group_name', 'Logo and favicon')->findAll();

        if(count($logoandfav) > 0){
            $logoandfav = [
                'logo' => $logoandfav[0]->settings_value,
                'favicon' => $logoandfav[1]->settings_value,
            ];
    
            $data['logoandfav'] = $logoandfav;
        }

        if($this->request->getMethod() == 'post'){

            $logo = $this->request->getFile('logo');
            // echo "<pre>"; print_r($info); die();
            
            if ($logo->isValid() && ! $logo->hasMoved()) {
                $newNameLogo = $logo->getRandomName();
                $logo->move(ROOTPATH . 'public/admin/uploads/', $newNameLogo);;
                
                $builder =$this->db->table('settings');     
                $builder->where('group_name','Logo and favicon');
                $builder->where('settings_name', 'logo');
                $builder->update(['settings_value' => $newNameLogo]);
            }
            
            $favicon = $this->request->getFile('favicon');

            if ($favicon->isValid() && ! $favicon->hasMoved()) {
                $newNameFavicon = $favicon->getRandomName();
                $favicon->move(ROOTPATH . 'public/admin/uploads/', $newNameFavicon);
                
                $builder =$this->db->table('settings');     
                $builder->where('group_name','Logo and favicon');
                $builder->where('settings_name', 'favicon');
                $builder->update(['settings_value' => $newNameFavicon]);

                // echo $this->db->getLastQuery();
            }

            return redirect()->to(base_url('admin/settings/logo_favicon'))->with('success', 'Image Update Successfully');
        }

        // echo "<pre>"; print_r($logoandfav); die();

        return view('admin/settings/logo-favicon', $data);
    }
    
    
    public function extensions(){
        $setting = new SettingsModel();
        $extensions = $setting->where('group_name', 'extensions')->findAll();
        // echo "<pre>"; print_r($extensions); die();

        if(count($extensions) > 0){

            $results = [];
            foreach($extensions as $extension){
                $json_decode = json_decode($extension->settings_value);
                $results[] = $json_decode;
            }
            // echo "<pre>"; print_r($results); die();
            $data['extensions'] = $results;

        }
        return view('admin/settings/extensions', $data);
    }

    public function getSpecificExtension(){
        $id = $this->request->getVar('id');

        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $id);
        $query_result = $builder->get();
        $results = $query_result->getRow();

        echo json_encode($results);
    }
    
    public function updateSpecificExtension(){

        $info = $this->request->getVar();

        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $query_result = $builder->get();
        $row = $query_result->getRow();
        $rows = json_decode($row->settings_value);

        $data = [
            'id' => $rows->id,
            'image' => $rows->image,
            'name' => $rows->name,
            'title' => $rows->title,
            'value' => $info['setting_val'],
            'help_img' => $rows->help_img,
            'help_txt' => $rows->help_txt,
            'status' => $rows->status,
        ];

        $results = json_encode($data);


        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $builder->update(['settings_value' => $results]);
        
        echo 'success';

    }

    public function activatedExtension(){

        $info = $this->request->getVar();

        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $query_result = $builder->get();
        $row = $query_result->getRow();
        $rows = json_decode($row->settings_value);

        $data = [
            'id' => $rows->id,
            'image' => $rows->image,
            'name' => $rows->name,
            'title' => $rows->title,
            'value' => $rows->value,
            'help_img' => $rows->help_img,
            'help_txt' => $rows->help_txt,
            'status' => 1,
        ];

        // echo "<pre>"; print_r($data); die();

        $results = json_encode($data);


        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $builder->update(['settings_value' => $results]);
        
        echo 'success';

    }

    public function deactivatedExtension(){

        $info = $this->request->getVar();

        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $query_result = $builder->get();
        $row = $query_result->getRow();
        $rows = json_decode($row->settings_value);

        $data = [
            'id' => $rows->id,
            'image' => $rows->image,
            'name' => $rows->name,
            'title' => $rows->title,
            'value' => $rows->value,
            'help_img' => $rows->help_img,
            'help_txt' => $rows->help_txt,
            'status' => 0,
        ];

        // echo "<pre>"; print_r($data); die();
        
        $results = json_encode($data);


        $builder =$this->db->table('settings');     
        $builder->where('group_name','extensions');
        $builder->where('id', $info['setting_id']);
        $builder->update(['settings_value' => $results]);
        
        echo 'success';
        
    }
    
    public function language(){
        $setting = new SettingsModel();
        $language = $setting->where('group_name', 'language')->findAll();
        // echo "<pre>"; print_r($extensions); die();

        if(count($language) > 0){

            $results = [];
            foreach($language as $lang){
                $val = json_decode($lang->settings_value, true);
                $val['name'] = $lang->settings_name;
                $val['id'] = $lang->id;
                $results[] = $val;
            }
            // echo "<pre>"; print_r($results); die();
            $data['language'] = $results;
        }

        return view('admin/settings/language', $data);
    }

    public function addNewLanguage(){
        $info = $this->request->getVar();
        $settings = new SettingsModel();

        $dataName = [
            'group_name' => 'language',
            'settings_name' => $info['lang_name'],
        ];

        $settings->save($dataName);

        // echo $this->db->getLastQuery();
        $lastId = $this->db->insertID();
        
        $dataValue = [
            'id' => $lastId,
            'code' => $info['lang_code'],
            'is_default' => $info['lang_default'],
        ];
        // echo "<pre>"; print_r($dataValue); die();
        
        $results = json_encode($dataValue);
        
        $builder =$this->db->table('settings');     
        $builder->where('group_name','language');
        $builder->where('id', $lastId);
        $builder->update(['settings_value' => $results]);
        
        echo "success";
    }

    public function editLanguage(){
        $info = $this->request->getVar();
        $settings = new SettingsModel();
        
        $settings->set('settings_name', $info['lang_name'])
                ->where('group_name','language')
                ->where('id',$info['lang_id'])
                ->update();

        // echo $this->db->getLastQuery();
        
        
        $builder =$this->db->table('settings');     
        $builder->where('group_name','language');
        $builder->where('id', $info['lang_id']);
        $query_result = $builder->get();
        $row = $query_result->getRow();

        
        $rows = json_decode($row->settings_value, true);
        
        $dataValue = [
            'code' => $rows['code'],
            'is_default' => $info['lang_default'],
        ];
        // echo "<pre>"; print_r($dataValue); die();
        
        $results = json_encode($dataValue);

        $builder =$this->db->table('settings');     
        $builder->where('group_name','language');
        $builder->where('id', $info['lang_id']);
        $builder->update(['settings_value' => $results]);
        
        echo "success";
    }
    
    public function deleteLanguage(){
        $settings = new SettingsModel();
        $info = $this->request->getVar();
        $settings->delete($info['delete_id']);
        echo "success";
    }

    public function seoManager(){
        $setting = new SettingsModel();
        $seomanager = $setting->where('group_name', 'Seo Manager')->findAll();
        
        $results = [];
        foreach($seomanager as $seo){
            $results[] = $seo->settings_value;
        }
        $data['seomanager'] = $results;


        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            $image = $this->request->getFile('image');
            
            $keyword = implode(',',$info['meta_keywords']);
            
            if($image->isValid()){
                if(file_exists('./admin/uploads/'.$info['old_image']))
                {
                    unlink('./admin/uploads/'.$info['old_image']);
                }
                if ($image->isValid() && ! $image->hasMoved()) {
                    $newNameLogo = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/admin/uploads/', $newNameLogo);
                }

                $image = $newNameLogo;
            }else{

                $image = $info['old_image'];
            }

            $seoInsert = [
                'meta_keywords' => $keyword,
                'meta_description' => $info['meta_description'],
                'social_title' => $info['social_title'],
                'social_description' => $info['social_description'],
                'image' => $image,
            ];

            // echo "<pre>"; print_r($seoInsert); die();
            
            foreach ($seoInsert as $key => $row) {
                // echo "<pre>"; print_r($key);
                $builder =$this->db->table('settings');     
                $builder->where('group_name','Seo Manager');
                $builder->where('settings_name',$key);
                $builder->update(['settings_value'=>$row]);
            }

            return redirect()->to(base_url('admin/settings/seo_manager'))->with('success', 'Information Update Successfully');
        }
        
        return view('admin/settings/seo-manager', $data);
    }
    
    public function emailTemplateGlobal(){
        $setting = new SettingsModel();
        $emailTempGlobal = $setting->where('group_name', 'Email Template Global')->findAll();
        // echo "<pre>"; print_r($emailTempGlobal); die();
        
        $results = [
            'email_sent_from' => $emailTempGlobal[0]->settings_value,
            'email_body' => $emailTempGlobal[1]->settings_value,
        ];
        $data['tempglobals'] = $results;
        
        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();
            
            foreach ($info as $key => $row) {
                $builder =$this->db->table('settings');     
                $builder->where('group_name','Email Template Global');
                $builder->where('settings_name',$key);
                $builder->update(['settings_value'=>$row]);
            }
            
            return redirect()->to(base_url('admin/settings/email_template/global'))->with('success', 'Email Template Update Successfully');
            
            
            // echo "hello rafi"; die();
        }
        return view('admin/settings/email-template/global', $data);
    }

    public function emailTemplate(){
        $msTemplate = new MstemplateModel();
        $data['emailTemps'] = $msTemplate->findAll();
        // echo "<pre>"; print_r($results); die();
        
        return view('admin/settings/email-template/index', $data);
    }

    public function emailTemplateEdit($id){
        $msTemplate = new MstemplateModel();
        $data['editTemps'] = $msTemplate->where('id', $id)->first();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();
            $msTemplate->update($id, $info);
            
            return redirect()->to(base_url('admin/settings/email_template/edit/'. $id))->with('success', 'Template Update Successfully');    
            // echo "hello rafi"; die();
        }

        return view('admin/settings/email-template/edit', $data);
    }
    
    public function emailTemplateSetting(){
        $setting = new SettingsModel();
        $emailTempSetting = $setting->where('group_name', 'Email Template Setting')->findAll();

        $results = [];
        foreach($emailTempSetting as $emailtemp){
            $val = json_decode($emailtemp->settings_value, true);
            $results[] = $val;
        }
        $data['tempSetVal'] = array_merge($results[0],$results[1],$results[2]);

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();
            
            if($info['email_method'] == 'smtp'){

                $smtp = [
                    'host' => $info['host'],
                    'port' => $info['port'],
                    'enc' => $info['enc'],
                    'username' => $info['username'],
                    'password' => $info['password'],
                ];

                // echo "<pre>"; print_r(json_encode($smtp)); die();

                $builder =$this->db->table('settings');     
                $builder->where('group_name','Email Template Setting');
                $builder->where('settings_name','smtp');
                $builder->update(['settings_value' => json_encode($smtp)]);
            }
            if($info['email_method'] == 'sendgrid'){

                $sendgrid = [
                    'appkey' => $info['appkey']
                ];

                // echo "<pre>"; print_r(json_encode($sendgrid)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Email Template Setting');    
                $builder->where('settings_name','sendgrid');
                $builder->update(['settings_value' => json_encode($sendgrid)]);
            }
            if($info['email_method'] == 'mailjet'){

                $mailjet = [
                    'public_key' => $info['public_key'],
                    'secret_key' => $info['secret_key'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Email Template Setting');     
                $builder->where('settings_name','mailjet');
                $builder->update(['settings_value' => json_encode($mailjet)]);
            }

            // die();
            
            return redirect()->to(base_url('admin/settings/email_template/setting'))->with('success', 'Email Configuration Update Successfully');
        }
        
        return view('admin/settings/email-template/setting', $data);
    }

    public function smsTemplateGlobal(){

        $setting = new SettingsModel();
        $data['smsTempGlobal'] = $setting->where('group_name', 'Sms Template Global')->first();
        // echo "<pre>"; print_r($smsTempGlobal); die();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            
            $builder =$this->db->table('settings');
            $builder->where('group_name','Sms Template Global');     
            $builder->where('settings_name','global_template');
            $builder->update(['settings_value' => $info['global_template']]);
            
            return redirect()->to(base_url('admin/settings/sms_template/global'))->with('success', 'Sms Template Update Successfully');
            
            // echo "<pre>"; print_r($info); die();
        }
        
        return view('admin/settings/sms-template/global', $data);
    }
    
    public function smsTemplateSetting(){
        $setting = new SettingsModel();
        $smsTempSetting= $setting->where('group_name', 'Sms Template Setting')->findAll();

        $results = [];
        foreach($smsTempSetting as $smstemp){
            $val = json_decode($smstemp->settings_value, true);
            $results[] = $val;
        }
        $data['smsTempSetting'] = array_merge($results[0],$results[1],$results[2],$results[3],$results[4],$results[5],$results[6]);
        // echo "<pre>"; print_r($data['smsTempSetting']); die();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();

            if($info['sms_method'] == 'clickatell'){

                $clickatell = [
                    'clickatell_api_key' => $info['clickatell_api_key'],
                ];

                // echo "<pre>"; print_r(json_encode($smtp)); die();

                $builder =$this->db->table('settings');     
                $builder->where('group_name','Sms Template Setting');
                $builder->where('settings_name','clickatell');
                $builder->update(['settings_value' => json_encode($clickatell)]);
            }
            if($info['sms_method'] == 'infobip'){

                $infobip = [
                    'infobip_username' => $info['infobip_username'],
                    'infobip_password' => $info['infobip_password']
                ];

                // echo "<pre>"; print_r(json_encode($sendgrid)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');    
                $builder->where('settings_name','infobip');
                $builder->update(['settings_value' => json_encode($infobip)]);
            }
            if($info['sms_method'] == 'messageBird'){

                $messageBird = [
                    'message_bird_api_key' => $info['message_bird_api_key'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');     
                $builder->where('settings_name','messageBird');
                $builder->update(['settings_value' => json_encode($messageBird)]);
            }
            if($info['sms_method'] == 'nexmo'){

                $nexmo = [
                    'nexmo_api_key' => $info['nexmo_api_key'],
                    'nexmo_api_secret' => $info['nexmo_api_secret'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');     
                $builder->where('settings_name','nexmo');
                $builder->update(['settings_value' => json_encode($nexmo)]);
            }
            if($info['sms_method'] == 'smsBroadcast'){

                $smsBroadcast = [
                    'sms_broadcast_username' => $info['sms_broadcast_username'],
                    'sms_broadcast_password' => $info['sms_broadcast_password'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');     
                $builder->where('settings_name','smsBroadcast');
                $builder->update(['settings_value' => json_encode($smsBroadcast)]);
            }
            if($info['sms_method'] == 'twilio'){

                $twilio = [
                    'account_sid' => $info['account_sid'],
                    'auth_token' => $info['auth_token'],
                    'from' => $info['from'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');     
                $builder->where('settings_name','twilio');
                $builder->update(['settings_value' => json_encode($twilio)]);
            }
            if($info['sms_method'] == 'textMagic'){

                $textMagic = [
                    'text_magic_username' => $info['text_magic_username'],
                    'apiv2_key' => $info['apiv2_key'],
                ];

                // echo "<pre>"; print_r(json_encode($mailjet)); die();

                $builder =$this->db->table('settings');
                $builder->where('group_name','Sms Template Setting');     
                $builder->where('settings_name','textMagic');
                $builder->update(['settings_value' => json_encode($textMagic)]);
            }
            
            return redirect()->to(base_url('admin/settings/sms_template/setting'))->with('success', 'Sms Template Update Successfully');
        }
        return view('admin/settings/sms-template/setting', $data);
    }
    
    public function smsTemplate(){

        $msTemplate = new MstemplateModel();
        $data['smsTemps'] = $msTemplate->findAll();
        
        return view('admin/settings/sms-template/index', $data);
    }

    public function smsTemplateEdit($id){
        $msTemplate = new MstemplateModel();
        $data['editTemps'] = $msTemplate->where('id', $id)->first();
        // echo "<pre>"; print_r($data['editTemps']); die();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();
            $msTemplate->update($id, $info);
            
            return redirect()->to(base_url('admin/settings/sms_template/edit/'. $id))->with('success', 'Template Update Successfully');    
            // echo "hello rafi"; die();
        }

        return view('admin/settings/sms-template/edit', $data);
    }
	
	public function gdprCookie(){
        $setting = new SettingsModel();
        $cookie = $setting->where('group_name', 'GDPR Cookie')->findAll();
        
        $results = [
            'policy_link' => $cookie[0]->settings_value,
            'description' => $cookie[1]->settings_value,
            'status' => $cookie[2]->settings_value,
        ];
        
        $data['cookie'] = $results;
        
        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            // echo "<pre>"; print_r($info); die();
            
            foreach ($info as $key => $row) {
                $builder =$this->db->table('settings');     
                $builder->where('group_name','GDPR Cookie');
                $builder->where('settings_name',$key);
                $builder->update(['settings_value'=>$row]);
            }
            return redirect()->to(base_url('admin/settings/cookie'))->with('success', 'Cookie Update Successfully');
        }
        
        return view('admin/settings/extra/cookie', $data);
    }
    public function systemInformation(){
        return view('admin/settings/extra/system-info');
    }
    public function customCss(){
        $setting = new SettingsModel();
        $data['customcss'] = $setting->where('group_name', 'Custom CSS')->first();
        // echo "<pre>"; print_r($data['customcss']); die();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();
            
            foreach ($info as $key => $row) {
                $builder =$this->db->table('settings');     
                $builder->where('group_name','Custom CSS');
                $builder->where('settings_name',$key);
                $builder->update(['settings_value'=>$row]);
            }
            return redirect()->to(base_url('admin/settings/custom_css'))->with('success', 'Custom CSS Update Successfully');
        }

        return view('admin/settings/extra/custom-css', $data);
    }
    public function requestReport(){
        $setting = new SettingsModel();
        $data['reportandreq'] = $setting->where('group_name', 'Report & Request')->findAll();
        
        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();

            $dataName = [
                'group_name' => 'Report & Request',
                'settings_name' => $info['type'],
                'settings_value' => $info['message'],
            ];
            // echo "<pre>"; print_r($dataName); die();
    
            $setting->save($dataName);

            return redirect()->to(base_url('admin/settings/request_report'))->with('success', 'Report Generated Successfully');
        }


        return view('admin/settings/extra/request-report', $data);
    }

}
