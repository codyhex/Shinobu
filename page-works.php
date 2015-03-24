<?php /* 
	  	Template Name: Works(作品发布) 
	  */ ?>
<?php get_header(); ?>

<?php if ( has_post_thumbnail()) {
   				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(200,1300) );
			} ?>
            
    <div class="single_thumb" id="works">
    	
        <div class="dark"></div>
        
        <div class="cat"></div>
        
    </div>
<section class="single">

	
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <article class="article cf">
    	<div class="single_title"><h2><?php the_title(); ?></h2></div>
        <div class="meta cf">
        	<span class="time">Since <?php the_time('F j, Y'); ?></span>
            <span>|</span>
            <span class="cmt"><?php comments_popup_link('NO COMMENT', '1 COMMENT', '% COMMENTS'); ?></span>
       	</div>
        <div class="content"><?php the_content(); ?></div>
    <?php comments_template(); ?>
	</article>
<?php endwhile; else: ?>
   
<?php endif; ?>
</section>
<?php get_footer(); ?>