7========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="<?= base_url() ?>/home">
                        <i class="fas fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#email" data-bs-toggle="collapse">
                        <i class="fas fa-users"></i>
                        <span> Manage Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/all_users">All Users</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/active_users">Active Users</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/banned_users">Banned Users</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/email_unverified">Email Unverified</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/sms_unverified">SMS Unverified</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/user/send_email_all">Email to All</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url() ?>/admin/category">
                        <i class="fas fa-stamp"></i>
                        <span>Categoreis</span>
                    </a>
                </li>

                <li>
                    <a href="#companies" data-bs-toggle="collapse">
                        <i class="mdi mdi-bank"></i>
                        <span> Companies </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="companies">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/companies/all">All Companies</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/companies/pending">Pending Companies</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/companies/approve">Approved Companies</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/companies/reject">Rejected Companies</a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url() ?>/admin/reviews">
                        <i class="mdi mdi-comment-multiple-outline"></i>
                        <span> Reviews </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/admin/advertisement">
                        <i class="fas fa-ad"></i>
                        <span> Advertisement </span>
                    </a>
                </li>

                <li>
                    <a href="#support" data-bs-toggle="collapse">
                        <i class="fas fa-ticket-alt"></i>
                        <span> Support Ticket </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="support">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/tickets">All Ticket</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/active_users">Pending Ticket</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/tickets/closed">Closed Ticket</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/email_unverified">Answered Ticket</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#contacts" data-bs-toggle="collapse">
                        <i class="fas fa-list"></i>
                        <span> reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/report/login_history">Login History</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/report/email_history">Email History</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Settings</li>

                <li>
                    <a href="<?= base_url() ?>/admin/settings/general">
                        <i class="mdi mdi-steering"></i>
                        <span> General Setting </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/settings/logo_favicon">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span> Logo & Favicon </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/settings/extensions">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span> Extensions </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/admin/settings/language">
                        <i class="mdi mdi-inbox"></i>
                        <span> Language </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/admin/settings/seo_manager">
                        <i class="mdi mdi-earth"></i>
                        <span> SEO Manager </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEmailManager" data-bs-toggle="collapse">
                        <i class="mdi mdi-contacts"></i>
                        <span> Email Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmailManager">
                        <ul class="nav-second-level">
                            <li>
                                <!-- <i class="mdi mdi-checkbox-blank-circle-outline"></i> -->
                                <a href="<?= base_url() ?>/admin/settings/email_template/global">Global Template</a>
                            </li>
                            <li>
                                <!-- <i class="mdi mdi-checkbox-blank-circle-outline"></i> -->
                                <a href="<?= base_url() ?>/admin/settings/email_template/index">Email Templates</a>
                            </li>
                            <li>
                                <!-- <i class="mdi mdi-checkbox-blank-circle-outline"></i> -->
                                <a href="<?= base_url() ?>/admin/settings/email_template/setting">Email Configure</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSmsManager" data-bs-toggle="collapse">
                        <i class="mdi mdi-cellphone-android"></i>
                        <span> SMS Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSmsManager">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/settings/sms_template/global">Global Setting</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/settings/sms_template/setting">SMS Gateways</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/settings/sms_template/index">SMS Templates</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">FRONTEND MANAGER</li>

                <li>
                    <a href="<?= base_url()?>/admin/frontend/manage_templates">
                        <i class="mdi mdi-steering"></i>
                        <span> Manage Templates </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/frontend/manage_pages">
                        <i class="mdi mdi-steering"></i>
                        <span> Manage Pages </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span> Manage Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/banner_section">Banner Section</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/blog_section">Blog Section</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/breadcrumb">Breadcrumb</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/category-section">Category Section</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/choose_reason">Why Choose Us</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/company_list_section">Company list Section</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/contact_us">Contact Us</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/cta_section">CTA Section</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/email_authentication">Email Authentication</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/faq_section">FAQ's</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/footer_section">Footer</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/forgot_password_page">Forgot Password Page</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/login_section">Login</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/mobile_authentication">Mobile Authentication</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/policy_page">Policy Pages</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/register">Register</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/reset_password">Reset Password Page</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/review">Review</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/social_icon">Social Icon</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/testimonial">Testimonial</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/admin/frontend/verification_code">Verification Code Page</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title mt-2">Extra</li>

                <li>
                    <a href="<?= base_url() ?>/admin/settings/cookie">
                        <i class="fas fa-cookie-bite"></i>
                        <span> GDPR Cookie </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/settings/system_info">
                        <i class="fas fa-server"></i>
                        <span> System Information </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/settings/custom_css">
                        <i class="fab fa-css3-alt"></i>
                        <span> Custom CSS </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/admin/settings/request_report">
                        <i class="fas fa-bug"></i>
                        <span> Report & Request </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End