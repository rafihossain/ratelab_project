<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
    //  * @var array<string, string>
    //  */
    // public $templates = [
    //     'list'   => 'CodeIgniter\Validation\Views\list',
    //     'single' => 'CodeIgniter\Validation\Views\single',
    // ];

    //User Registration validation----------
    public $UserRegistrationValidate = [
        'first_name' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The First name field is required',
            ],
        ],
       'last_name' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The Last name field is required',
            ],
        ],
          'user_name' => [
            'rules'  => 'required|is_unique[tbl_users.user_name]',
             'errors' => [
                'required' => 'The Username field is required',
                'is_unique' => 'This username already exits',
            ],
        ],
          'email' => [
            'rules'  => 'required|valid_email|is_unique[tbl_users.email_address]',
             'errors' => [
                'required' => 'The Email field is required',
                'valid_email'=>'It does not appear to be valid',
                'is_unique' => 'This Email already exits',
            ],
        ],
        //   'country' => [
        //     'rules'  => 'required',
        //      'errors' => [
        //         'required' => 'The Country field is required',
        //     ],
        // ],
          'phone_number' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The Phone number field is required',
            ],
        ],
          'password' => [
            'rules'  => 'required|min_length[6]',
             'errors' => [
                'required' => 'The Password field is required',

            ],
        ],
         'passconf' => [
            'rules'  => 'required|matches[password]',
             'errors' => [
                'required' => 'The Confirm password field is required',
                'matches[password]'=>'The Confirm password field does not match the password field'
            ],
        ],

    ];

    //User profile  update---------
      public $userProfileValidate = [
        'first_name' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The First name field is required',
            ],
        ],
       'last_name' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The Last name field is required',
            ],
        ],
    
    ]; 

    //user login validation----------
    public $UserLoginValidate = [
        'email' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Email field is required',
            ],
        ],
        'password' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Password field is required',
            ],
        ],

    ];

    //company Validation----------------
    public $companyValidate = [
        // 'company_image' => [
        //     'rules'  => 'required',//|max_dims[company_image,300,150]
        //     'errors' => [
        //         'required' => 'The image field is required',
        //     ],
        // ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_address' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Address field is required',
            ],
        ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_name' => [
            'rules'  => 'required|is_unique[companies.company_name]',
            'errors' => [
                'required' => 'The Company Name field is required',
                'is_unique' => 'The Company Name already exist',
            ],
        ],
        'categroy_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Category field is required',
            ],
        ],
        'company_email' => [
            'rules'  => 'required|is_unique[companies.email_address]',
            'errors' => [
                'required' => 'The Email field is required',
                'is_unique' => 'The Email already exist',
            ],
        ],
        'tags' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Tags field is required',
            ],
        ],
    ];


      //company Validation----------------
      public $companyValidate_new = [
        // 'company_image' => [
        //     'rules'  => 'required',//|max_dims[company_image,300,150]
        //     'errors' => [
        //         'required' => 'The image field is required',
        //     ],
        // ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_address' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Address field is required',
            ],
        ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Company Name field is required',
               
            ],
        ],
        'categroy_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Category field is required',
            ],
        ],
        'company_email' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Email field is required',
               
            ],
        ],
        'tags' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Tags field is required',
            ],
        ],
    ];

          //company Validation----------------
      public $companyValidate_new1 = [
        // 'company_image' => [
        //     'rules'  => 'required',//|max_dims[company_image,300,150]
        //     'errors' => [
        //         'required' => 'The image field is required',
        //     ],
        // ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_address' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Address field is required',
            ],
        ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
       'company_name' => [
            'rules'  => 'required|is_unique[companies.company_name]',
            'errors' => [
                'required' => 'The Company Name field is required',
                'is_unique' => 'The Company Name already exist',
            ],
        ],
        'categroy_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Category field is required',
            ],
        ],
        'company_email' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Email field is required',
               
            ],
        ],
        'tags' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Tags field is required',
            ],
        ],
    ];

         //company Validation----------------
      public $companyValidate_new2 = [
        // 'company_image' => [
        //     'rules'  => 'required',//|max_dims[company_image,300,150]
        //     'errors' => [
        //         'required' => 'The image field is required',
        //     ],
        // ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_address' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Address field is required',
            ],
        ],
        'company_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Url field is required',
            ],
        ],
        'company_name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Company Name field is required',
               
            ],
        ],
        'categroy_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Category field is required',
            ],
        ],
        'company_email' => [
            'rules'  => 'required|is_unique[companies.email_address]',
            'errors' => [
                'required' => 'The Email field is required',
                'is_unique' => 'The Email already exist',
            ],
        ],
        'tags' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Tags field is required',
            ],
        ],
    ];


   //Rating validation ---------------
   public $ratingValidate = [
        'rating' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Rating field is required',
            ],
        ],
        'reveiw' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Reveiw field is required',
            ],
        ],

    ]; 

  //Ticket validation ---------------
   public $supportValidate = [
    'subject' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Subject field is required',
        ],
    ],
    'message' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Message field is required',
        ],
    ],

    'attachments' => 'ext_in[attachments,png,PNG,jpg,pdf,doc,docx]|max_size[attachments,6000]',

];

