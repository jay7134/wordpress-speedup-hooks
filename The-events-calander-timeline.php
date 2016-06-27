<?php
function carbonEventsTimeline($atts){ ?>
<style type="text/css">
.infinite_timeline {
	width: 100%;
	margin: 20px 0;
	overflow: hidden;
  	*zoom: 1;
}

.infinite_timeline * {
	box-sizing: border-box;
}

.infinite_timeline .year_posts {
	background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEElEQVQIW2NMTEz8z8gABAAPKwIlXWq1kgAAAABJRU5ErkJggg==);
	background-repeat: repeat-y;
	background-position: 50% 0;
	padding-top: 40px;
	overflow: hidden;
  	*zoom: 1;
}

.infinite_timeline .year_head {
	clear: both;
	font-size: 2em;
	text-align: center;
	margin: 20px 0;
}

.infinite_timeline .item {
	width: 46%;
	margin-bottom: 10px;
	border-radius: 4px;
}

.infinite_timeline .item.year_top {
	margin-top: -40px;
}

.infinite_timeline .item.left {
	float: left;
	clear: left;
}

.infinite_timeline .item.right {
	float: right;
	clear: right;
}

.infinite_timeline .item img.wp-post-image {
	width: 100%;
	margin: 0;
	padding: 0;
	border: none;
}

.infinite_timeline .title {
	line-height: 1.4;
}

.infinite_timeline .item a {
	display: block;
	border-radius: 4px;
	text-decoration: none;
	border: none;
	color: #666;
	overflow: hidden;
  	*zoom: 1;
}

.infinite_timeline .item a:hover {
	color: #888;
}

.infinite_timeline .item a:hover img {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=90);
  opacity: 0.9;
}

/* Baloon */
.infinite_timeline .item.left { position: relative; background: #fff; border: 1px solid #cccccc; }
.infinite_timeline .item.left:after,
.infinite_timeline .item.left:before { left: 100%; bottom: 20px; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; }
.infinite_timeline .item.left:after { border-color: rgba(252, 252, 252, 0); border-left-color: #ffffff; border-width: 10px; margin-top: -10px; }
.infinite_timeline .item.left:before { border-color: rgba(204, 204, 204, 0); border-left-color: #cccccc; border-width: 11px; margin-top: -11px; bottom: 19px; }

.infinite_timeline .item.right { text-align: justify; position: relative; background: #fff; border: 1px solid #cccccc; }
.infinite_timeline .item.right:after,
.infinite_timeline .item.right:before { right: 100%; bottom: 20px; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; }
.infinite_timeline .item.right:after { border-color: rgba(252, 252, 252, 0); border-right-color: #fff; border-width: 10px; margin-top: -10px; }
.infinite_timeline .item.right:before { border-color: rgba(204, 204, 204, 0); border-right-color: #cccccc; border-width: 11px; margin-top: -11px; bottom: 19px; }

/* Pagenation */
.infinite_timeline .pagenation,
.infinite_timeline #infscr-loading {
	text-align: center;
}

.infinite_timeline #infscr-loading em {
	display: none;
}

.infinite_timeline .pagenation a {
	display: block;
	padding: 20px;
}

.infinite_timeline .pagenation img {
	display: none;
}
.infinite_timeline .title h3 {
    background: #e6e6e6;
    padding: 5px 20px 7px 20px;
    font-size: 22px;
    color: #666;
    margin-top: 0;
}
.infinite_timeline .title p {
    padding: 0 20px;
}

/* Mobile */
@media screen and (max-width: 480px) {
	.infinite_timeline .title {
		font-size: 0.9em;
	}
	.infinite_timeline .item.right:after,.infinite_timeline .item.left:after{
		border-right-color: transparent;
		border-left-color: transparent;
	}
	.infinite_timeline .year_head {
		margin-top: 10px;
	}
	.infinite_timeline .item {
    	width: 100%;
	}
}
</style>
<?php
	global $post;
	extract( shortcode_atts( array(
	        'date' => 'start_date',
	        'order' => 'DESC' 
		), $atts, 'eventstimeline' ) );

	$events = tribe_get_events( array(
	    'post_type' => 'tribe_events',
	    $date => current_time( 'Y-m-d' ),
	    'order'=> $order
	) );
	$count = 1;
	$eventType = $date == 'start_date' ? 'UPCOMING EVENTS':'PAST EVENTS';
	echo '<div class="infinite_timeline"><div class="box"><div class="year_head">'.$eventType.'</div><div class="year_posts">';
	foreach ( $events as $post ) {

	    setup_postdata( $post );
		
		$id = $query->post->ID;
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($id) );
		$title = get_the_title($id);
		
		if($count%2!=0){
			if($count==1){ 
				$yeartop = 'year_top'; 
			} else {$yeartop = '';}
			echo '<div class="item left '.$yeartop.'"><img src="'.$feat_image.'" class="attachment-large wp-post-image" alt="'.$title.'">';
		}else{
			echo '<div class="item right" style="margin-top: 60px;"><img src="'.$feat_image.'" class="attachment-large wp-post-image" alt="'.$title.'">';
		}
		echo '<div class="title"><h3><a href="'.get_permalink().'">'.$title.'</a></h3><p>'.get_the_excerpt().'</p></div></div>';
		$count++;

	}
	echo '<div></div></div>';
}
add_shortcode('eventstimeline','carbonEventsTimeline');