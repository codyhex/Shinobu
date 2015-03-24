<?php if ( post_password_required() ) : ?>
<?php _e( 'Enter your password to view comments.' ); ?>
<?php return; endif; ?>
<div id="single-rules" class="rules"></div>
<div class="commentscount"><h3><span><?php comments_number( '0', '1', '%' ); ?></span> COMMENTS</h3></div>
<div id="comments" class="cf">
	<?php if ( have_comments() ) :?>
        <ol class="commentlist" id="commentlist"><?php wp_list_comments('type=comment&callback=otakism_comment&max_depth=10000'); ?></ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<div class="pagination">	
    	    	<div class="cf"><?php paginate_comments_links(array('prev_text' => '<', 'next_text' => '>')); ?><span id="cp_post_id" class="none"><?php echo $post->ID; ?></span></div>
            </div>
		<?php } ?>
    <?php endif; ?>
    	<?php if ('open' == $post->comment_status) : ?>
    <div id="respond">
    	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        	<div class="cancel_comment_reply">
					<?php
						if ( is_singular() )
							wp_enqueue_script( "comment-reply" ); 
						cancel_comment_reply_link('Uncomment') 
					?>
				</div>
        <div class="comtool cf">
           <?php if ( $user_ID ) : ?>
            <div class="user_logged cf">
        <span class="welcome">Hi，<?php printf(__(' <a href="%1$s">%2$s</a> '), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?>御主人様♥~</span>
		<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>" class="user_logout">
			<?php _e('Log out &raquo;'); ?>
		</a>
        </div>
           	<?php else :?>
           		<?php	$otakism_author = $comment_author;
						$otakism_email = $comment_author_email;
						$otakism_url = $comment_author_url;
						if(!$otakism_author){
							$otakism_author ='Name :';
							$otakism_email ='Email :';
							$otakism_url = 'Website :';
						}
					?>
            <div class="author_info cf" id="author_info">
				<input type="text" name="author" id="author" value="<?php echo $otakism_author; ?>" tabindex="1">
				<input type="text" name="email" id="email" value="<?php echo $otakism_email; ?>" tabindex="2">
				<input type="text" name="url" id="url" value="<?php echo $otakism_url; ?>" tabindex="3">
           	</div>
            <?php endif; ?>	
        </div>
        <div class="smiley">
				<a href="javascript:grin(':em01:')"><img src="<?php bloginfo('template_url'); ?>/smilies/01.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em02:')"><img src="<?php bloginfo('template_url'); ?>/smilies/02.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em03:')"><img src="<?php bloginfo('template_url'); ?>/smilies/03.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em04:')"><img src="<?php bloginfo('template_url'); ?>/smilies/04.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em05:')"><img src="<?php bloginfo('template_url'); ?>/smilies/05.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em06:')"><img src="<?php bloginfo('template_url'); ?>/smilies/06.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em07:')"><img src="<?php bloginfo('template_url'); ?>/smilies/07.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em08:')"><img src="<?php bloginfo('template_url'); ?>/smilies/08.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em09:')"><img src="<?php bloginfo('template_url'); ?>/smilies/09.gif" class="wp-smiley"/></a>
				<a href="javascript:grin(':em10:')"><img src="<?php bloginfo('template_url'); ?>/smilies/10.gif" class="wp-smiley"/></a>
			</div>
            <textarea name="comment" id="comment" rows="10" cols="100%" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <input type="submit" name="submit" id="submit" value="Shoot! (ctrl+enter)" tabindex="5" >
            <?php comment_id_fields(); ?> 
				<?php do_action('comment_form', $post->ID); ?>
			<input type="hidden" id="name_key" name="name_key" value="<?php echo wp_create_nonce('otakism_key'.get_the_ID());  ?>">
			<input type="hidden" name="action" value="article">  
        </form>
	</div>
		<?php else : ?>
    		<div class="commentclosed"><?php _e( 'Comments are closed.' ); ?></div>
        <?php endif; ?>
</div>