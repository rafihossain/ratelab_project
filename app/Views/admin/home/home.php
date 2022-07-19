 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <style>
     .dashboard-w1 {
         display: -ms-flexbox;
         display: flex;
         -ms-flex-wrap: wrap;
         flex-wrap: wrap;
         min-height: 130px;
         justify-content: flex-end;
         overflow: hidden;
         transition: all 0.3s;
         -webkit-transition: all 0.3s;
         -moz-transition: all 0.3s;
         -ms-transition: all 0.3s;
         -o-transition: all 0.3s;
         position: relative;
         align-items: center;
         padding: 30px 20px;
     }

     .bg--info {
         background-color: #1e9ff2 !important;
     }

     .bg--success {
         background-color: #28c76f !important;
     }

     .bg--warning {
         background-color: #ff9f43 !important;
     }

     .bg--5 {
         background-color: #d92027 !important;
     }

     .bg--primary {
         background-color: #7367f0 !important;
     }

     .bg--green {
         background-color: #4CAF50 !important;
     }

     .bg--red {
         background-color: #F44336 !important;
     }

     .bg--danger {
         background-color: #ea5455 !important;
     }

     .mb-30 {
         margin-bottom: 30px !important;
     }

     .b-radius--10 {
         border-radius: 10px;
     }

     .dashboard-w1 .details .amount {
         color: #ffffff;
         font-size: 24px;
         font-weight: 500;
         line-height: 1;
     }

     .dashboard-w1 .details .desciption span {
         color: #ffffff;
         font-size: 14px;
         font-weight: 300;
         display: inline-block;
         margin-top: 5px;
     }

     .text--small {
        font-size: 0.75rem !important;
     }

     .dashboard-w1 .details {
        text-align: right;
    }

    .bg--white {
        background-color: #ffffff !important;
    }

    .dashboard-w1 .icon {
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .dashboard-w1 .icon i {
        font-size: 72px;
        color: rgba(255, 255, 255, 0.15);
        margin-left: -15px;
        margin-bottom: -4px;
    }

 </style>


 <div class="content-page">
     <div class="content">

         <!-- Start Content-->
         <div class="container-fluid">

             <div class="row">

                 <div class="row mb-none-30">
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--info b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="mdi mdi-bank"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $totalcompany; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Companies</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/companies/all" class="btn btn-sm text--small bg--white text-black box-shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="mdi mdi-thumb-up"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $approvedcompany; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Approved Companies</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/companies/approve" class="btn btn-sm text--small bg--white text-black box-shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
                     <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--warning b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="mdi mdi-motion-pause"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $pendingcompany; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Pending Companies</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/companies/pending" class="btn btn-sm text--small bg--white text-black box-shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--5 b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="fas fa-ban"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $rejectcompany; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Rejected Companies</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/companies/reject" class="btn btn-sm text--small bg--white text-black box-shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div>
                 </div><!-- row end-->

                 <div class="row mt-50 mb-none-30">
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="fa fa-users"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $totaluser; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Users</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/all_users" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--green b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="fas fa-user-check"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $activeuser; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Active Users</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/active_users" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--red b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="fas fa-comment-slash"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $emailunverified; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total Email Unverified Users</span>
                                 </div>
                                 <a href="<?= base_url() ?>/admin/email_unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
                     <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--danger b-radius--10 box-shadow">
                             <div class="icon">
                                 <i class="fas fa-phone-slash"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount"><?= $smsunverified; ?></span>
                                 </div>
                                 <div class="desciption">
                                     <span class="text--small">Total SMS Unverified Users</span>
                                 </div>

                                 <a href="<?= base_url() ?>/admin/sms_unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
                 </div>

                 <div class="row mb-none-30 mt-5">
                     <div class="col-xl-4 col-lg-6 mb-30">
                         <div class="card overflow-hidden">
                             <div class="card-body">
                                 <h4 class="header-title mt-0">Login By Browser</h4>

                                 <div class="widget-chart text-center">
                                     <div id="userBrowserChart" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-6 mb-30">
                         <div class="card">
                             <div class="card-body">
                                 <h5 class="header-title mt-0">Login By OS</h5>

                                 <div class="widget-chart text-center">
                                     <div id="userOsChart" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-6 mb-30">
                         <div class="card">
                             <div class="card-body">
                                 <h5 class="header-title mt-0">Login By Country</h5>

                                 <div class="widget-chart text-center">
                                     <div id="userCountryChart" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>


             </div><!-- bodywrapper__inner end -->
         </div><!-- body-wrapper end -->
     </div>

     <!-- end row -->

 </div> <!-- container-fluid -->

 </div> <!-- content -->

 <!--Morris Chart-->
 <script src="<?= base_url() ?>/admin/assets/libs/morris.js06/morris.min.js"></script>
 <script src="<?= base_url() ?>/admin/assets/libs/raphael/raphael.min.js"></script>

 <!-- Dashboar init js-->
 <script src="<?= base_url() ?>/admin/assets/js/pages/dashboard.init.js"></script>

 <script>
     !(function(e) {
         function a() {
             this.$realData = [];
         }
         (a.prototype.createDonutChart = function(e, a, r) {
             Morris.Donut({
                 element: e,
                 data: a,
                 resize: !0,
                 colors: r,
                 backgroundColor: "transparent"
             });
         }),
         (a.prototype.init = function() {
             e("#userBrowserChart").empty();
             e("#userOsChart").empty();
             e("#userCountryChart").empty();

             this.createDonutChart(
                 "userBrowserChart",
                 [{
                         label: "Chrome",
                         value: 77
                     },
                     {
                         label: "Handheld Browser",
                         value: 10
                     },
                     {
                         label: "Firefox",
                         value: 5
                     },
                 ],
                 ["#FF7675", "#6C5CE7", "#FFA62B"]
             );
             this.createDonutChart(
                 "userOsChart",
                 [{
                         label: "Windows 10",
                         value: 75
                     },
                     {
                         label: "iPhone",
                         value: 1
                     },
                     {
                         label: "Linux",
                         value: 1
                     },
                     {
                         label: "Windows 8.1",
                         value: 1
                     },
                     {
                         label: "Android",
                         value: 9
                     },
                     {
                         label: "Mac OS X",
                         value: 5
                     },
                 ],
                 ["#FF7675", "#6C5CE7", "#FFA62B", "#FFEAA7", "#D980FA", "#FCCBCB"]
             );
             this.createDonutChart(
                 "userCountryChart",
                 [{
                         label: "Bangladesh",
                         value: 42
                     },
                     {
                         label: "India",
                         value: 5
                     },
                     {
                         label: "Netherlands",
                         value: 5
                     },
                     {
                         label: "Nigeria",
                         value: 5
                     },
                     {
                         label: "Turkey",
                         value: 4
                     },
                 ],
                 ["#FF7675", "#6C5CE7", "#FFA62B", "#FFEAA7", "#D980FA"]
             );

         }),
         (e.Dashboard1 = new a()),
         (e.Dashboard1.Constructor = a);
     })(window.jQuery),
     (function(a) {
         a.Dashboard1.init(),
             window.addEventListener("adminto.setBoxed", function(e) {
                 a.Dashboard1.init();
             }),
             window.addEventListener("adminto.setFluid", function(e) {
                 a.Dashboard1.init();
             });
     })(window.jQuery);
 </script>

 <?= $this->endSection() ?>