<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}  

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories. 

//user panel----------
$routes->get('/', 'Home::index');

$routes->group('user',function ($routes) {

$routes->add('user-profile/(:num)','UserController::ratelab/$1');
$routes->add('login','UserController::login');
$routes->add('user_registration','UserController::registration');
$routes->add('user_logout','UserController::user_logout');

//company create---
$routes->add('company/create','CompanyController::company_create');
$routes->add('company/list','CompanyController::company_list');
$routes->add('company/edit/(:any)','CompanyController::company_edit/$1');

//company review---------
$routes->add('company/review/(:any)','CompanyController::company_review/$1');
$routes->add('company/reviews/edit','CompanyController::company_review_edit');
$routes->add('company/reviews_delete/(:any)','CompanyController::company_review_delete/$1');  

//company search-----------
$routes->add('company/search','CompanyController::company_search');
$routes->add('category_company_search','CompanyController::category_company_search');
$routes->add('review_search','CompanyController::review_search');
$routes->add('review_by_time','CompanyController::review_by_time');

});

//Support Ticket user site--------
$routes->add('support/ticket','SupportController::all_ticket');
$routes->add('support/ticket/new','SupportController::new_ticket');
$routes->add('support/ticket/view/(:any)','SupportController::ticket_view/$1');
$routes->add('support/ticket/close/(:any)','SupportController::ticket_close/$1');
$routes->add('support/ticket/reply/(:any)','SupportController::ticket_reply/$1');

//Company all for review system--------------
$routes->add('companies/all','CompanyController::company_all');

//Blog Frontend--------------
$routes->add('blog','FrontendController::blog');
$routes->add('blog_details/(:any)','FrontendController::blog_details/$1');

//Contact Frontend--------------
$routes->add('contact','FrontendController::contact');

