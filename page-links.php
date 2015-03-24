<?php /* 
	  	Template Name: Links(友情链接) 
	  */ ?>
<?php get_header(); ?>

<?php if ( has_post_thumbnail()) {
   				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(200,1300) );
			} ?>
            
    <div class="single_thumb" id="links">
    	
        <div class="dark"></div>
        
        <div class="cat"></div>
        
    </div>
    
<section class="single">
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <article class="article cf">
    	<div class="single_title"><h2><?php the_title(); ?></h2></div>
        <div class="meta cf">
        	<span class="time">Links & Friends</span>
            <span>|</span>
            <span class="cmt"><?php comments_popup_link('NO COMMENT', '1 COMMENT', '% COMMENTS'); ?></span>
       	</div>
        <div class="content cf">
			<?php the_content(); ?>
            <ul class="linksul cf">
       				<?php
        				$bookmarks = get_bookmarks('title_li=&orderby=rand'); //全部链接随机输出
        				if ( !empty($bookmarks) ) {
            				foreach ($bookmarks as $bookmark) {
            					echo '<li><a href="' , $bookmark->link_url , '" target="_blank">' , $bookmark->link_name , '</a><p>' , $bookmark->link_description , '</p></li>';
            				}
        				}
        			?>
    			</ul>           
        </div>
    <?php comments_template(); ?>
	</article>
<?php endwhile; else: ?>
   
<?php endif; ?>
</section>
<?php get_footer(); ?>