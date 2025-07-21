<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mainposter;
use Illuminate\Http\Request;
use App\Traits\common;

class MainposterController extends Controller
{

    use Common;
    public function mainposterStore(Request $request){

        $request->validate(
            [
                'txtMainposterName' => 'required',
                'fileMainposterImage' => ($request->hdMainposterId == null) ? 'required' : '',
                // Remove validation for update scenario
            ],
            [
                'fileMainposterImage.required' => 'Mainposter Image is Required',
                'txtMainposterName.required' => 'Mainposter Name is Required'
            ]
        );

       // Check if any record exists in the mainposter table
        $mainposter = Mainposter::first();

if (!$mainposter) {
    // If no record exists, create a new one
    $mainposter = Mainposter::create([
        'mainposter_tittle' => $request->txtMainposterName,
    ]);
} else {
    // If record exists, update the existing one
    $mainposter->update([
        'mainposter_tittle' => $request->txtMainposterName,
    ]);
}

// Handle file upload if image is provided
if ($request->hasFile('fileMainposterImage')) {
    $file = $request->file('fileMainposterImage');
    $extension = $file->getClientOriginalExtension();
    $fileName = $this->generateRandom(16) . '.' . $extension;
   
    ######### Live Configuration #####
    $absolutePath = '/home/faizgshb/public_html/upload/mainposter/' . $mainposter->id;

    $savedPath = $this->fileUpload($file, $absolutePath, $fileName);

    $mainposter->update([
        'mainposter_image' => $savedPath
    ]);

    #######################

    // $mainposter->update([
    //     'mainposter_image' => $this->fileUpload($file, 'upload/mainposter/' . $mainposter->id, $fileName)
    // ]);
}

// Toastr notification
$notification = [
    'message' => 'Mainposter Saved Successfully',
    'alert-type' => 'success'
];

return redirect()->back()->with($notification);

    }
}