//Admin panel--------------------
$routes->group('admin',function ($routes) {

$routes->add('login','AdminController::adminLogin');
$routes->add('logout','AdminController::adminLogout');

$routes->add('forgot_pass','AdminController::forgotPass');
$routes->add('reset_pass/(:any)','AdminController::resetPass/$1');

//admin part of user-------
$routes->add('all_users','UserController::all_users');
$routes->add('active_users','UserController::active_users');
$routes->add('banned_users','UserController::banned_users');
$routes->add('email_unverified','UserController::email_unverified');
$routes->add('sms_unverified','UserController::sms_unverified');
$routes->add('all_users/details/(:any)','UserController::user_details/$1');
$routes->add('user/login_history/(:any)','UserController::login_history/$1');
$routes->add('user/send-email/(:any)','UserController::send_email/$1');
$routes->add('user/send_email_all','UserController::send_email_all');

//report-----------------------------------
$routes->group('report',function ($routes) {
	$routes->add('login_history','ReportController::user_login_history');	
	$routes->add('email_history','ReportController::userEmailHistory');	
});	

//Category------------------------------
$routes->group('category',function ($routes){
	$routes->add('/','CategoryController::index');
	$routes->add('edit','CategoryController::edit');		
});

$routes->group('settings', function ($routes) {
	$routes->add('general', 'SettingsController::gereral');
	$routes->add('logo_favicon', 'SettingsController::logoFavicon');
	$routes->add('extensions', 'SettingsController::extensions');
	
	$routes->add('get_specific_extension', 'SettingsController::getSpecificExtension');
	$routes->add('update_specific_extension', 'SettingsController::updateSpecificExtension');
	$routes->add('activated_extension', 'SettingsController::activatedExtension');
	$routes->add('deactivated_extension', 'SettingsController::deactivatedExtension');
	
	$routes->add('language', 'SettingsController::language');
	$routes->add('add_new_language', 'SettingsController::addNewLanguage');
	$routes->add('edit_language', 'SettingsController::editLanguage');
	$routes->add('delete_language', 'SettingsController::deleteLanguage');
	
	$routes->add('seo_manager', 'SettingsController::seoManager');

	//email template------------------
	$routes->add('email_template/global', 'SettingsController::emailTemplateGlobal');
	$routes->add('email_template/index', 'SettingsController::emailTemplate');
	$routes->add('email_template/edit/(:any)', 'SettingsController::emailTemplateEdit/$1');
	$routes->add('email_template/setting', 'SettingsController::emailTemplateSetting');
	
	//sms template-------------------
	$routes->add('sms_template/global', 'SettingsController::smsTemplateGlobal');
	$routes->add('sms_template/index', 'SettingsController::smsTemplate');
	$routes->add('sms_template/edit/(:any)', 'SettingsController::smsTemplateEdit/$1');
	$routes->add('sms_template/setting', 'SettingsController::smsTemplateSetting');

	//extra setting------------------------
	$routes->add('cookie', 'SettingsController::gdprCookie');
	$routes->add('system_info', 'SettingsController::systemInformation');
	$routes->add('custom_css', 'SettingsController::customCss');
	$routes->add('request_report', 'SettingsController::requestReport');
});

$routes->group('frontend', function ($routes) {

	//Manages Pages----------------------------
	$routes->add('manage_pages', 'FrontendManagerController::manage_pages');

	//manage templates-------------------------
	$routes->add('manage_templates', 'FrontendManagerController::manage_templates');

	//manage sectiion--------------------------
	$routes->add('banner_section', 'FrontendManagerController::banner_section');
	$routes->add('blog_section', 'FrontendManagerController::blog_section');
	$routes->add('breadcrumb', 'FrontendManagerController::breadcrumb');
	$routes->add('category-section', 'FrontendManagerController::category_section');
	$routes->add('choose_reason', 'FrontendManagerController::choose_reason');
	$routes->add('company_list_section', 'FrontendManagerController::company_list_section');
	$routes->add('contact_us', 'FrontendManagerController::contact_us');
	$routes->add('cta_section', 'FrontendManagerController::cta_section');
	$routes->add('email_authentication', 'FrontendManagerController::email_authentication');
	$routes->add('faq_section', 'FrontendManagerController::faq_section');
	$routes->add('footer_section', 'FrontendManagerController::footer_section');
	$routes->add('forgot_password_page', 'FrontendManagerController::forgot_password_page');
	$routes->add('login_section', 'FrontendManagerController::login_section');
	$routes->add('mobile_authentication', 'FrontendManagerController::mobile_authentication');
	$routes->add('policy_page', 'FrontendManagerController::policy_page');
	$routes->add('register', 'FrontendManagerController::register');
	$routes->add('reset_password', 'FrontendManagerController::reset_password');
	$routes->add('review', 'FrontendManagerController::review');
	$routes->add('social_icon', 'FrontendManagerController::social_icon');
	$routes->add('testimonial', 'FrontendManagerController::testimonial');
	$routes->add('verification_code', 'FrontendManagerController::verification_code');

	//blog-----------------------
	$routes->group('blog', function ($routes) {
		$routes->add('create', 'ManageController::create');
		$routes->add('delete/(:any)','ManageController::delete/$1');
		$routes->add('edit/(:any)','ManageController::edit/$1');
		$routes->add('update/(:any)','ManageController::update/$1');
	});

});

//Choose reason Item----------------------
$routes->add('reason_item_insert', 'ManageController::reason_item_insert');
$routes->add('reason_item_index', 'ManageController::reason_item_index');
$routes->add('reason_item_delete', 'ManageController::reason_item_delete');
$routes->add('reason_item_edit', 'ManageController::reason_item_edit');
$routes->add('reason_item_update', 'ManageController::reason_item_update');

//Contact us reason Item----------------------
$routes->add('contact_item_insert', 'ManageController::contact_item_insert');
$routes->add('contact_item_index', 'ManageController::contact_item_index');
$routes->add('content_item_delete', 'ManageController::content_item_delete');
$routes->add('content_item_edit', 'ManageController::content_item_edit');
$routes->add('contact_item_update', 'ManageController::contact_item_update');

//Contact us reason Item----------------------
$routes->add('cta_item_insert', 'ManageController::cta_item_insert');
$routes->add('cta_item_index', 'ManageController::cta_item_index');
$routes->add('cta_item_delete', 'ManageController::cta_item_delete');
$routes->add('cta_item_edit', 'ManageController::cta_item_edit');
$routes->add('cta_item_update', 'ManageController::cta_item_update');

//Faq section----------------------------------
$routes->add('faq_item_submit', 'ManageController::faq_item_insert');
$routes->add('faq_item_index', 'ManageController::faq_item_index');
$routes->add('faq_item_delete', 'ManageController::faq_item_delete');
$routes->add('faq_item_edit', 'ManageController::faq_item_edit');
$routes->add('faq_item_update', 'ManageController::faq_item_update');

//Policy Page------------------------------------
$routes->add('policy_page_submit', 'ManageController::policy_page_insert');
$routes->add('policy_page_index', 'ManageController::policy_page_index');
$routes->add('policy_page_delete', 'ManageController::policy_page_delete');
$routes->add('policy_page_edit', 'ManageController::policy_page_edit');
$routes->add('policy_page_update', 'ManageController::policy_page_update');

//Spcial Icon--------------------------------------
$routes->add('social_icon_submit', 'ManageController::social_icon_insert');
$routes->add('social_icon_index', 'ManageController::social_icon_index');
$routes->add('social_icon_delete', 'ManageController::social_icon_delete');
$routes->add('social_icon_edit', 'ManageController::social_icon_edit');
$routes->add('social_icon_update', 'ManageController::social_icon_update');

//Testimonial --------------------------------------
$routes->add('testimonial_item_submit', 'ManageController::testimonial_item_insert');
$routes->add('testimonial_item_index', 'ManageController::testimonial_item_index');
$routes->add('testimonial_item_delete', 'ManageController::testimonial_item_delete');
$routes->add('testimonial_item_edit', 'ManageController::testimonial_item_edit');
$routes->add('testimonial_item_update', 'ManageController::testimonial_item_update');

//New Pages-------------------------------------------
$routes->add('new_page_submit', 'ManageController::new_page_insert');
$routes->add('new_page_index', 'ManageController::new_page_index');
$routes->add('new_page_edit/(:any)', 'ManageController::new_page_edit/$1');
$routes->add('testimonial_item_update', 'ManageController::testimonial_item_update');

//Company------------------------------
$routes->group('companies',function ($routes){
	$routes->add('all','CompanyController::all_campanies');
	$routes->add('details/(:any)','CompanyController::campanies_details/$1');
	$routes->add('approve/(:any)','CompanyController::campanies_approve/$1');
	$routes->add('reject/(:any)','CompanyController::campanies_reject/$1');
	$routes->add('pending','CompanyController::campanies_pending');
	$routes->add('approve','CompanyController::campanies_approve_list');
	$routes->add('reject','CompanyController::campanies_reject_list');	$routes->add('category/(:any)', 'CompanyController::companyCategoryList/$1');				
});

//Review-----------------------------
$routes->group('reviews',function ($routes){
	$routes->add('/','ReviewController::all_reviews');
	$routes->add('view','ReviewController::review_view');
	$routes->add('delete/(:any)','ReviewController::delete/$1');
				
});	

//advertisement--------------------------
$routes->add('advertisement', 'AdvertisementController::index');
$routes->add('advertisement_update/(:any)', 'AdvertisementController::advertisementUpdate/$1');

$routes->add('ads_control/(:any)', 'AdvertisementController::adsManage/$1');


//Suuport--------------------------
$routes->group('tickets',function ($routes){

   $routes->add('/', 'SupportController::index');
   $routes->add('view/(:any)','SupportController::admin_ticket_view/$1');
   $routes->add('delete/(:any)','SupportController::admin_ticket_delete/$1');
   $routes->add('closed','SupportController::admin_ticket_closed');
});

});

$routes->get('home', 'Home::dashboard');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
