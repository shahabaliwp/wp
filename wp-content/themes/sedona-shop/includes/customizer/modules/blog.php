<?php
/**
 * Customizer Blog
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Meta
*/

// Meta category
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_meta_category_show',
	'label'       => esc_html__( 'Show meta category', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_meta_date_show',
	'label'       => esc_html__( 'Show meta date', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_meta_author_show',
	'label'       => esc_html__( 'Show meta author', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => true,
) );

// Meta comments
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_meta_comments_show',
	'label'       => esc_html__( 'Show meta comments', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => true,
) );


// Post excerpt
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_post_excerpt_show',
	'label'       => esc_html__( 'Show post excerpt', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => true,
) );

// Excerpt length
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'number',
	'settings'    => 'sedona_shop_settings_posts_excerpt_length',
	'label'       => esc_html__( 'Excerpt length (words)', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_post_meta',
	'default'     => 30,
	'choices'     => array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
) );


/**
* Single Post
*/

// Featured image
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_single_featured_image_show',
	'label'       => esc_html__( 'Show featured image', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );


// Layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_single_featured_image_layout',
	'label'       => esc_html__( 'Featured image layout', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => 'default',
	'choices'     => array(
		'default'  	=> get_template_directory_uri() . '/assets/img/customizer/featured-image-1.png',
		'split' 		=> get_template_directory_uri() . '/assets/img/customizer/featured-image-2.png',
	),
) );

// Meta category
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_single_category_show',
	'label'       => esc_html__( 'Show category', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_single_date_show',
	'label'       => esc_html__( 'Show date', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_single_author_show',
	'label'       => esc_html__( 'Show author', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_post_tags_show',
	'label'       => esc_html__( 'Show tags', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_author_box_show',
	'label'       => esc_html__( 'Show author box', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Related Posts', 'sedona-shop' ) . '</h3>',
) );

// Related posts
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_related_posts_show',
	'label'       => esc_html__( 'Show related posts', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'select',
	'settings'    => 'sedona_shop_settings_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_html__( 'Category', 'sedona-shop' ),
		'tag' => esc_html__( 'Tag', 'sedona-shop' ),
		'author' => esc_html__( 'Author', 'sedona-shop' ),
	),
) );

/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_post_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_facebook',
	'label'       => esc_html__( 'Facebook', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_twitter',
	'label'       => esc_html__( 'Twitter', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );

// Vkontakte Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_vkontakte',
	'label'       => esc_html__( 'Vkontakte', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_pocket',
	'label'       => esc_html__( 'Pocket', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );

// Facebook Messenger Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_viber',
	'label'       => esc_html__( 'Viber', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_telegram',
	'label'       => esc_html__( 'Telegram', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_reddit',
	'label'       => esc_html__( 'Reddit', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_post_share_email',
	'label'       => esc_html__( 'Email', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_social_share',
	'default'     => true,
) );