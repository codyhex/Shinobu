<?php get_header(); ?>

<?php if ( has_post_thumbnail()) {
   				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size = 'thumbnail' );
			} ?>
            
    <div class="single_thumb" style="background-image:url(<?php echo $thumb_url[0] ?>);">
    	
        <div class="dark"></div>
        
        <div class="cat <?php if( in_category( 'technology' )) { echo "technology"; } else { echo "non-technology"; } ?>"></div>
        
    </div>
<section class="single">

	
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <article class="article cf">
    	<div class="single_title"><h2><?php the_title(); ?></h2></div>
        <div class="meta cf">
        	<span class="writer"><?php the_author(); ?></span>
            <span>|</span>
        	<span class="time"><?php the_time('F j, Y'); ?></span>
            <span>|</span>
            <span class="cmt"><?php comments_popup_link('NO COMMENT', '1 COMMENT', '% COMMENTS'); ?></span>
       	</div>
        <div class="content"><?php the_content(); ?></div>
    	<div class="tags">Tag：<?php the_tags((' '), '、'); ?></div>
    <?php comments_template(); ?>
	</article>
<?php endwhile; else: ?>
   
<?php endif; ?>
</section>
<?php get_footer(); ?>