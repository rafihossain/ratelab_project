<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MstemplateSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('ms_templates')->insertBatch([
            [
                'name' => 'Password Reset',
                'mail_subject' => 'Password Reset',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>We have received a request to reset the password for your account on&nbsp;<strong>{{time}} .</strong></p><p>Requested From IP:&nbsp;<strong>{{ip}}</strong>&nbsp;using&nbsp;<strong>{{browser}}</strong>&nbsp;on&nbsp;<strong>{{operating_system}}&nbsp;</strong>.</p><p><br></p><p><br></p><p>Your account recovery code is:&nbsp;&nbsp;&nbsp;<strong class="ql-size-large">{{code}}</strong></p><p><br></p><p><br></p><p><span style="color: rgb(230, 0, 0);">If you do not wish to reset your password, please disregard this message.</span></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => 'Your account recovery code is: {{code}}',
                'sms_status' => 1,
            ],
            [
                'name' => 'Password Reset Confirmation',
                'mail_subject' => 'You have Reset your password',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>You have successfully reset your password.</p><p>You changed from&nbsp;IP:&nbsp;<strong>{{ip}}</strong>&nbsp;using&nbsp;<strong>{{browser}}</strong>&nbsp;on&nbsp;<strong>{{operating_system}}&nbsp;</strong>&nbsp;on&nbsp;<strong>{{time}}</strong></p><p><br></p><p><strong style="color: rgb(230, 0, 0);">If you did not changed that, Please contact with us as soon as possible.</strong></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => 'Your password has been changed successfully',
                'sms_status' => 1,
            ],
            [
                'name' => 'Email Verification',
                'mail_subject' => 'Please verify your email address',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>Thanks For join with us.</p><p>Please use below code to verify your email address.</p><p><br></p><p>Your email verification code is:<strong>&nbsp;</strong><strong class="ql-size-huge">{{code}}</strong></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => 'Your email verification code is: {{code}}',
                'sms_status' => 1,
            ],
            [
                'name' => 'SMS Verification',
                'mail_subject' => 'Please verify your phone',
                'mail_body' => 'Your phone verification code is: {{code}}',
                'mail_status' => 0,
                'sms_body' => 'Your phone verification code is: {{code}}',
                'sms_status' => 1,
            ],
            [
                'name' => 'Support Ticket Reply',
                'mail_subject' => 'Reply Support Ticket',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><h3><strong>A member from our support team has replied to the following ticket:</strong></h3><h3><br></h3><h3><strong>[Ticket#{{ticket_id}}] {{ticket_subject}}</strong></h3><h3><br></h3><h3><strong>Click here to reply:&nbsp;{{link}}</strong></h3><p>----------------------------------------------</p><p>Here is the reply :</p><p>{{reply}}</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => '{{subject}}rnrn{{reply}}rnrnrnClick here to reply:  {{link}}',
                'sms_status' => 1,
            ],
            [
                'name' => 'Company approved by admin.',
                'mail_subject' => 'Your company is approved by admin',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>The {{name}} has been approved successfully.</p><p>By {{site}}</p><p>Feedback: {{feedback}}</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => '<div>The {{name}} has been approved successfully.</div><br>rn<div>By {{site}}</div>rn<div>Feedback: {{feedback}}</div>',
                'sms_status' => 1,
            ],
            [
                'name' => 'Company rejected by admin.',
                'mail_subject' => 'Your company is rejected by admin',
                'mail_body' => '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>The {{name}} has been rejected.</p><p>By {{site}}</p><p>Feedback: {{feedback}}</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
                'mail_status' => 1,
                'sms_body' => '<div>The {{name}} has been rejected.</div>rn<div>By {{site}}</div>rn<div>Feedback: {{feedback}}</div>',
                'sms_status' => 1,
            ],


        ]);
    }
}
