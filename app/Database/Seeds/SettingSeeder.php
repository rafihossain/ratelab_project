<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('settings')->insertBatch([
            [
                'group_name' => 'General Setting',
                'settings_name' => 'site_title',
                'settings_value' => 'RS Rate Lab',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'timezone',
                'settings_value' => 'Dhaka',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'base_color',
                'settings_value' => '#38761d',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'secondary_color',
                'settings_value' => '#f44336',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'secure_password',
                'settings_value' => '0',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'agree_policy',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'user_registration',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'force_ssl',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'email_verification',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'email_notification',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'sms_verification',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'General Setting',
                'settings_name' => 'sms_notification',
                'settings_value' => '1',
            ],
            [
                'group_name' => 'Logo and favicon',
                'settings_name' => 'logo',
                'settings_value' => 'logo.png',
            ],
            [
                'group_name' => 'Logo and favicon',
                'settings_name' => 'favicon',
                'settings_value' => 'favicon.png',
            ],
            [
                'group_name' => 'extensions',
                'settings_name' => 'tawk_to',
                'settings_value' => '{"id":"15","image":"tawky_big.png","name":"Tawk.to","title":"app_key","value":"- - - -","help_img":"twak.png","help_txt":"Key location is shown bellow","status":0}',
            ],
            [
                'group_name' => 'extensions',
                'settings_name' => 'google_recaptcha2',
                'settings_value' => '{"id":"16","image":"recaptcha3.png","name":"Google Recaptcha2","title":"site_key","value":"6Lfpm3cUAAAAAGIjbEJKhJNKS4X1Gns9ANjh8MfH","help_img":"recaptcha.png","help_txt":"Key location is shown bellow","status":1}',
            ],
            [
                'group_name' => 'extensions',
                'settings_name' => 'custom_captcha',
                'settings_value' => '{"id":"17","image":"customcaptcha.png","name":"Custom Captcha","title":"random_str","value":"SecureString","help_img":"na","help_txt":"Just Put Any Random String","status":"0"}',
            ],
            [
                'group_name' => 'extensions',
                'settings_name' => 'google_analytics',
                'settings_value' => '{"id":"18","image":"google_analytics.png","name":"Google Analytics","title":"app_key","value":"- - - -","help_img":"ganalytics.png","help_txt":"Key location is shown bellow","status":"0"}',
            ],
            [
                'group_name' => 'language',
                'settings_name' => 'English',
                'settings_value' => '{"code":"en","is_default":"0"}',
            ],
            [
                'group_name' => 'language',
                'settings_name' => 'Hindi',
                'settings_value' => '{"code":"hn","is_default":"1"}',
            ],
            [
                'group_name' => 'language',
                'settings_name' => 'Bangla',
                'settings_value' => '{"code":"bn","is_default":"0"}',
            ],
            [
                'group_name' => 'Seo Manager',
                'settings_name' => 'meta_keywords',
                'settings_value' => 'rating,company',
            ],
            [
                'group_name' => 'Seo Manager',
                'settings_name' => 'meta_description',
                'settings_value' => 'RateLab is a business review platform. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolorem itaque laudantium aut, quibusdam amet, nemo quaerat, fuga facere corrupti quos dolorum. Blanditiis, exercitationem quia aliquam sit temporibus enim aspernatur repudiandae inventore, corporis vero quo animi beatae laborum ullam distinctio vel laudantium modi! Libero perferendis necessitatibus saepe deleniti illo officiis.',
            ],
            [
                'group_name' => 'Seo Manager',
                'settings_name' => 'social_title',
                'settings_value' => 'RateLab : Business Review Platform',
            ],
            [
                'group_name' => 'Seo Manager',
                'settings_name' => 'social_description',
                'settings_value' => 'RateLab is a business review platform. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolorem itaque laudantium aut, quibusdam amet, nemo quaerat, fuga facere corrupti quos dolorum. Blanditiis, exercitationem quia aliquam sit temporibus enim aspernatur repudiandae inventore, corporis vero quo animi beatae laborum ullam distinctio vel laudantium modi! Libero perferendis necessitatibus saepe deleniti illo officiis.',
            ],
            [
                'group_name' => 'Seo Manager',
                'settings_name' => 'image',
                'settings_value' => '1649650481_3d1f8506601d49642158.jpg',
            ],
            [
                'group_name' => 'Email Template Global',
                'settings_name' => 'email_sent_from',
                'settings_value' => 'info@viserlab.com',
            ],
            [
                'group_name' => 'Email Template Global',
                'settings_name' => 'email_body',
                'settings_value' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p><br></p><h3><strong>This is a System Generated Email</strong></h3><p><br></p><p><a href="https://script.viserlab.com/ratelab/admin/email-template/global#" rel="noopener noreferrer" target="_blank" style="color: rgb(0, 135, 255); background-color: transparent;"><img src="https://i.imgur.com/Z1qtvtV.png" alt="img"></a></p><p><br></p><h1><strong>Hello {{fullname}} ({{username}})</strong></h1><p><br></p><p><br></p><p>{{message}}</p><p><br></p><p><br></p><p><br></p><p><br></p><p>© 2021&nbsp;<a href="https://script.viserlab.com/ratelab/admin/email-template/global#" rel="noopener noreferrer" target="_blank" style="color: rgb(0, 135, 255); background-color: transparent;">Website Name</a>&nbsp;. All Rights Reserved.</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden" style="margin-top: 0px;"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
            ],
            [
                'group_name' => 'Email Template Setting',
                'settings_name' => 'smtp',
                'settings_value' => '{"host":"testhost","port":"testport","enc":"ssl","username":"testusername","password":"testpassword"}',
            ],
            [
                'group_name' => 'Email Template Setting',
                'settings_name' => 'sendgrid',
                'settings_value' => '{"appkey":"sendgrid app key"}',
            ],
            [
                'group_name' => 'Email Template Setting',
                'settings_name' => 'mailjet',
                'settings_value' => '{"public_key":"test public key","secret_key":"test secret key"}',
            ],
            [
                'group_name' => 'Sms Template Global',
                'settings_name' => 'global_template',
                'settings_value' => 'hi {{name}}, {{message}}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'clickatell',
                'settings_value' => '{"clickatell_api_key":"----------------------------"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'infobip',
                'settings_value' => '{"infobip_username":"--------------","infobip_password":"----------------------"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'messageBird',
                'settings_value' => '{"message_bird_api_key":"--------------"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'nexmo',
                'settings_value' => '{"nexmo_api_key":"735a9da4","nexmo_api_secret":"65DMdhUXIDkg1itC"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'smsBroadcast',
                'settings_value' => '{"sms_broadcast_username":"sms broadcast","sms_broadcast_password":"sms password"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'twilio',
                'settings_value' => '{"account_sid":"AYajjmpDLunawN9mRtBUbWAMSNG9on1NRL","auth_token":"77726b242830fb28f52fb08c648dd7a6","from":"+17739011523"}',
            ],
            [
                'group_name' => 'Sms Template Setting',
                'settings_name' => 'textMagic',
                'settings_value' => '{"text_magic_username":"username","apiv2_key":"apiv2 key"}',
            ],
            [
                'group_name' => 'GDPR Cookie',
                'settings_name' => 'policy_link',
                'settings_value' => 'policy/privacy-policy/42',
            ],
            [
                'group_name' => 'GDPR Cookie',
                'settings_name' => 'description',
                'settings_value' => '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p><span style=\"color: rgb(33, 37, 41);\">We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience.</span></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>',
            ],
            [
                'group_name' => 'GDPR Cookie',
                'settings_name' => 'status',
                'settings_value' => 1,
            ],
            [
                'group_name' => 'Custom CSS',
                'settings_name' => 'css',
                'settings_value' => '.country-code .input-group-prepend .input-group-text {\r\n    background: #fff !important;\r\n}\r\n\r\n.country-code select {\r\n    border: none;\r\n}\r\n\r\n.country-code select:focus {\r\n    border: none;\r\n    outline: none;\r\n}\r\n\r\n.hover-input-popup {\r\n    position: relative;\r\n}\r\n\r\n.hover-input-popup:hover .input-popup {\r\n    opacity: 1;\r\n    visibility: visible;\r\n}\r\n\r\n.input-popup {\r\n    position: absolute;\r\n    bottom: 130%;\r\n    left: 50%;\r\n    width: 280px;\r\n    background-color: #1a1a1a;\r\n    color: #fff;\r\n    padding: 20px;\r\n    border-radius: 5px;\r\n    -webkit-border-radius: 5px;\r\n    -moz-border-radius: 5px;\r\n    -ms-border-radius: 5px;\r\n    -o-border-radius: 5px;\r\n    -webkit-transform: translateX(-50%);\r\n    -ms-transform: translateX(-50%);\r\n    transform: translateX(-50%);\r\n    opacity: 0;\r\n    visibility: hidden;\r\n    -webkit-transition: all 0.3s;\r\n    -o-transition: all 0.3s;\r\n    transition: all 0.3s;\r\n    z-index: 11;\r\n}\r\n\r\n.input-popup::after {\r\n    position: absolute;\r\n    content: \"\";\r\n    bottom: -19px;\r\n    left: 50%;\r\n    margin-left: -5px;\r\n    border-width: 10px 10px 10px 10px;\r\n    border-style: solid;\r\n    border-color: transparent transparent #1a1a1a transparent;\r\n    -webkit-transform: rotate(180deg);\r\n    -ms-transform: rotate(180deg);\r\n    transform: rotate(180deg);\r\n}\r\n\r\n.input-popup p {\r\n    padding-left: 20px;\r\n    position: relative;\r\n}\r\n\r\n.input-popup p::before {\r\n    position: absolute;\r\n    content: \"\";\r\n    font-family: \"Line Awesome Free\";\r\n    font-weight: 900;\r\n    left: 0;\r\n    top: 4px;\r\n    line-height: 1;\r\n    font-size: 18px;\r\n}\r\n\r\n.input-popup p.error {\r\n    text-decoration: line-through;\r\n}\r\n\r\n.input-popup p.error::before {\r\n    content: \"\\f057\";\r\n    color: #ea5455;\r\n}\r\n\r\n.input-popup p.success::before {\r\n    content: \"\\f058\";\r\n    color: #28c76f;\r\n}\r\n',
            ],
            [
                'group_name' => 'Report & Request',
                'settings_name' => 'bug',
                'settings_value' => 'bug found',
            ],
            [
                'group_name' => 'Report & Request',
                'settings_name' => 'feature',
                'settings_value' => 'need to update feature',
            ],

        ]);
    }
}
