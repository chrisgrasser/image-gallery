# Image Gallery

This web page displays an image gallery that you can upload your own images to and have them displayed. You can also delete any images you add with just a click.

This is done using PHP to validate the image file being submitted, adding the file to the local uploads folder if it is the correct format and not too large, and then generating divs that pull the images from the uploads folder. From there, it displays them in alphabetical order.

The images can be removed from the uploads easily just by clicking delete, which uses another PHP function to discard the selected file.