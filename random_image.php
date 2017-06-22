<?php
/**
 * Copyright (C) 2017 H.N.J.A. Meindersma
 * 
 * Script: Random Image Selector
 * Version: v1.1.0
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
 *	Configurations for the script below here.
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

	// 'yes' or 'no' if a cross should be displayed if no image is 
	// found at all.
	$img_cross_enable		=	'yes';

	// HEX color code for the color of the cross.
	$img_cross_color		=	'#FFFFFF';

/**
 *	Below here is the script. Do not modify below here, or do. I don't 
 *	care. No warranty <3
 */

	// Make an array from the files in the directory which fits the 
	// type extention.
	$img_array = glob($img_directory . '*.{' . $img_types . '}', GLOB_BRACE);

	// Check if random image selector is enabled and if there are any 
	// files in the array, else push a fallback image (if exists).
	if($img_enable != 'yes' || empty($img_array)) {
		if(file_exists($img_fallback)) {
			array_push($img_array, $img_fallback);
		} else {
			// If fallback image is not found; echo svg 'cross'.
			if($img_cross_enable == 'yes') {
				header('Content-Type: image/svg+xml');
				echo '<svg fill="' . $img_cross_color . '" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">'; echo "\n";
				echo '    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>'; echo "\n";
				echo '    <path d="M0 0h24v24H0z" fill="none"/>'; echo "\n";
				echo '</svg>'; echo "\n";
			}
			// Clean everything up and exit script.
			flush();
			unset($img_enable, $img_directory, $img_types, $img_fallback, $img_cross_enable, $img_cross_color, $img_array);
			exit();
		}
	}

	// Select a random file from array.
	$img_random = $img_array[array_rand($img_array)];

	// Select the image Mime-type and echo the header 'Content-Type' 
	// with the Mime-type of the image.
	$img_type = new finfo();
	$img_type = $img_type->file($img_random, FILEINFO_MIME_TYPE);
	header('Content-Type: ' . $img_type);

	// Load file contents and echo the contents.
	$img_contents = file_get_contents($img_random);
	echo $img_contents;

	// Clean everything up.
	flush();
	unset($img_enable, $img_directory, $img_types, $img_fallback, $img_cross_enable, $img_cross_color, $img_array, $img_random, $img_type, $img_contents);
?>