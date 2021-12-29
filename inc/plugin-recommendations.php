<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'richconsulting_register_required_plugins' );

function richconsulting_register_required_plugins() {

	$plugins = array(

		array(
			'name' => esc_attr__('Rich Addon','rich-consulting'),
			'slug' => 'rich-addon',
			'source' => get_template_directory_uri() . '/plugin/rich-addon.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false, 
			'external_url' => '',
		),
        array(
			'name' => esc_attr__('Revolution Slider','rich-consulting'),
			'slug' => 'revslider',
			'source' => get_template_directory_uri() . '/plugin/revslider.zip',
			'required' => true,
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_attr__('Contact Form 7','rich-consulting'),
			'slug'=> 'contact-form-7', 
			'required' => true, 
			'force_activation'=> false,
			'force_deactivation' => false,
		),
        array(
			'name' => esc_attr__('Simple Job Board','rich-consulting'),
			'slug'=> 'simple-job-board',
			'required' => true,
			'force_activation'=> false,
			'force_deactivation' => false,
		),
        array(
			'name' => esc_attr__('Rich Demo Importer','rich-consulting'),
			'slug'=> 'one-click-demo-import',
			'required' => true,
			'force_activation'=> false,
			'force_deactivation' => false,
		),

		array(
			'name' => esc_attr__('Elementor','rich-consulting'),
			'slug' => 'elementor', 
			'required' => true, 
			'version' => '', 
			'force_activation' => false, 
			'force_deactivation' => false,
			'external_url' => '',
		),		
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true, 
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message'=> '',
    );

    tgmpa( $plugins, $config );

}