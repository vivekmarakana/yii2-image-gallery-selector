<?php

namespace vivekmarakana\helpers;

class FileUploadHelper {
    /**
     * Refines $_FILES for simpler access whenever there are multiple files are uploaded.
     * @param $_FILES
     *
     * When uploading multiple files, the $_FILES variable is created in the form:
     *
     * ```php
     * [
     *     "name" => [
     *         0 => "foo.txt"
     *         1 => "bar.txt"
     *     ]
     *     "type" => [
     *         0 => "text/plain"
     *         1 => "text/plain"
     *     ]
     *     "tmp_name" => [
     *         0 => "/tmp/phpYzdqkD"
     *         1 => "/tmp/phpeEwEWG"
     *     ]
     *     "error" => [
     *         0 => 0
     *         1 => 0
     *     ]
     *     "size" => [
     *         0 => 123
     *         1 => 456
     *     ]
     * ]
     * ```
     *
     * This helper coverts it in a little cleaner code when files are uploaded in form of array. Final format will be like:
     *
     * ```php
     * [
     *     0 => [
     *         "name" => "foo.txt",
     *         "type" => "text/plain",
     *         "tmp_name" => "/tmp/phpYzdqkD",
     *         "error" => 0,
     *         "size" => 123,
     *     ]
     *     1 => [
     *         "name" => "bar.txt",
     *         "type" => "text/plain",
     *         "tmp_name" => "/tmp/phpeEwEWG",
     *         "error" => 0,
     *         "size" => 456,
     *     ]
     * ]
     * ```
     *
     * Now we can iterate over the array to access each file like:
     * ```php
     * if ($_FILES['upload']) {
     *     $file_ary = reArrayFiles($_FILES['ufile']);
     *
     *     foreach ($file_ary as $file) {
     *         print 'File Name: ' . $file['name'];
     *         print 'File Type: ' . $file['type'];
     *         print 'File Size: ' . $file['size'];
     *     }
     * }
     * ```
     */
    public static function refineFilesArray(&$file_post){
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}
?>
