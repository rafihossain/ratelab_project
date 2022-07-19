<?php

if (!function_exists("rs_send_email")) {
    function rs_send_email($toEmail, $emailSubject, $emailBody, $single_email='')
    {


        $email = \Config\Services::email();
        $setting = new App\Models\SettingsModel();

        $getSetting = $setting->where('sname', 'email')->first();
        $settingValue = json_decode($getSetting->svalue);

        $config = [  
            'protocol' => $settingValue->mail_option,
            'SMTPHost' => $settingValue->smtp_hostname,
            'SMTPUser' => $settingValue->smtp_username,
            'SMTPPass' => $settingValue->smtp_password,
            'SMTPPort' => $settingValue->smtp_post,
            'SMTPCrypto' => $settingValue->smtp_secure,
            'mailType' => 'html',
        ];

        $email->initialize($config);

        $email->setFrom($settingValue->smtp_username, 'Nazmul Hossain');

        if(is_array($toEmail))
        {
          $email->setTo($single_email);    
          $email->setBCC($toEmail); 
        }
        else
        {
          $email->setTo($toEmail);   
        }
  
        $email->setSubject($emailSubject);
        $email->setMessage($emailBody);

        $email->send();

        if (!$email->send()) {
            return $email->printDebugger();
        } else {
            return true;
        }
    }
}
