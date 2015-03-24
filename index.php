<?php get_header(); ?>

<div class="nextpage"><?php next_posts_link('', 0); ?></div>
<div class="prevpage"><?php previous_posts_link('', 0); ?></div>
<div id="search_btn"></div>
<div id="search">
	<form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
        <input type="text" id="searchinput" name="s" value="Type here and press ENTER" />
    </form>
</div>

<section class="postlist">

	<div class="page" id="about">
    	<div class="cat"></div>
        <div class="dark"></div>
        <a href="<?php bloginfo('url'); ?>/about" class="post_url"></a>
    </div>
    
    <div class="page" id="links">
    	<div class="cat"></div>
        <div class="dark"></div>
        <a href="<?php bloginfo('url'); ?>/links" class="post_url"></a>
    </div>
    
    <div class="page" id="works">
    	<div class="cat"></div>
        <div class="dark"></div>
        <a href="<?php bloginfo('url'); ?>/works" class="post_url"></a>
    </div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    	<?php if ( has_post_thumbnail()) {
   				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(200,1300) );
			} ?>
            
    <article class="post" style="background-image:url(<?php echo $thumb_url[0] ?>);">
        	
        <div class="cat <?php if( in_category( 'project' )) { echo "project"; } elseif( in_category( 'wiki' ) ) { echo "wiki"; } else { echo "technology"; } ?>"></div>
        
        <div class="info"></div>
        
        <div class="dark"></div>
        
        <a href="<?php the_permalink() ?>" class="post_url"></a>
        
        <div class="entry">
        
        	<div class="date"><?php the_time('Y/m/d'); ?></div>
        
        	<div class="title"><?php the_title(); ?></div>
        
        </div>
            
    </article>
	
	<?php endwhile; else: ?>
	
	<?php endif; ?>
    
</section>

<script>
/* Mouse Wheel jQuery*/
	$(function() {
		
		$("body, html").mousewheel(function(event, delta) {

			this.scrollLeft -= (delta * 70);

			event.preventDefault();

		});
		
	});
</script>

<?php get_footer(); ?>
