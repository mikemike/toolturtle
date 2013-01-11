<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * If you want to override the default configuration, add the keys you
 * want to change here, and assign new values to them.
 */

return array(
	/**************************************************************************/
	/* Always Load                                                            */
	/**************************************************************************/
	'always_load'  => array(

		/**
		 * These packages are loaded on Fuel's startup.
		 * You can specify them in the following manner:
		 *
		 * array('auth'); // This will assume the packages are in PKGPATH
		 *
		 * // Use this format to specify the path to the package explicitly
		 * array(
		 *     array('auth'	=> PKGPATH.'auth/')
		 * );
		 */
		'packages'  => array(
			'orm',
		),
	),
	'module_paths' => array(
		APPPATH.'modules'.DS
	),
	
	/**
	 * Security settings
	 */
	'security' => array(		

		/**
		 * With output encoding switched on all objects passed will be converted to strings or
		 * throw exceptions unless they are instances of the classes in this array.
		 */
		'whitelisted_classes' => array(
			'Fuel\\Core\\Response',
			'Fuel\\Core\\View',
			'Fuel\\Core\\ViewModel',
			'Fuel\\Core\\Validation',
			'Closure',
		)
	),
	
	/**
	 * Validation rules
	 */
	'validation' => array(
		'open_list' => '<div class="alert alert-error">',
		'close_list' => '</div>',
		'open_error' => '',
		'close_error' => '<br>',
	),
);
