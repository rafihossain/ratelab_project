   <!-- footer start -->
   <footer class="footer bg-dark">
       <div class="container-fluid">
           <div class="row p-2">
               <div class="col-md-4">
                   <a class="site-logo site-title" href="https://script.viserlab.com/ratelab">
                       <img src="https://script.viserlab.com/ratelab/assets/images/logoIcon/logo.png" alt="RateLab">
                   </a>
                   <h6 class="text-white p-4"><?php echo $footer_section[1]['settings_value']; ?></h6>
               </div>

               <div class="col-md-2">
                   <h4 class="text-white">Quick Menu</h4>
                   <hr>
                   <ul class="list-inline footer-list">
                       <li class="list-inline-item  pb-2"><a href="#">Login as User</a></li>
                       <li class="list-inline-item  pb-2"><a href="#">Crate an Account</a></li>
                       <li class="list-inline-item  pb-2"><a href="#">Support</a></li>
                   </ul>
               </div>

               <div class="col-md-3">
                   <h4 class="text-white">Important Link</h4>
                   <hr>
                   <ul class="list-inline footer-list">
                       <li class="list-inline-item  pb-2"><a href="#">Terms of Service</a></li>
                       <li class="list-inline-item  pb-2"><a href="#">Privacy Policy</a></li>
                   </ul>
               </div>

               <div class="col-md-3">
                   <h4 class="text-white">Site Links</h4>
                   <hr>

                   <ul class="list-inline footer-list">
                       <li class="list-inline-item  pb-2"><a href="<?php echo base_url(); ?>">Home</a></li>
                       <li class="list-inline-item  pb-2"><a href="<?php echo base_url(); ?>/contact">Contact</a></li>
                       <li class="list-inline-item  pb-2"><a href="<?php echo base_url(); ?>/blog">Blog</a></li>
                   </ul>
               </div>


           </div>

       </div>
   </footer>
   <!-- footer end -->

   <!-- Back to top -->
   <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>

   <!-- javascript -->
   <script src="<?php echo base_url(); ?>/frontend/js/bootstrap.bundle.min.js"></script>
   <!-- counter js -->
   <script src="<?php echo base_url(); ?>/frontend/js/counter.int.js"></script>
   <!-- Font-awesome js -->
   <script src="<?= base_url() ?>/frontend/fontawesome/js/all.js"></script>
   <!-- custom js -->
   <script src="<?php echo base_url(); ?>/frontend/js/app.js"></script>

   <!--Start of Tawk.to Script-->
   <script type="text/javascript">
       var Tawk_API = Tawk_API || {},
           Tawk_LoadStart = new Date();
       (function() {
           var s1 = document.createElement("script"),
               s0 = document.getElementsByTagName("script")[0];
           s1.async = true;
           s1.src = '<?php if ($tawkto['status'] == 1) {
                            echo $tawkto['value'];
                        } ?>';
           s1.charset = 'UTF-8';
           s1.setAttribute('crossorigin', '*');
           s0.parentNode.insertBefore(s1, s0);
       })();
   </script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-R5EM7B29T0"></script>
   <script>
       window.dataLayer = window.dataLayer || [];

       function gtag() {
           dataLayer.push(arguments);
       }
       gtag('js', new Date());

       gtag('config', 'G-R5EM7B29T0');
   </script>
   <!--End Global site tag (gtag.js) - Google Analytics-->

   </body>

   </html>