<?php
/**
 * Copyright (C) 2017 H.N.J.A. Meindersma
 * 
 * Script: Random Image Selector
 * Version: v1.0.0
 * Author: H.N.J.A. Meindersma <dev@hnjameindersma.net>
 * Description:	The Random Image Selector selects a random image from a 
 * 				directory and serve the script as an image trough 
 * 				HTTP.
 * Dependancies: PHP 5.3.0
 * 	PHP > echo() [ 4.0, 5.0, 7.0 ]
 * 	PHP > glob() [ 4.3.0, 5.0, 7.0 ]
 * 	PHP > empty() [ 4.0, 5.0, 7.0 ]
 * 	PHP > file_exists() [ 4.0, 5.0, 7.0 ]
 * 	PHP > array_push() [ 4.0, 5.0, 7.0 ]
 * 	PHP > array_rand() [ 4.0, 5.0, 7.0 ]
 * 	PHP > class > finfo() [ 5.3.0 7.0 ]
 * 	PHP > file() [ 4.0, 5.0, 7.0 ]
 * 	PHP > header() [ 4.0, 5.0, 7.0 ]
 * 	PHP > file_get_contents() [ 4.3.0, 5.0, 7.0 ]
 * 	PHP > echo() [ 4.0, 5.0, 7.0 ]
 * 	PHP > flush() [ 4.0, 5.0, 7.0 ]
 * 	PHP > unset() [ 4.0, 5.0, 7.0 ]
 */


/**
 *	Configurations
 */

	// 'yes' or 'no' if the random image selector enabled. If not; the 
	// fallback image is served.
	$img_enable				=	'yes';

	// Directory containing images, ending with a '/' or completely 
	// empty.
	$img_directory			=	'images/';

	// File extentions which may be selected. Comma seperated, without 
	// spaces.
	$img_types				=	'jpg,jpeg,png,gif,svg';

	// Path to a fallback image if the directory is empty.
	$img_fallback			=	'fallback.jpg';


/**
 *	Below here is the script. Do not modify below here, or do. I don't 
 *	care. No warranty <3
 */

	// Make an array from the files in the directory which fits the 
	// type extention
	$img_array = glob($img_directory . '*.{' . $img_types . '}', GLOB_BRACE);

	// Check if random image selector is enabled and if there are any 
	// files in the array, else push a fallback image (if exists)
	if($img_enable != 'yes' || empty($img_array)) {
		if(file_exists($img_fallback)) {
			array_push($img_array, $img_fallback);
		}
	}

	// Select a random file from array
	$img_random = $img_array[array_rand($img_array)];

	// Select the image Mime-type and echo the header 'Content-Type'
	$img_type = new finfo();
	$img_type = $img_type->file($img_random, FILEINFO_MIME_TYPE);
	header('Content-Type: ' . $img_type);

	// Load file contents and echo the contents
	$img_contents = file_get_contents($img_random);
	echo $img_contents;

	// Clean everything up
	flush();
	unset($img_enable, $img_directory, $img_types, $img_fallback, $img_array, $img_random, $img_type, $img_contents);
?>