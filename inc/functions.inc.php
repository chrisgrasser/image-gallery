<?php
function processImage()
{
    $upload_errors = array(
        UPLOAD_ERR_OK                 => "No errors.",
        UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL             => "Partial upload.",
        UPLOAD_ERR_NO_FILE             => "No file.",
        UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
    );

    // check if it's post
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // select file to move
        $tmp_file = $_FILES['file_upload']['tmp_name'];

        // set target file name
        $target_file = basename($_FILES['file_upload']['name']);

        // set upload folder name
        $upload_dir = 'uploads';

        // move file
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        } // end if
        return $message;
    } // end if
}

function showImages($dir)
{
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                if ($filename != '.' && $filename != '..') {
                    echo "<div class='col-lg-3 col-md-4 col-sm-6 p-2'><img src='uploads/{$filename}' class='img-thumbnail'><br><a href='?file=$dir" . '/' . "$filename' title='Delete Image'>Delete</a><br></div>";
                }
            } // end while

            // close the directory
            closedir($dir_handle);
        } // end if
    }
}

function displayErrors($message)
{
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
}

function deleteImage()
{
    // pull the file name from the url and delete it
    if (isset($_GET["file"])) {
        unlink($_GET['file']);
    }
}
