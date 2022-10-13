<?php

if(!function_exists('_postdata'))
{
	function _postdata($key, $val='')
	{
		return(isset($_POST[$key])? $_POST[$key] : $val);
	}
}

if(!function_exists('_getdata'))
{
	function _getdata($key, $val='')
	{
		return(isset($_GET[$key])? $_GET[$key] : $val);
	}
}

if(!function_exists('_replace'))
{
	function _replace($txt, $search=array())
	{
		foreach($search as $k=>$v)
		{
			$txt = str_replace($k,$v,$txt);
		}
		return $txt;
	}
}

if(!function_exists('_trim_chars'))
{
	function _trim_chars($str, $n=20, $sep='...')
	{
		if(strlen($str)<$n) return $str;
		$html = substr($str,0,$n);
		$html = substr($html,0,strrpos($html,' '));
		return $html.$sep;
	} 
}

/* ================== */

if(!function_exists('_the_entry_date'))
{
	function _the_entry_date($p = null)
	{
		global $post;
		if(!$p && isset($post)) {
			$p = $post;
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if(get_the_time('U', $p->ID) !== get_the_modified_time('U', $p->ID))
		{
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
		}

		printf($time_string,
			esc_attr(get_the_date('c', $p->ID)),
			get_the_date('', $p->ID),
			esc_attr(get_the_modified_date('c', $p->ID)),
			get_the_modified_date('', $p->ID)
		);
	}
}

if(!function_exists('_bootstrap_pagination'))
{
	function _bootstrap_pagination($args = array())
	{
		$defaults = array(
			'range'		   => 4,
			'custom_query'	=> FALSE,
			'before_output'   => '<nav class="paginations"><ul class="pagination">',
			'after_output'	=> '</ul></nav>'
		);
		
		$args = wp_parse_args(
			$args, 
			apply_filters('_bootstrap_pagination_defaults', $defaults)
		);
		
		$args['range'] =(int) $args['range'] - 1;
		if(!$args['custom_query'])
			$args['custom_query'] = @$GLOBALS['wp_query'];
		$count =(int) $args['custom_query']->max_num_pages;
		$page  = intval(get_query_var('paged'));
		$ceil  = ceil($args['range'] / 2);
		
		if($count <= 1)
			return FALSE;
		
		if(!$page)
			$page = 1;
		
		if($count > $args['range']) {
			if($page <= $args['range']) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif($page >=($count - $ceil)) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif($page >= $args['range'] && $page <($count - $ceil)) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}
		
		$echo = '';
		$previous = intval($page) - 1;
		$previous = esc_attr(get_pagenum_link($previous));
		
		$firstpage = esc_attr(get_pagenum_link(1));
		if($firstpage &&(1 != $page))
			$echo .= '<li class="previous"><a href="'.$firstpage.'">'.__('First', 'cit_service').'</a></li>';
		if($previous &&(1 != $page))
			$echo .= '<li><a href="'.$previous.'" title="'.__('&laquo; Previous', 'cit_service').'">'.__('Previous', 'cit_service').'</a></li>';
		
		if(!empty($min) && !empty($max)) {
			for($i = $min; $i <= $max; $i++) {
				if($page == $i) {
					$echo .= '<li class="active"><span class="active">'.(int)$i.'<span class="sr-only">(current)</span></span></li>';
				} else {
					$echo .= sprintf('<li><a href="%s">%d</a></li>', esc_attr(get_pagenum_link($i)), $i);
				}
			}
		}
		
		$next = intval($page) + 1;
		$next = esc_attr(get_pagenum_link($next));
		if($next &&($count != $page))
			$echo .= '<li><a href="'.$next.'" title="'.__('Next', 'cit_service').'">'.__('Next &raquo;', 'cit_service').'</a></li>';
		
		$lastpage = esc_attr(get_pagenum_link($count));
		if($lastpage) {
			$echo .= '<li class="next"><a href="'.$lastpage.'">'.__('Last', 'cit_service').'</a></li>';
		}
		if(isset($echo))
			echo $args['before_output'].$echo.$args['after_output'];
	}
}
