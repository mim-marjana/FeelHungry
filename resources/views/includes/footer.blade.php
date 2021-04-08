<footer class="container-fluid">
   <div class="row links">
      <div class="col-md-3 col-sm-3 col-xs-6 linkBox">
         <ul class="address">
            <li><a href="mailto:iamkawsarlive@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> feelhungry@gmail.com</a></li>
            <li><a href="tel:+8801738671782"><i class="fa fa-phone" aria-hidden="true"></i> +88017XXXXXXXX</a></li>
            <li><a href="https://www.google.com.bd/maps/place/Al+Hamra+Shopping+City/@24.897095,91.867982,18.5z/data=!4m13!1m7!3m6!1s0x3750552af8919883:0x6fc2fe33c01b3797!2zWmluZGFiYXphciwg4Ka44Ka_4Kay4KeH4Kaf!3b1!8m2!3d24.8948017!4d91.8690311!3m4!1s0x0:0x268dcbd12a1df334!8m2!3d24.8972775!4d91.8681794" target="_blank"><i class="fa fa-location-arrow" aria-hidden="true"></i> Zindabazar, Sylhet</a></li>
            <li><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00am-11:30pm Everyday</a></li>
         </ul>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6 linkBox">
         <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('menu')}}">Menu</a></li>
            <li><a href="{{route('reservation')}}">Reservation</a></li>
         </ul>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6 linkBox">
         <ul class="">
            <li><a href="{{route('faqs')}}">Faq</a></li>
            <li><a href="{{route('cart')}}">Shoping Cart</a></li>
            <li><a href="{{route('checkout')}}">Checkout</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
         </ul>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6 linkBox">
         <ul>
            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
            <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
            <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
            <li><a href="https://www.google.com.bd/maps/place/Al+Hamra+Shopping+City/@24.897095,91.867982,18.5z/data=!4m13!1m7!3m6!1s0x3750552af8919883:0x6fc2fe33c01b3797!2zWmluZGFiYXphciwg4Ka44Ka_4Kay4KeH4Kaf!3b1!8m2!3d24.8948017!4d91.8690311!3m4!1s0x0:0x268dcbd12a1df334!8m2!3d24.8972775!4d91.8681794" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</a></li>
         </ul>
      </div>
   </div>

   <div class="row footer-bottom">
      <p>All Rights Reserved 2020 ® <span>Feel Hungry</span></p>
   </div>

</footer>

   <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
   <script src="{{URL::to('assets/js/jquery-migrate.min.js')}}"></script>
   <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{URL::to('assets/js/swiper.min.js')}}"></script>
   <script src="{{URL::to('assets/js/slick.min.js')}}"></script>
   <script src="{{URL::to('assets/js/review.js')}}"></script>
   <script src="{{URL::to('assets/js/simpleLightbox.min.js')}}"></script>

   <script src="{{URL::to('assets/js/datepicker.min.js')}}"></script>
   <script src="{{URL::to('assets/js/datepicker.en.js')}}"></script>
   <script src="{{URL::to('assets/js/animatescroll.js')}}"></script>
   <script src="{{URL::to('assets/js/app.js')}}"></script>
   @yield('scripts')
</body>