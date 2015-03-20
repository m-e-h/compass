<?php
/**
 * Add classes to hybrid attributs.
 *
 * @package Abraham
 */


class Doc_Attributes {

	/* Attributes for major structural elements. */
	public $body                  	= '';	// get_body_class()
	public $site_container    		= '';	// site-container
	public $site_inner   			= ' test-class o-grid o-wrapper';	// site-inner
	public $site_inner_full_width		= ' o-grid grid--flex'; 	// content
	public $site_inner_single_column 	= ' o-grid o-grid--flex o-wrapper'; 	// content
	public $site_inner_sidebar_right 	= ' test-right o-grid o-grid--flex o-wrapper'; 	// content
	public $site_inner_sidebar_left 	= ' test-left o-grid o-grid--flex o-o-grid--rev o-wrapper'; 	// content
	public $wrap                	= ' o-wrapper'; 	// site-header
	public $header                	= ''; 	// site-header
	public $footer                	= ''; 	// site-footer
	public $content_full_width		= ' o-grid__item'; 	// content
	public $content_single_column 	= ' o-grid__item'; 	// content
	public $content_sidebar_right 	= ' u-2/3 o-grid__item'; 	// content
	public $content_sidebar_left 	= ' u-2/3 o-grid__item--rev'; 	// content
	public $sidebar_full_width  	= ' o-grid__item';	// sidebar sidebar__{$context}
	public $sidebar_single_column  	= ' o-grid__item';	// sidebar sidebar__{$context}
	public $sidebar_sidebar_right 	= ' u-1/3 o-grid__item';	// sidebar sidebar__{$context}
	public $sidebar_sidebar_left	= ' u-1/3 o-grid__item';	// sidebar sidebar__{$context}
	public $sidebar_footer          = '';	// sidebar sidebar__{$context}
	public $menu_primary 			= ' menu--horizontal';	// menu menu-{$context}
	public $menu_secondary 			= ' menu--horizontal';	// menu menu-{$context}
	public $menu_li_primary         = 'menu__item';	// menu-item
	public $menu_li_secondary       = 'menu__item';	// menu-item
	public $menu_li_social          = '';	// menu-item

	/* Header attributes. */
	public $branding              	= ' c-page-title';	// site-branding
	public $site_title            	= ' c-page-title__main';	// site-title
	public $site_description      	= ' c-page-title__sub';	// site-description

	/* Loop attributes. */
	public $loop_meta             	= '';	// loop-meta
	public $loop_title            	= '';	// loop-title
	public $loop_description      	= '';	// loop-description

	/* Post-specific attributes. */
	public $post                  	= '';	// get_post_class()
	public $entry_title           	= '';	// entry-title
	public $entry_author          	= ' entry-meta__author';	// entry-author
	public $entry_published       	= ' entry-meta__date';	// entry-published updated
	public $entry_content         	= '';	// entry-content
	public $entry_summary         	= '';	// entry-summary
	public $entry_terms           	= '';	// entry-terms




	public function __construct() {

		/* Objects. */
		add_filter( 'hybrid_attr_body',				[ $this, 'body' ] );
		add_filter( 'hybrid_attr_site-container', 	[ $this, 'site_container' ] );
		add_filter( 'hybrid_attr_site-inner', 		[ $this, 'site_inner' ] );
		add_filter( 'hybrid_attr_wrap',				[ $this, 'wrap' ] );
		add_filter( 'hybrid_attr_header',			[ $this, 'header' ] );
		add_filter( 'hybrid_attr_footer',			[ $this, 'footer' ] );
		add_filter( 'hybrid_attr_content',			[ $this, 'content' ] );
		add_filter( 'hybrid_attr_sidebar',			[ $this, 'sidebar' ], 10, 2 );
		add_filter( 'hybrid_attr_menu',				[ $this, 'menu' ], 10, 2 );
		add_filter( 'hybrid_attr_loop-meta',		[ $this, 'loop_meta' ] );

		/* Components. */
		add_filter( 'nav_menu_css_class',			[ $this, 'menu_li' ], 10, 2 );
		add_filter( 'hybrid_attr_branding',			[ $this, 'branding' ] );
		add_filter( 'hybrid_attr_site-title',		[ $this, 'site_title' ] );
		add_filter( 'hybrid_attr_site-description',	[ $this, 'site_description' ] );
		add_filter( 'hybrid_attr_loop-title',		[ $this, 'loop_title' ] );
		add_filter( 'hybrid_attr_loop-description',	[ $this, 'loop_description' ] );

		/* Post-specific. */
		add_filter( 'hybrid_attr_post',				[ $this, 'post' ] );
		add_filter( 'hybrid_attr_entry-title',		[ $this, 'entry_title' ] );
		add_filter( 'hybrid_attr_entry-author',		[ $this, 'entry_author' ] );
		add_filter( 'hybrid_attr_entry-published',	[ $this, 'entry_published' ] );
		add_filter( 'hybrid_attr_entry-content',	[ $this, 'entry_content' ] );
		add_filter( 'hybrid_attr_entry-summary',	[ $this, 'entry_summary' ] );
		add_filter( 'hybrid_attr_entry-terms',		[ $this, 'entry_terms' ] );
	}




