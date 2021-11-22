<?php
class ImageHelper
{
    public static function unlinkTemporaryImage()
    {
        if (request()->session()->has('dir')) {
            $dir = 'public/temp_image/' . request()->session()->get('dir');
            $files = glob($dir . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            if (is_dir($dir)) {
                rmdir($dir);
            }
            if (request()->session()->has('main_image')) {
                request()->session()->forget('main_image');
            }
            if (request()->session()->has('alt_image')) {
                request()->session()->forget('alt_image');
            }
        }
    }
}