//Contact page validation--------------------

public $contact_us = [
    'full_name' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Full name field is required',
        ],
    ],
    'email_address' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Email address field is required',
        ],
    ],
    'subject' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Subject field is required',
        ],
    ],
    'message' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Message field is required',
        ],
    ],
    // 'g-recaptcha-response' => [
    //     'rules'  => 'required',
    //      'errors' => [
    //         'required' => 'Google recaptcha field is required',
    //     ],
    // ],
    'captcha_text' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Captcha field is required',
        ],
    ],

];

 //Ticket Reply validation ---------------
 public $replyticketValidate = [

    'message' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Message field is required',
        ],
    ],

    'attachments' => 'ext_in[attachments,png,PNG,jpg,pdf,doc,docx]|max_size[attachments,6000]',

]; 





    /*--------------------------------------------------------------------
                        Admin Registration validation
    --------------------------------------------------------------------*/

    public $adminLogin = [
        'admin_email' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Admin email field is required',
            ],
        ],
        'admin_pass' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Admin password field is required',
            ],
        ],

    ];
    /*--------------------------------------------------------------------
                        Forgot Password Validation
    --------------------------------------------------------------------*/

    public $forgotValidate = [
        'admin_email' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Admin email field is required',
            ],
        ],

    ];
    public $resetValidate = [
        'new_password' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'New password field is required',
            ],
        ],
        'confirm_pass' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'Confirm password field is required',
            ],
        ],

    ];


    //User Details Validate----------------------
      public $UserDetailsValidate = [
        'first_name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The First name field is required',
            ],
        ],
        'last_name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'The Last name field is required',
            ],
        ],
        // 'email' => [
        //     'rules'  => 'required|valid_email|is_unique[tbl_users.email_address]',
        //      'errors' => [
        //         'required' => 'The Email field is required',
        //         'valid_email'=>'It does not appear to be valid',
        //         'is_unique' => 'This Email already exits',
        //     ],
        // ],    
        'phone_number' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'The Phone number field is required',
            ],
         ],    

    ];

    //Send Email Validation----------
    public $sendEmailValidate = [
        'subject' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'New Email Subject field is required',
            ],
        ],
         'message' => [
            'rules'  => 'required',
             'errors' => [
                'required' => 'New message field is required',
            ],
        ],


    ];

    //Category Validation----------
      public $CategoryValidate = [
        'category_name' => [
            'rules'  => 'required|is_unique[categories.category_name]',
             'errors' => [
                'required' => 'Category Name field is required',
                'is_unique'=>'This Category Already exist',
            ],
        ],
         'category_icon' => [
            'rules'  => 'required|is_unique[categories.category_icon]',
             'errors' => [
                'required' => 'Category icon field is required',
                'is_unique'=>'This Category icon Already exist'
            ],
        ],

    ];

    //Category Validation1----------
      public $CategoryValidate1 = [
        'category_name' => [
            'rules'  => 'required|is_unique[categories.category_name]',
             'errors' => [
                'required' => 'Category Name field is required',
                'is_unique'=>'This Category Already exist',
            ],
        ],
         
    ];

     //Category Validation1----------
      public $CategoryValidate2 = [
         'category_icon' => [
            'rules'  => 'required|is_unique[categories.category_icon]',
             'errors' => [
                'required' => 'Category icon field is required',
                'is_unique'=>'This Category icon Already exist'
            ],
        ],
         
    ];

//Blog validation ---------------
 public $BlogValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],
    'description' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Description field is required',
        ],
    ],

    'image_input' => 'ext_in[image_input,png,PNG,jpg]',

];

//Reson Item validation ---------------
public $resonitemValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],
    'description' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Description field is required',
        ],
    ],
];

//Contact us validation ---------------
public $contactitemValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],
    'content' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Content field is required',
        ],
    ],
];

//CTA section validation ---------------
public $ctaitemValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],
    'description' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Description field is required',
        ],
    ],
    'url' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Url field is required',
        ],
    ],

    'button_name' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Button name field is required',
        ],
    ],
];

//CTA section validation ---------------
public $faqitemValidate = [

    'question' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Question field is required',
        ],
    ],
    'answer' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Answer field is required',
        ],
    ],
];

//Policy Page validation ---------------
public $policypageValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],

];

//Policy Page validation ---------------
public $socialiconValidate = [

    'title' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Title field is required',
        ],
    ],
    'url' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Url field is required',
        ],
    ],

];

//Testimonial validation ---------------
public $testimonialValidate = [

    'name' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Name field is required',
        ],
    ],
    'address' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Address field is required',
        ],
    ],

];

//New Pages validation ---------------
public $newpagesValidate = [

    'page_name' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Page name field is required',
        ],
    ],
    'slug' => [
        'rules'  => 'required',
         'errors' => [
            'required' => 'Slug field is required',
        ],
    ],

];
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
