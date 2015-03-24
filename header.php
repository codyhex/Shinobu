<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="7DD70A580F6943D5FE03B82DAD1FBEAF" />
<title><?php if ( is_tag() ) { echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' | '; bloginfo( 'name' );} elseif ( is_archive() ) {echo wp_title('');  if($paged > 1) printf(' - 第%s页',$paged);    echo ' | ';    bloginfo( 'name' );} elseif ( is_search() ) {echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 | '; bloginfo( 'name' );} elseif ( is_home() ) {bloginfo( 'name' );$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);}  elseif ( is_404() ) {echo '页面不存在！ | '; bloginfo( 'name' );} else {echo wp_title( ' | ', false, right )  ; bloginfo( 'name' );} ?></title>
<?php if (is_single()) {$description = cut_str(strip_tags(apply_filters('the_content',$post->post_content)),200);$keywords = "";$tags = wp_get_post_tags($post->ID);foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ",";}} else if (is_category()) {$description = category_description();}?>
<?php $homedescription = 'Person who studies robotics at WPI';
	  $homekeywords = 'wpi robotics'; ?>
<meta name="description" content="<?php if (is_home()) { echo $homedescription;} else echo $description;?>"/>
<meta name="keywords" content="<?php if (is_home()) { echo $homekeywords;} else echo $keywords;?>"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">!window.jQuery && document.write('<script src="<?php bloginfo( 'template_url' ); ?>/jquery.min.js"><\/script>');</script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.mousewheel.js"></script>
<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34114327-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php if ( !is_single() && !is_page() ) { ?>style="overflow:hidden;<?php } ?>">
	<div id="bg"></div>
    <div id="description">
    	<div class="intitle">Copyright</div>
        <div class="copyright">
        	<p>Copyright © 2010-2013 Otakism.org</p> 
            <p>All Rights Reserved by Hermit.</p>
        </div>
    	<div class="intitle">Re-Designer</div>
        <div class="author cf">
        	<div class="head left"><a href="<?php bloginfo( 'url' ); ?>/wp-admin" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/avatar_a.jpg"></a></div>
            <div class="profile left">
    			<h3>Peng</h3>
     			<small>Administrator</small>
        		<p>Love Robotics!</p>
            </div>
        </div>
        <div class="intitle" id="contact">Get in touch</div>
        <a href="https://twitter.com/Prof_X_" class="sns" target="_blank">Twitter</a>
<!--
        <a href="https://plus.google.com/113350917149465350488" class="sns" target="_blank">Google+</a>
        <a href="http://bangumi.tv/user/hermitage" class="sns" target="_blank">Bangumi</a>
-->
    </div>
	<div id="menu">
    	<div id="buttons">
    		<a href="<?php bloginfo('url'); ?>/feed" id="rss"></a>
    		<a href="<?php bloginfo('url'); ?>" id="home"></a>
            <div class="navi">
            	<div class="nextp"><?php next_posts_link('', 0); ?></div>
        		<div class="prevp"><?php previous_posts_link('', 0) ?></div>
   			</div>
            <div class="status1" id="tools"></div>
        </div>
    </div>
    