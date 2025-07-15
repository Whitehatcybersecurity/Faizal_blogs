<?php

namespace App\Traits;

trait common
{
    public function generateRandom($digit)
    {
        $min = pow(10, $digit - 1);
        $max = pow(10, $digit) - 1;
        return rand($min, $max);
    }

    // public function fileUpload($fileinput, $filepath, $fileName)
    // {
    //     $fileinput->move(public_path($filepath), $fileName);
    //     return $filepath . '/' . $fileName;
    // }
public function fileUpload($fileinput, $absolutePath, $fileName)
{
    // Create folder if it doesn’t exist
    if (!file_exists($absolutePath)) {
        mkdir($absolutePath, 0755, true);
    }

    // Move the file
    $fileinput->move($absolutePath, $fileName);

    // Return public URL path for database
    // Example: upload/mainposter/1/image.jpg
    $relativePath = str_replace('/home/faizgshb/public_html/', '', $absolutePath);
    return $relativePath . '/' . $fileName;
}   

}
