<?php
/**
 * Product Layout Options
 *
 * @package Base
 */

namespace Base;

use Base\Theme_Customizer;
use function Base\webapp;

$settings = array(
	'course_layout_tabs' => array(
		'control_type' => 'base_tab_control',
		'section'      => 'course_layout',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'avanam' ),
				'target' => 'course_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'avanam' ),
				'target' => 'course_layout_design',
			),
			'active' => 'general',
		),
	),
	'course_layout_tabs_design' => array(
		'control_type' => 'base_tab_control',
		'section'      => 'course_layout_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'avanam' ),
				'target' => 'course_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'avanam' ),
				'target' => 'course_layout_design',
			),
			'active' => 'design',
		),
	),
	'info_course_title' => array(
		'control_type' => 'base_title_control',
		'section'      => 'course_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Course Title', 'avanam' ),
		'settings'     => false,
	),
	'info_course_title_design' => array(
		'control_type' => 'base_title_control',
		'section'      => 'course_layout_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Course Title', 'avanam' ),
		'settings'     => false,
	),
	'course_title' => array(
		'control_type' => 'base_switch_control',
		'sanitize'     => 'base_sanitize_toggle',
		'section'      => 'course_layout',
		'priority'     => 3,
		'default'      => webapp()->default( 'course_title' ),
		'label'        => esc_html__( 'Show Course Title?', 'avanam' ),
		'transport'    => 'refresh',
	),
	'course_title_layout' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Course Title Layout', 'avanam' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => webapp()->default( 'course_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'tooltip' => __( 'In Content', 'avanam' ),
					'icon'    => 'incontent',
				),
				'above' => array(
					'tooltip' => __( 'Above Content', 'avanam' ),
					'icon'    => 'abovecontent',
				),
			),
			'responsive' => false,
			'class'      => 'base-two-col',
		),
	),
	'course_title_inner_layout' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'priority'     => 4,
		'default'      => webapp()->default( 'course_title_inner_layout' ),
		'label'        => esc_html__( 'Title Container Width', 'avanam' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.course-hero-section',
				'pattern'  => 'entry-hero-layout-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'standard' => array(
					'tooltip' => __( 'Background Fullwidth, Content Contained', 'avanam' ),
					'name'    => __( 'Standard', 'avanam' ),
					'icon'    => '',
				),
				'fullwidth' => array(
					'tooltip' => __( 'Background & Content Fullwidth', 'avanam' ),
					'name'    => __( 'Fullwidth', 'avanam' ),
					'icon'    => '',
				),
				'contained' => array(
					'tooltip' => __( 'Background & Content Contained', 'avanam' ),
					'name'    => __( 'Contained', 'avanam' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'course_title_align' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Course Title Align', 'avanam' ),
		'priority'     => 4,
		'default'      => webapp()->default( 'course_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.course-title',
				'pattern'  => array(
					'desktop' => 'title-align-$',
					'tablet'  => 'title-tablet-align-$',
					'mobile'  => 'title-mobile-align-$',
				),
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'left' => array(
					'tooltip'  => __( 'Left Align Title', 'avanam' ),
					'dashicon' => 'editor-alignleft',
				),
				'center' => array(
					'tooltip'  => __( 'Center Align Title', 'avanam' ),
					'dashicon' => 'editor-aligncenter',
				),
				'right' => array(
					'tooltip'  => __( 'Right Align Title', 'avanam' ),
					'dashicon' => 'editor-alignright',
				),
			),
			'responsive' => true,
		),
	),
	'course_title_height' => array(
		'control_type' => 'base_range_control',
		'section'      => 'course_layout',
		'priority'     => 5,
		'label'        => esc_html__( 'Title Container Min Height', 'avanam' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .course-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => webapp()->default( 'course_title_height' ),
		'input_attrs'  => array(
			'min'     => array(
				'px'  => 10,
				'em'  => 1,
				'rem' => 1,
				'vh'  => 2,
			),
			'max'     => array(
				'px'  => 800,
				'em'  => 12,
				'rem' => 12,
				'vh'  => 100,
			),
			'step'    => array(
				'px'  => 1,
				'em'  => 0.01,
				'rem' => 0.01,
				'vh'  => 1,
			),
			'units'   => array( 'px', 'em', 'rem', 'vh' ),
		),
	),
	'course_title_elements' => array(
		'control_type' => 'base_sorter_control',
		'section'      => 'course_layout',
		'priority'     => 6,
		'default'      => webapp()->default( 'course_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'avanam' ),
		'transport'    => 'refresh',
		'settings'     => array(
			'elements'    => 'course_title_elements',
			'title' => 'course_title_element_title',
			'breadcrumb'  => 'course_title_element_breadcrumb',
		),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'group' => 'course_title_element',
		),
	),
	'course_title_font' => array(
		'control_type' => 'base_typography_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Course Title Font', 'avanam' ),
		'default'      => webapp()->default( 'course_title_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.course-title h1',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'id'             => 'course_title_font',
			'headingInherit' => true,
		),
	),
	'course_title_breadcrumb_color' => array(
		'control_type' => 'base_color_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'avanam' ),
		'default'      => webapp()->default( 'course_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.course-title .base-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.course-title .base-breadcrumbs a:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'avanam' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Link Hover Color', 'avanam' ),
					'palette' => true,
				),
			),
		),
	),
	'course_title_breadcrumb_font' => array(
		'control_type' => 'base_typography_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Breadcrumb Font', 'avanam' ),
		'default'      => webapp()->default( 'course_title_breadcrumb_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.course-title .base-breadcrumbs',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'course_title_breadcrumb_font',
			'options' => 'no-color',
		),
	),
	'course_title_background' => array(
		'control_type' => 'base_background_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Course Above Area Background', 'avanam' ),
		'default'      => webapp()->default( 'course_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .course-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Course Title Background', 'avanam' ),
		),
	),
	'course_title_featured_image' => array(
		'control_type' => 'base_switch_control',
		'sanitize'     => 'base_sanitize_toggle',
		'section'      => 'course_layout_design',
		'default'      => webapp()->default( 'course_title_featured_image' ),
		'label'        => esc_html__( 'Use Featured Image for Background?', 'avanam' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
	),
	'course_title_overlay_color' => array(
		'control_type' => 'base_color_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Background Overlay Color', 'avanam' ),
		'default'      => webapp()->default( 'course_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.course-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Overlay Color', 'avanam' ),
					'palette' => true,
				),
			),
			'allowGradient' => true,
		),
	),
	'course_title_border' => array(
		'control_type' => 'base_borders_control',
		'section'      => 'course_layout_design',
		'label'        => esc_html__( 'Border', 'avanam' ),
		'default'      => webapp()->default( 'course_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'course_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'course_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'course_title_top_border',
			'border_bottom' => 'course_title_bottom_border',
		),
		'live_method'     => array(
			'course_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.course-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'course_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.course-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_course_layout' => array(
		'control_type' => 'base_title_control',
		'section'      => 'course_layout',
		'priority'     => 10,
		'label'        => esc_html__( 'Course Layout', 'avanam' ),
		'settings'     => false,
	),
	'info_course_layout_design' => array(
		'control_type' => 'base_title_control',
		'section'      => 'course_layout_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Course Layout', 'avanam' ),
		'settings'     => false,
	),
	'course_layout' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Course Layout', 'avanam' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => webapp()->default( 'course_layout' ),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'tooltip' => __( 'Normal', 'avanam' ),
					'icon' => 'normal',
				),
				'narrow' => array(
					'tooltip' => __( 'Narrow', 'avanam' ),
					'icon' => 'narrow',
				),
				'fullwidth' => array(
					'tooltip' => __( 'Fullwidth', 'avanam' ),
					'icon' => 'fullwidth',
				),
				'left' => array(
					'tooltip' => __( 'Left Sidebar', 'avanam' ),
					'icon' => 'leftsidebar',
				),
				'right' => array(
					'tooltip' => __( 'Right Sidebar', 'avanam' ),
					'icon' => 'rightsidebar',
				),
			),
			'responsive' => false,
			'class'      => 'base-three-col',
		),
	),
	'course_sidebar_id' => array(
		'control_type' => 'base_select_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Course Default Sidebar', 'avanam' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => webapp()->default( 'course_sidebar_id' ),
		'input_attrs'  => array(
			'options' => webapp()->sidebar_options(),
		),
	),
	'course_content_style' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Content Style', 'avanam' ),
		'priority'     => 10,
		'default'      => webapp()->default( 'course_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-course',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'boxed' => array(
					'tooltip' => __( 'Boxed', 'avanam' ),
					'icon' => 'boxed',
				),
				'unboxed' => array(
					'tooltip' => __( 'Unboxed', 'avanam' ),
					'icon' => 'narrow',
				),
			),
			'responsive' => false,
			'class'      => 'base-two-col',
		),
	),
	'course_vertical_padding' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Content Vertical Padding', 'avanam' ),
		'priority'     => 10,
		'default'      => webapp()->default( 'course_vertical_padding' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-course',
				'pattern'  => 'content-vertical-padding-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'show' => array(
					'name' => __( 'Enable', 'avanam' ),
				),
				'hide' => array(
					'name' => __( 'Disable', 'avanam' ),
				),
				'top' => array(
					'name' => __( 'Top Only', 'avanam' ),
				),
				'bottom' => array(
					'name' => __( 'Bottom Only', 'avanam' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-two-grid',
		),
	),
	'course_feature' => array(
		'control_type' => 'base_switch_control',
		'sanitize'     => 'base_sanitize_toggle',
		'section'      => 'course_layout',
		'priority'     => 20,
		'default'      => webapp()->default( 'course_feature' ),
		'label'        => esc_html__( 'Show Featured Image?', 'avanam' ),
		'transport'    => 'refresh',
	),
	'course_feature_position' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Featured Image Position', 'avanam' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => webapp()->default( 'course_feature_position' ),
		'context'      => array(
			array(
				'setting'    => 'course_feature',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'above' => array(
					'name' => __( 'Above', 'avanam' ),
				),
				'behind' => array(
					'name' => __( 'Behind', 'avanam' ),
				),
				'below' => array(
					'name' => __( 'Below', 'avanam' ),
				),
			),
			'responsive' => false,
		),
	),
	'course_feature_ratio' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Featured Image Ratio', 'avanam' ),
		'priority'     => 20,
		'default'      => webapp()->default( 'course_feature_ratio' ),
		'context'      => array(
			array(
				'setting'    => 'course_feature',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-course .article-post-thumbnail',
				'pattern'  => 'base-thumbnail-ratio-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'inherit' => array(
					'name' => __( 'Inherit', 'avanam' ),
				),
				'1-1' => array(
					'name' => __( '1:1', 'avanam' ),
				),
				'3-4' => array(
					'name' => __( '4:3', 'avanam' ),
				),
				'2-3' => array(
					'name' => __( '3:2', 'avanam' ),
				),
				'9-16' => array(
					'name' => __( '16:9', 'avanam' ),
				),
				'1-2' => array(
					'name' => __( '2:1', 'avanam' ),
				),
			),
			'responsive' => false,
			'class' => 'base-three-col-short',
		),
	),
	'info_course_syllabus_layout' => array(
		'control_type' => 'base_title_control',
		'section'      => 'course_layout',
		'priority'     => 20,
		'label'        => esc_html__( 'Course Syllabus Layout', 'avanam' ),
		'settings'     => false,
	),
	'course_syllabus_columns' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'priority'     => 20,
		'label'        => esc_html__( 'Course Syllabus Columns', 'avanam' ),
		'transport'    => 'refresh',
		'default'      => webapp()->default( 'course_syllabus_columns' ),
		'input_attrs'  => array(
			'layout' => array(
				'1' => array(
					'name' => __( '1', 'avanam' ),
				),
				'2' => array(
					'name' => __( '2', 'avanam' ),
				),
				'3' => array(
					'name' => __( '3', 'avanam' ),
				),
			),
			'responsive' => false,
		),
	),
	'course_syllabus_lesson_style' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Course Lesson Style', 'avanam' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => webapp()->default( 'course_syllabus_lesson_style' ),
		'context'      => array(
			array(
				'setting'    => 'course_syllabus_columns',
				'operator'   => '=',
				'value'      => '1',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'standard' => array(
					'name' => __( 'Standard', 'avanam' ),
				),
				'tiles' => array(
					'name' => __( 'Two Column Tiles', 'avanam' ),
				),
				'center' => array(
					'name' => __( 'One Column Center', 'avanam' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-tiny-text',
		),
	),
	'course_syllabus_thumbs' => array(
		'control_type' => 'base_switch_control',
		'sanitize'     => 'base_sanitize_toggle',
		'section'      => 'course_layout',
		'priority'     => 20,
		'default'      => webapp()->default( 'course_syllabus_thumbs' ),
		'label'        => esc_html__( 'Show Lesson Thumbnail in Syllabus?', 'avanam' ),
		'transport'    => 'refresh',
	),
	'course_syllabus_thumbs_ratio' => array(
		'control_type' => 'base_radio_icon_control',
		'section'      => 'course_layout',
		'label'        => esc_html__( 'Lesson Thumbnail Ratio', 'avanam' ),
		'priority'     => 20,
		'default'      => webapp()->default( 'course_syllabus_thumbs_ratio' ),
		'context'      => array(
			array(
				'setting'    => 'course_syllabus_thumbs',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-course .llms-lesson-thumbnail',
				'pattern'  => 'base-thumbnail-ratio-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'inherit' => array(
					'name' => __( 'Inherit', 'avanam' ),
				),
				'1-1' => array(
					'name' => __( '1:1', 'avanam' ),
				),
				'3-4' => array(
					'name' => __( '4:3', 'avanam' ),
				),
				'2-3' => array(
					'name' => __( '3:2', 'avanam' ),
				),
				'9-16' => array(
					'name' => __( '16:9', 'avanam' ),
				),
				'1-2' => array(
					'name' => __( '2:1', 'avanam' ),
				),
			),
			'responsive' => false,
			'class' => 'base-three-col-short',
		),
	),
	'course_comments' => array(
		'control_type' => 'base_switch_control',
		'sanitize'     => 'base_sanitize_toggle',
		'section'      => 'course_layout',
		'priority'     => 20,
		'default'      => webapp()->default( 'course_comments' ),
		'label'        => esc_html__( 'Show Comments?', 'avanam' ),
		'transport'    => 'refresh',
	),
	'course_background' => array(
		'control_type' => 'base_background_control',
		'section'      => 'course_layout_design',
		'priority'     => 20,
		'label'        => esc_html__( 'Site Background', 'avanam' ),
		'default'      => webapp()->default( 'course_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single-course',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Course Background', 'avanam' ),
		),
	),
	'course_content_background' => array(
		'control_type' => 'base_background_control',
		'section'      => 'course_layout_design',
		'priority'     => 20,
		'label'        => esc_html__( 'Content Background', 'avanam' ),
		'default'      => webapp()->default( 'course_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single-course .content-bg, body.single-course.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Course Content Background', 'avanam' ),
		),
	),
);

Theme_Customizer::add_settings( $settings );

