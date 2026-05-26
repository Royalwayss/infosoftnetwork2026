<div class="breadcrumb-section">
  <nav class="breadcrumb-pill" aria-label="breadcrumb">
    <a href="<?php echo SITE_URL; ?>" class="bc-item">
      <svg class="bc-icon" viewBox="0 0 24 24">
        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
      </svg>
      Home
    </a>
    <span class="bc-sep">›</span>
	<?php if($pageName == 'our-portfolio.php'){ ?>
    <span class="bc-item active">Our Portfolio</span>
	<?php }else if($pageName == 'about-us.php'){  ?>
	 <span class="bc-item active">About US</span>
	 <?php }else if($pageName == 'our-clients.php'){  ?>
	 <span class="bc-item active">Our Clients</span>
	 <?php }else if($pageName == 'contact-us.php'){  ?>
	 <span class="bc-item active">Contact US</span>
	 <?php }else if($pageName == 'testtt'){  ?>
	 <?php }else if($pageName == 'testtt'){  ?>
	 
	<?php } ?>
  </nav>
</div>