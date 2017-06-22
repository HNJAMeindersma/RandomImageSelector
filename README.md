# Random Image Selector
The Random Image Selector selects a random image from a directory and serve the script as an image trough HTTP.

Just use a normal HTML image tag or use the script as an image in your CSS stylesheets to include the Random Image Selector.
```
HTML
<img src="random_image.php" alt="My random image" title="My random image">

CSS
background-image: url('random_image.php');
```

**Script:** Random Image Selector<br />
**Version:** v1.1.1<br />
**Author:** H.N.J.A. Meindersma <dev@hnjameindersma.nl><br />
**Description:** The Random Image Selector selects a random image from a directory and serve the script as an image trough HTTP.<br />

### Configuration
- $img_enable
> yes' or 'no' if the random image selector enabled. If not; the fallback image is served.
- $img_directory
> Directory containing images, ending with a '/' or completely empty.
- $img_types
> File extentions which may be selected. Comma seperated, without spaces.
- $img_fallback
> Path to a fallback image if the directory is empty.
- $img_cross_enable
> 'yes' or 'no' if there should be a backup cross displayed if no images or fallback image is found.
- $img_cross_color
> HEX color code for the color of the backup cross.

### Dependancies
- PHP >= 5.3.0
> PHP > glob() [ 4.3.0, 5.0, 7.0 ]<br />
> PHP > empty() [ 4.0, 5.0, 7.0 ]<br />
> PHP > file_exists() [ 4.0, 5.0, 7.0 ]<br />
> PHP > array_push() [ 4.0, 5.0, 7.0 ]<br />
> PHP > header() [ 4.0, 5.0, 7.0 ]<br />
> PHP > echo() [ 4.0, 5.0, 7.0 ]<br />
> PHP > flush() [ 4.0, 5.0, 7.0 ]<br />
> PHP > unset() [ 4.0, 5.0, 7.0 ]<br />
> PHP > exit() [ 4.0, 5.0, 7.0 ]<br />
> PHP > array_rand() [ 4.0, 5.0, 7.0 ]<br />
> PHP > class > finfo() [ 5.3.0, 7.0 ]<br />
> PHP > file() [ 4.0, 5.0, 7.0 ]<br />
> PHP > file_get_contents() [ 4.3.0, 5.0, 7.0 ]<br />