	/* === OBJECTS === */

	public function body( $attr ) {
		$attr['class']    .= $this->body;
		return $attr;
	}


	public function site_container( $attr ) {
		$attr['class']    .= $this->site_container;
		return $attr;
	}


	public function site_inner( $attr ) {
	if ( '1c' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_full_width;

	elseif ( '1c-narrow' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_single_column;

	elseif ( '2c-l' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_sidebar_right;

	elseif ( '2c-r'	 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_sidebar_left;
	else:
		$attr['class']    .= $this->site_inner;

	endif;
		return $attr;
	}


	public function wrap( $attr ) {
		$attr['class']    .= $this->wrap;
		return $attr;
	}


	public function header( $attr ) {
		$attr['class']    .= $this->header;
		return $attr;
	}


	public function footer( $attr ) {
		$attr['class']    .= $this->footer;
		return $attr;
	}


	public function content( $attr ) {
	if ( '1c' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_full_width;

	elseif ( '1c-narrow' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_single_column;

	elseif ( '2c-l' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_sidebar_right;

	elseif ( '2c-r'	 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_sidebar_left;

	endif;
		return $attr;
	}


	public function sidebar( $attr, $context ) {
		if ( empty( $context ) ) {
			return $attr;
		}

		if ( 'primary' === $context ) {
			if ( '1c'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_full_width;

			elseif ( '1c-narrow'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_single_column;

			elseif ( '2c-l'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_sidebar_right;

			elseif ( '2c-r'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_sidebar_left;

			endif;
		}

		if ( 'footer' === $context ) {
			$attr['class']    .= $this->sidebar_footer;
		}
		return $attr;
	}


	public function menu( $attr, $context ) {
		if ( empty( $context ) ) {
			return $attr;
		}

		if ( 'primary' === $context ) {
		$attr['class']    .= $this->menu_primary;
		}
		if ( 'secondary' === $context ) {
		$attr['class']    .= $this->menu_secondary;
		}
		return $attr;
	}




	/* === COMPONENTS === */

	public function menu_li( $classes, $item ) {
	    if ( $menu_name = 'primary' ) :
			$classes[] = $this->menu_li_primary;
		elseif ( $menu_name = 'secondary' ) :
			$classes[] = $this->menu_li_secondary;
		elseif ( $menu_name = 'social' ) :
			$classes[] = $this->menu_li_social;
		endif;

	    return $classes;
	}


	public function branding( $attr ) {
		$attr['class']    .= $this->branding;
		return $attr;
	}


	public function site_title( $attr ) {
		$attr['class']    .= $this->site_title;
		return $attr;
	}


	public function site_description( $attr ) {
		$attr['class']    .= $this->site_description;
		return $attr;
	}




	/* === LOOP === */

	public function loop_meta( $attr ) {
		$attr['class']    .= $this->loop_meta;
		return $attr;
	}


	public function loop_title( $attr ) {
		$attr['class']    .= $this->loop_title;
		return $attr;
	}


	public function loop_description( $attr ) {
		$attr['class']    .= $this->loop_description;
		return $attr;
	}




	/* === POSTS === */

	public function post( $attr ) {
		$attr['class']    .= $this->post;
		return $attr;
	}


	public function entry_title( $attr ) {
		$attr['class']    .= $this->entry_title;
		return $attr;
	}


	public function entry_author( $attr ) {
		$attr['class']    .= $this->entry_author;
		return $attr;
	}


	public function entry_published( $attr ) {
		$attr['class']    .= $this->entry_published;
		return $attr;
	}


	public function entry_content( $attr ) {
		$attr['class']    .= $this->entry_content;
		return $attr;
	}


	public function entry_summary( $attr ) {
		$attr['class']    .= $this->entry_summary;
		return $attr;
	}


	public function entry_terms( $attr ) {
		$attr['class']    .= $this->entry_terms;
		return $attr;
	}

}


$ShinyAtts = new Doc_Attributes();



function theme_classes_customizer_script() {

$layoutclasses = new Doc_Attributes;
$innerclass    = $layoutclasses->site_inner( $attr );
?>
<script type="text/javascript">
fakeAttr = <?php echo json_encode($innerclass['class']); ?>;


if ( $( "body" ).hasclass( "layout-2c-l" ) ) {

    $("#content").addClass('fakeAttr');

}

else if ( $( "body" ).hasclass( "layout-2c-r" ) ) {

    $("#content").addClass('fakeAttr');

}

</script>
<?php
}

add_action('customize_controls_print_scripts', 'theme_classes_customizer_script');
