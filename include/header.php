<!doctype html>
<?php 
include('admin/include/config.php');
$pageName = basename($_SERVER['PHP_SELF']);
?>
<html lang="en">

  <head>

    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GJNBNMSH6P"></script>

    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'G-GJNBNMSH6P');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#ff5900" />
    <meta name="HandheldFriendly" content="true" />
    <meta property="og:site_name" content="Infosoft Network" />

    <?php if($pageName == 'index.php') { ?>
    <title>Digital Marketing, SEO & Web Development Agency in Ludhiana, Punjab, India - Infosoft Network</title>
    <meta name="description" content="Infosoft Network is a premier digital marketing agency in Ludhiana, Punjab, India. We specialize in SEO, PPC, social media, web design, e commerce and mobile app development to help businesses grow online." />
    <meta name="keywords" content="digital marketing agency India, seo company ludhiana, web development India, online marketing agency punjab" />
    <?php }else if($pageName == 'about-us.php'){  ?>
    <title>About Infosoft Network - Digital Marketing Agency in Ludhiana, India</title>
    <meta name="description" content="Learn about Infosoft Network - a leading digital marketing and SEO agency based in Ludhiana, Punjab. Discover our mission, team and what makes us India's trusted growth partner." />
    <meta name="keywords" content="about infosoft network, digital agency ludhiana, seo agency punjab india, who is infosoft network, digital marketing team india" />
    <?php }else if($pageName == 'our-portfolio.php'){  ?>
    <title>Our Portfolio - Digital Marketing & Web Projects - Infosoft Network</title>
    <meta name="description" content="Explore Infosoft Network's portfolio of successful digital marketing, SEO and web development projects. See real results delivered for businesses across India and beyond." />
    <meta name="keywords" content="infosoft network portfolio, digital marketing case studies india, seo portfolio, web development work India, client projects Infosoft" />
    <?php }else if($pageName == 'out-clients.php'){  ?>
    <title>Our Clients - Trusted by Businesses Across India - Infosoft Network</title>
    <meta name="description" content="Infosoft Network is trusted by businesses across India and globally. Meet the brands we've helped grow with SEO, digital marketing and web solutions." />
    <meta name="keywords" content="infosoft network clients, digital marketing clients india, seo agency clients, trusted brands infosoft, business partners india" />
    <?php }else if($pageName == 'contact-us.php'){  ?>
    <title>Contact Infosoft Network - Digital Marketing Agency in Ludhiana, India</title>
    <meta name="description" content="Get in touch with Infosoft Network for SEO, SMO, digital marketing, web development, mobile development and more. Reach our Ludhiana office or connect online - we're ready to grow your business." />
    <meta name="keywords" content="contact infosoft network, digital agency contact ludhiana, seo company contact india, get in touch infosoft, digital marketing inquiry india" />
    <?php }else if($pageName == 'local-seo-services-in-india.php'){  ?>
    <title>Local SEO Services in India - Rank in Your City, Near Me Searches, Google Maps Optimization</title>
    <meta name="description" content="Appear in local searches and Google Maps with Infosoft Network's local SEO services in India. Dominate near-me searches and attract ready-to-buy local customers Get local SEO services packages at affordable prices." />
    <meta name="keywords" content="local seo services india, local seo company, near me seo, google maps optimization india, city-based seo services" />
    <?php }else if($pageName == 'technical-seo-services-in-india.php'){  ?>
    <title>Technical SEO Services in India - Fix, Crawl, Index & Rank on Google & AI Results</title>
    <meta name="description" content="Fix crawl errors, improve core web vitals & build a search-ready website with Infosoft Network's Technical SEO services in India. We have over 25+ year of experience in technical SEO. Hire expert & professional technical SEO team." />
    <meta name="keywords" content="technical seo services india, crawl optimization, core web vitals, website technical audit india, site speed optimization seo" />
    <?php }else if($pageName == 'answer-engine-optimization-services-in-india.php'){  ?>
    <title>Answer Engine Optimization Services in India - AEO Services, AI Answer Optimization</title>
    <meta name="description" content="Win featured snippets, voice search & AI answers with AEO services in India by Infosoft Network. Position your brand as the answer before users even click. Get best & result oriented AEO & AI services." />
    <meta name="keywords" content="aeo services india, answer engine optimization india, featured snippet optimization, voice search seo india, ai search optimization" />
    <?php }else if($pageName == 'generative-engine-optimization-services-in-india.php'){  ?>
    <title>Generative Engine Optimization Services in India - GEO Services, ChatGPT, Gemini, Claude and Manus AI & LLM Optimization</title>
    <meta name="description" content="Get recommended by ChatGPT, Google Gemini, Claude, Manus Meta with GEO services in India. Infosoft Network helps brands appear in AI-generated answers and recommendations. Hire high quality LLMO optimization services." />
    <meta name="keywords" content="geo services india, generative engine optimization india, ai search visibility, chatgpt brand mentions, google sge optimization india" />
    <?php }else if($pageName == 'google-business-profile-optimization-services-in-india.php'){  ?>
    <title>Google Business Profile Optimization Services in India - Infosoft Network</title>
    <meta name="description" content="Boost your local visibility and trust with expert Google Business Profile optimization in India. Infosoft Network helps you rank in Google Maps & local pack searches." />
    <meta name="keywords" content="google business profile optimization india, gbp optimization services, google maps ranking india, gmb optimization, local pack seo india" />
    <?php }else if($pageName == 'digital-marketing-services-in-india.php'){  ?>
    <title>Digital Marketing Services in India - Best Performance Marketing Company - Infosoft Network</title>
    <meta name="description" content="From SEO to paid ads, content to social media - Infosoft Network offers end-to-end digital marketing services in India designed to drive real business growth. One of the best and leading performance marketing company in India." />
    <meta name="keywords" content="digital marketing services india, online marketing company india, seo and ppc india, digital marketing agency ludhiana, full-service digital marketing india" />
    <?php }else if($pageName == 'ppc-services-in-india.php'){  ?>
    <title>PPC Services - Google Ads, Meta Ads, YouTube, Twitter & LinkedIn Ads Services in India - Performance-Driven Ads - Infosoft Network</title>
    <meta name="description" content="Get instant visibility and qualified leads with PPC services in India. Best and result oriented Google Ads, Meta Ads, Facebook, Instagram YouTube, Twitter & LinkedIn Ads services in India. Infosoft Network builds conversion-focused ad campaigns that deliver measurable ROI." />
    <meta name="keywords" content="ppc services india, google ads management india, pay-per-click advertising india, google ads agency india, performance marketing india" />
    <?php }else if($pageName == 'social-media-optimization-services-in-india'){  ?>
    <title>SMO Services - Facebook, Instagram, YouTube, Twitter & LinkedIn Organic Post Promotion in India</title>
    <meta name="description" content="Stay visible, relevant and remembered with SMO services in India by Infosoft Network. We optimize your social media presence to build brand trust and drive engagement on Facebook, Instagram, Twitter, YouTube & LinkedIn." />
    <meta name="keywords" content="smo services india, social media optimization india, social media marketing agency india, instagram post promotion, facebook post promotion, linkedIn optimization, brand awareness india" />
    <?php }else if($pageName == 'content-marketing-services-in-india.php'){  ?>
    <title>Content Marketing Services in India - Words That Rank & Convert - Infosoft Network</title>
    <meta name="description" content="Grow organic traffic and authority with expert content marketing services in India. Infosoft Network creates content that educates, ranks, and drives real conversions." />
    <meta name="keywords" content="content marketing services india, blog writing seo india, content strategy india, content marketing agency, seo content india" />
    <?php }else if($pageName == 'website-design-services-in-india.php'){  ?>
    <title>Website Design Services in India - Professional Web Designers, Conversion-Focused Design - Infosoft Network</title>
    <meta name="description" content="Get a website that converts, not just one that looks good. Infosoft Network offers professional website design services in India built for speed, UX and lead generation. Infosoft have team of expert professional web designers and experts. Request a quote." />
    <meta name="keywords" content="website design services India, web design company India, professional website design, conversion-focused web design, responsive website design India" />
    <?php }else if($pageName == 'website-development-services-in-india.php'){  ?>
    <title>Website Development Services in India - Fast, Scalable & SEO-Ready - Infosoft Network</title>
    <meta name="description" content="Build a high-performance website with Infosoft Network's website development services in India. Custom, mobile-first, SEO-ready websites designed for business growth We are a team of professional and expert web developers. Request a quote now." />
    <meta name="keywords" content="website development services india, web development company india, custom website development, seo-ready website india, mobile-first web development india" />
    <?php }else if($pageName == 'ecommerce-development-services-in-india.php'){  ?>
    <title>Ecommerce Development Services in India - Stores That Sell, Best e Commerce Developers</title>
    <meta name="description" content="Build a conversion-focused online store with Infosoft Network's ecommerce development services in India. From design to checkout, every element is built to sell. Get high quality e commerce development at affordable prices." />
    <meta name="keywords" content="ecommerce development services india, online store development india, ecommerce website india, woocommerce shopify development india, ecommerce agency india" />
    <?php }else if($pageName == 'mobile-app-development-services-in-india.php'){  ?>
    <title>Mobile App Development Services in India - iOS & Android App Development Company</title>
    <meta name="description" content="Launch high-performance iOS and Android apps with Infosoft Network's mobile app development services in India. User-centric, scalable and built for real-world impact. Expert iPhone and Android mobile app developers near you. Request a quote." />
    <meta name="keywords" content="mobile app development india, ios android app development india, custom app development, mobile app company india, hybrid app development india" />
    <?php }else if($pageName == 'seo-services-in-india.php'){  ?>
    <title>SEO Services in India - Expert Search Engine Optimization, Professional SEO Company</title>
    <meta name="description" content="Drive organic growth with professional SEO services in India. Infosoft Network offers technical SEO, on-page optimization & high quality link building to boost your rankings and revenue. Increase your website traffic and sales by hiring our professional and expert SEO team." />
    <meta name="keywords" content="seo services in india, search engine optimization india, seo company india, professional seo services, organic ranking india" />
    <?php }else if($pageName == 'testttttt'){  ?>
    <?php }else { ?>
    <title>Infosoft </title>
    <?php } ?>

    <!-- FAVICON FILES -->
    <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
    <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
    <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
    <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
    <link href="ico/favicon.png" rel="shortcut icon">

    <!-- CSS FILES -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/odometer.min.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/dev.css">

    <?php if($pageName == 'index.php' && SERVER == 'live') { ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "@id": "https://www.infosoftnetwork.com/#organization",
        "name": "Infosoft Network",
        "url": "https://www.infosoftnetwork.com",
        "logo": "https://www.infosoftnetwork.com/images/infosoft.png",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "+91-98142-01323",
          "contactType": "Customer Service",
          "areaServed": "Worldwide",
          "availableLanguage": "en"
        },
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Civil Lines",
          "addressLocality": "Ludhiana",
          "addressRegion": "Punjab",
          "postalCode": "141001",
          "addressCountry": "IN"
        }
      }
    </script>

    <?php }?>
    <style>
      /* Submenu hidden and non-clickable by default */
      #services-menus+ul {
        display: none;
        pointer-events: none;
        /* blocks all clicks */
      }

      /* When active — show and enable clicks */
      #services-menus+ul.open {
        display: block;
        pointer-events: auto;
      }

      /* Hide submenu by default - non-clickable */
      #services-menus+ul {
        display: none;
        pointer-events: none;
      }

      /* Desktop - show on HOVER */
      @media (min-width: 768px) {

        .services-menu-list:hover .services-menu,
        .services-menu-ul:hover .services-menu {
          display: block;
        }
      }

      /* Mobile - show on click via .open class */
      @media (max-width: 767px) {
        #services-menus+ul.open {
          display: block;
          pointer-events: auto;
        }
      }
    </style>
  </head>

  <body>

    <!-- end transition-overlay -->
    <div class="navigation-menu">
      <div class="bg-layers"> <span></span> <span></span> <span></span> <span></span> </div>
      <!-- end bg-layers -->
      <div class="inner">
        <div class="menu">
          <ul>
            <li><a href="<?php echo SITE_URL; ?>">Home</a>

            </li>
            <li><a href="about-us.php">About us</a></li>

            <li id="services-menu-list"><a href="javascript:;" id="services-menus">Services</a>
              <ul id="services-menu-ul">
                <li><a class="services-menu" href="seo-services-in-india">Search Engine Optimization</a></li>
                <li><a class="services-menu" href="digital-marketing-services-in-india">Digital Marketing</a></li>
                <li><a class="services-menu" href="social-media-optimization-services-in-india">Social Media Optimization</a></li>
                <li><a class="services-menu" href="website-design-services-in-india">Website Design</a></li>
                <li><a class="services-menu" href="ppc-services-in-india">PPC & Google Ads</a></li>
                <li><a class="services-menu" href="website-development-services-in-india">Website Development</a></li>
                <li><a class="services-menu" href="ecommerce-development-services-in-india">E-Commerce Development</a></li>
                <li><a class="services-menu" href="mobile-app-development-services-in-india">Mobile App Development</a></li>
                <li><a class="services-menu" href="answer-engine-optimization-services-in-india">Answer Engine Optimization</a></li>
                <li><a class="services-menu" href="generative-engine-optimization-services-in-india">Generative Engine Optimization</a></li>
                <li><a class="services-menu" href="local-seo-services-in-india">Local SEO</a></li>
                <li><a class="services-menu" href="technical-seo-services-in-india">Technical SEO</a></li>
                <li><a class="services-menu" href="google-business-profile-optimization-services-in-india">Google Business Profile</a></li>
                <li><a class="services-menu" href="content-marketing-services-in-india">Content Marketing</a></li>
              </ul>
            </li>

            <?php /* <li><a>Services</a>
      <ul>
      		<li><a href="digital.php">Digital Marketing</a></li>
      		<li><a href="website.php">Website Development</a></li>
      		<li><a href="e-commerce.php">E-commerce</a></li>
      		<li><a href="mobile-app.php">Mobile Application</a></li>
      	</ul>
    </li> */ ?>
            <li><a href="our-portfolio.php">Portfolio</a></li>
            <li><a href="our-clients.php">Clients</a></li>
            <li><a href="contact-us.php">Contact</a></li>
          </ul>
        </div>
        <!-- end menu -->
        <!-- <blockquote>Let's create useful website for you ?</blockquote> -->
      </div>
      <!-- end inner -->
    </div>
    <!-- end navigation-menu -->
    <div class="container">
      <div class="row">
        <nav class="navbar ">
          <!-- <div class="left"> <a href="direction.html">DIRECTION</a> </div> -->
          <!-- end left -->

          <div class="col-8 col-md-8 col-lg-6">
            <div class="logo"> <a href="<?php echo SITE_URL; ?>"><img src="images/infosoft.png" alt="Digital Marketing Agency - SEO, SMO, PPC, Web Design, Web Development and Mobile App Development Company in Ludhiana" title="Digital Marketing Agency - SEO, SMO, PPC, Web Design, Web Development and Mobile App Development Company in Ludhiana"></a> </div>
          </div>
          <div class="col-4 col-md-4 col-lg-6 d-flex justify-content-end">

            <!-- end logo -->
            <div class="right">
              <!-- <ul class="language">
      <li><a href="#">EN</a></li>
      <li><a href="#">RU</a></li>
    </ul> -->
              <div class="hamburger-menu"><b>MENU</b>
                <div class="hamburger" id="hamburger-menu"> <span></span> <span></span> <span></span> </div>
              </div>
              <!-- end hamburger-menu -->
            </div>
          </div>

          <!-- end right -->
        </nav>
      </div>
    </div>
    <!-- end navbar -->