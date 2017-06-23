# Random Image Selector
##### The Random Image Selector selects a random image from a directory and serve the script as an image trough HTTP.
The script scans the directory for images that fix the set extentions. These images are inserted into an array where a random one is chosen. The Mime-Type of the image is retrieved and send via PHP as a HTTP header so the browser knows what to expect. Finally the contents of the chosen image file is loaded into the Random Image Selector.

Just use a normal HTML image tag or use the script as an image in your CSS stylesheets to include the Random Image Selector.
```
HTML
<img src="random_image.php" alt="My random image" title="My random image">

CSS
background-image: url('random_image.php');
```

It is also possible to use the Random Image Selector via a GET request to specify a directory. This makes it possible to use the script for multiple random image directories. Use $_GET["dir"] in the following way:
```
random_image.php?dir=some/other/directory/
```
> - Make sure to always end with a '/' for your GET request just like the default directory.
> - Spaces in directories should be converted to '%20' or '+'.

This GET request is also possible for the image file extentions, use $_GET["types"]:
```
random_image.php?dir=some/other/directory/&types=jpg,png,gif
```
> - Make sure to use ',' to separate the image file extentions and not to use any spaces.

**Script:** Random Image Selector<br />
**Version:** v1.2.2<br />
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
> PHP > file_exists() [ 4.0, 5.0, 7.0 ]<br />
> PHP > substr_compare() [ 5.0, 7.0 ]<br />
> PHP > strlen() [ 4.0, 5.0, 7.0 ]<br />
> PHP > glob() [ 4.3.0, 5.0, 7.0 ]<br />
> PHP > empty() [ 4.0, 5.0, 7.0 ]<br />
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
