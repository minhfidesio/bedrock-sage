<?php
  $partnerLocation = get_post_meta($post->ID, '_partner_location_id', true);
?>
<div class="block-content-page<?= $partnerLocation != '-1' ? ' mt-0 has-sidebar' : '' ?>">
   <div class="wrapper">
       <div class="content-page">
           <div class="editor-cms">
               <h3><i class="i-plus-o"></i><?=__('En détail',DOMAIN);?></h3>
              <?php 
                while ( have_posts() ) :
                  the_post(); the_content();
                endwhile; 
              ?>
           </div>
       </div>
      <?php if($partnerLocation != '-1'): ?>
       <div class="sidebar">
           <div class="form-partner">
               <p class="title"><?= esc_html__('Prise de rendez en ligne', WF_A_P_SYSTEM) ?></p>
               <?php echo do_shortcode('[appointment loc="'.$partnerLocation.'"]') ?>
           </div>
       </div>
     <?php endif; ?>
   </div>
</div>