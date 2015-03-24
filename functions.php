<?php
// 添加编辑器按钮
add_action('admin_print_scripts', 'my_quicktags');
function my_quicktags() {
    wp_enqueue_script(
        'my_quicktags',
        get_stylesheet_directory_uri().'/js/my-quicktags.js',
        array('quicktags')
    );
};
// 引入缩略图、文章形式(not supported at present)
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 200, 1300, true);
}
// 免费主题发布短代码
function themeFree( $atts, $content = null ) {
	global $url;
	$url = get_bloginfo( 'template_directory' );
	extract( shortcode_atts( array(
		'name' => 'Untitled',
		'pic' => '#',
		'info' => '#',
		'dl' => '#',
		'demo' => '#',
	), $atts ) );

	return '<div class="entry-rules"></div><div class="themes_box cf"><div class="themes_thumb left"><div class="themes_name"><p>'. $name .'</p></div><img src="'. $pic .'"></div><div class="themes_links left"><a href="'. $info .'" class="themes_info themes_btn">Learn More</a><a href="'. $dl .'" class="themes_dl themes_btn" target="_blank">Download</a><a href="'. $demo .'" class="themes_demo themes_btn" target="_blank">Demo</a><div class="themes_content">'. $content .'</div></div></div>';
}
add_shortcode( 'freetheme', 'themeFree' );
// 收费主题发布短代码
function themePaid( $atts, $content = null ) {
	global $url;
	$url = get_bloginfo( 'template_directory' );
	extract( shortcode_atts( array(
		'name' => 'Untitled',
		'pic' => '#',
		'info' => '#',
		'pay' => '#',
		'demo' => '#',
		'price' => 'Buy Now (￥50)',
	), $atts ) );

	return '<div class="entry-rules"></div><div class="themes_box cf"><div class="themes_thumb left"><div class="themes_name"><p>'. $name .'</p></div><img src="'. $pic .'"></div><div class="themes_links left"><a href="'. $info .'" class="themes_info themes_btn">Learn More</a><a href="'. $demo .'" class="themes_demo themes_btn" target="_blank">Demo</a><a href="'. $pay .'" class="themes_pay themes_btn"  target="_blank">'. $price .'</a><div class="themes_content">'. $content .'</div></div></div>';
}
add_shortcode( 'paidtheme', 'themePaid' );
// 评论回复邮件提醒
function comment_mail_notify($comment_id) {
	  $admin_email = get_bloginfo ('admin_email'); 
	  $comment = get_comment($comment_id);
	  $comment_author_email = trim($comment->comment_author_email);
	  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
	  $spam_confirmed = $comment->comment_approved;
	  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
		$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
		$subject = '您在 [' . get_option("blogname") . '] 的留言有了新回复';
		$message = '
		  <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
		  <p>您在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
		   . trim(get_comment($parent_id)->comment_content) . '</p>
		  <p>' . trim($comment->comment_author) . ' 给你的回复:<br />'
		   . trim($comment->comment_content) . '<br /></p>
		  <p>您可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看完整内容</a></p>
		  <p>欢迎再度光临<a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
		  <p>(此邮件由系统自动发出, 请勿回复.)</p>
		';
		$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
		$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
		wp_mail( $to, $subject, $message, $headers );
	  }
	}
	add_action('comment_post', 'comment_mail_notify');
// 中文截断文字
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8'){if($code == 'UTF-8'){$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";preg_match_all($pa, $string, $t_string);if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";return join('', array_slice($t_string[0], $start, $sublen));}else{$start = $start*2;$sublen = $sublen*2;$strlen = strlen($string);$tmpstr = '';for($i=0; $i<$strlen; $i++){ if($i>=$start && $i<($start+$sublen)){if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);else $tmpstr.= substr($string, $i, 1);}if(ord(substr($string, $i, 1))>129) $i++;}if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";return $tmpstr;}}
// 更换默认头像
function newgravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/images/guestico.png';
    $avatar_defaults[$myavatar] = "默认头像";
return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'newgravatar' );
// 自定义评论表情
if ( !isset( $wpsmiliestrans ) ) {
		$wpsmiliestrans = array(
		':em01:' => '01.gif',
		':em02:' => '02.gif',
		':em03:' => '03.gif',
		':em04:' => '04.gif',
		':em05:' => '05.gif',
		':em06:' => '06.gif',
		':em07:' => '07.gif',
		':em08:' => '08.gif',
		':em09:' => '09.gif',
		':em10:' => '10.gif',
		);
}
function custom_smilies_src($src, $img)
{
	return get_bloginfo('template_directory').'/smilies/' . $img;
}
add_filter('smilies_src', 'custom_smilies_src', 10, 2);
//Hermit说
function chatHermit( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => 'Hermit',
		'dir' => 'left',
	), $atts ) );

	return '<div class="chatbox cf"><section class="red chat_content '.$dir.'"><div class="chat-arrow"></div><div class="bub">'.$content.'</div></section></div>';
}
add_shortcode( 'hermit', 'chatHermit' );
//Shrine说
function chatShrine( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => 'Shrine',
		'dir' => 'right',
	), $atts ) );

	return '<div class="chatbox cf"><section class="grey chat_content '.$dir.'"><div class="chat-arrow"></div><div class="bub">'.$content.'</div></section></div>';
}
add_shortcode( 'shrine', 'chatShrine' );
// 删除无效rel
foreach(array(
        'rsd_link',//rel="EditURI"
        'index_rel_link',//rel="index"
        'start_post_rel_link',//rel="start"
        'wlwmanifest_link'//rel="wlwmanifest"
    ) as $xx)
    remove_action('wp_head',$xx);
    function the_category_filter($thelist){
        return preg_replace('/rel=".*?"/','rel="tag"',$thelist);
    }   
add_filter('the_category','the_category_filter');
//自定义评论列表
function otakism_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;
   if(!$commentcount) {
	   $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
	   $cpp=get_option('comments_per_page');
	   $commentcount = $cpp * $page;
	}
?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" >
		<div id="comment-<?php comment_ID(); ?>" class="comment-body cf">
			<div class="comment-avatar left"><a href="<?php comment_author_url(); ?>"><?php echo get_avatar( $comment, $size = '50'); ?></a></div>
			<div class="comment-meta left">
				<div class="comment-author"><?php printf(__('%s'), get_comment_author_link()) ?></div>
				<div class="comment-time"><?php comment_date('Y/m/j/') ?> at <?php comment_time('H:i'); ?></div>
            </div>
            <div class="clear"></div> 
         	<div class="comment-entry"><?php comment_text() ?></div> 
            <div class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'REPLY','depth' => $depth, 'max_depth' => 2 ))) ?></div>
    	</div>
<?php } ?>