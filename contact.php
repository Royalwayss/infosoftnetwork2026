<?php include 'include/header.php'; ?>
<!-- end navbar -->
<header class="page-header inner-pages-banner">
  <div class="video-bg">
    <video src="images/contact-2.mp4" muted loop autoplay></video>
  </div>
  <!-- end video-bg -->
  <div class="container">
    <div class="banner-heading">
  	<h1>Contact us</h1>
    <h1></h1>
    </div>

  	<h2></h2>
  </div>
  <!-- end container -->
  <!-- <aside class="left-side">
    <ul>
      <li><a href="#">FACEBOOK</a></li>
      <li><a href="#">BEHANCE</a></li>
      <li><a href="#">DRIBBBLE</a></li>
    </ul>
  </aside> -->
  <!-- end left-side -->
  <div class="scroll-down"><small>SCROLL DOWN</small><span></span></div>
  <!-- end scroll-down -->
  <!-- <div class="sound"> <span> SOUND </span>
    <div class="equalizer">
      <div class="holder"> <span></span> <span></span> <span></span> <span></span><span></span><span></span> </div>
   
    </div>

  </div> -->
  <!-- end sound -->
</header>

<!-- end header -->
<section class="hello">
  <div class="container">
    <div class="row">
      <div class="col-12 wow fadeIn">
        <!-- <h6>SMOOTH INTERFACE INTERACTION</h6> -->
        <h2 data-text="">Your Queries, Our Priority! Contact Us Now</h2>
      </div>
      <!-- end col-12 -->
      <div class="col-md-4 wow fadeIn">
      	<address>
      		<b>Address</b>
      		<p>Bridge Nagar, Civil Lines, Ludhiana 141001<br></p>
      	</address>
      </div>
      <!-- end col-4 -->
      <div class="col-md-4 wow fadeIn" data-wow-delay="0.05s">
      	<address>
      		<b>Phone</b>
      		<!-- <p>+ 91-98142-01323</p> -->
          <a href="tel:+919814201323" class="">+9198142-01323</a>
      	</address>
      </div>
      <!-- end col-4 -->
       <div class="col-md-4 wow fadeIn" data-wow-delay="0.10s">
      	<address>
      		<b>Phone</b>
      	
          <a href="mailto:info@infosoftnetwork.com" class="color-white">info@infosoftnetwork.com</a>
      	</address>
      </div>
      <!-- end col-4 -->
	  </div>
     <!-- end row -->
     <div class="row align-items-center">
      <div class="col-lg-6 wow fadeIn">
      	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5494.9237105508755!2d30.7404548782959!3d46.47916644771724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c6319eaca4b7c3%3A0x9ca0fc29348e76f0!2z0YPQuy4g0JbRg9C60L7QstGB0LrQvtCz0L4sIDE1LCDQntC00LXRgdGB0LAsINCe0LTQtdGB0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDY1MDAw!5e0!3m2!1sru!2sua!4v1550768857290" width="100%" height="640" frameborder="0" style="border:0" allowfullscreen></iframe> -->
  <img src="images/contact-2-inner.jpg">
      </div>
      <!-- end col-6 -->
      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.05s">
      	 <form class="row inner" id="contact" name="contact" method="post" action="save-contact.php" action="save-contact.php">
        <div class="form-group col-sm-6 col-12">
          <label><span>First name</span></label>
          <input type="text" name="first_name" id="first_name" >
        </div>
        <!-- end form-group -->
        <div class="form-group col-sm-6 col-12">
          <label><span>Last name</span></label>
          <input type="text" name="last_name" id="last_name" >
        </div>
        <!-- end form-group -->
        <div class="form-group col-sm-6 col-12">
          <label><span> E-mail</span></label>
          <input type="text" name="email" id="email" >
        </div>
         <div class="form-group col-sm-6 col-12">
          <label><span> Mobile </span></label>
          <input type="text" name="phone" id="number" >
        </div>
        <!-- end form-group -->
        <!-- <div class="form-group col-sm-6 col-12">
          <label><span>Subject</span></label>
          <input type="text" name="subject" id="subject" required>
        </div> -->
        <!-- end form-group -->
        <div class="form-group col-12">
          <label><span>Your message</span></label>
          <textarea name="message" id="message" ></textarea>
        </div>
        <!-- end form-group -->
        <div class="form-group col-12">
          <button id="submit" type="submit" name="submit">SUBMIT</button>
        </div>
        <!-- end form-group -->
      </form>
      <!-- end form --> 
       <div id="success" class="alert alert-success" role="alert"> Your message was sent successfully! We will be in touch as soon as we can. </div>
        <!-- end success -->
        <div id="error" class="alert alert-danger" role="alert"> Something went wrong, try refreshing and submitting the form again. </div>
        <!-- end error --> 
      </div>
      <!-- end col-6 -->
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end hello -->
<?php include 'include/footer.php'; ?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script>
/*
$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');
*/
jQuery(function ($) {
    "use strict";
    $('#contact').validate({
        ignore: [],
		rules: {
            first_name: {
                required: true
            },
			last_name: {
                required: true
            },
			phone: {
			   required: true,
			   minlength: 9,
			   maxlength:15,
            },
			email: {
               required: true,
               email: true,
            },
			message: {
                required: true
            },
		/*	"hidden-grecaptcha": {
              required: true,
            }, */
			
        },
		messages: {
                first_name:{
                    required:"Enter your first name.",
                },
				last_name:{
                    required:"Enter your last name.",
                },
				phone: {
					  required: "Enter a valid mobile number",
					  minlength: "Mobile number must be at least 9 digits.",
				},
				email: {
				     required: "Enter your email",
                     email: "Enter a valid email address",
               },
			  message: {
                required: "Enter your message"
            },
			/*"hidden-grecaptcha": {
				required: "reCAPTCHA is mandatory."
			} */
          },
    });
});
/*
function recaptchaCallback() {
	    var response = grecaptcha.getResponse(),
		$button = jQuery(".document-btn");
		jQuery("#hidden-grecaptcha").val(response);
} */
</script>