<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Traits\common;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    use common;
    public function LogoView()
    {
        // $mainposters = Mainposter::first();
        return view('back_end.Logo');
    }

    public function LogoStore(Request $request)
    {

        // Validation: Only required if it's a new logo
        $request->validate(
            [
                'fileHeaderLogoImage' => ($request->hdLogoId == null) ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'fileFooterLogoImage' => ($request->hdLogoId == null) ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'fileHeaderLogoImage.required' => 'Header Logo Image is required',
                'fileFooterLogoImage.required' => 'Footer Logo Image is required'
            ]
        );
        $logo = Logo::first();

        // If not exists, create new
        if (!$logo) {
            $logo = new Logo();
        }

      if ($request->hasFile('fileHeaderLogoImage')) {
        $file = $request->file('fileHeaderLogoImage');
        $extension = $file->getClientOriginalExtension();
        $fileName = $this->generateRandom(16) . '.' . $extension;
   
        ######### Live Configuration #####
        $absolutePath = '/home/faizgshb/public_html/upload/logo/' . $logo->id;

        $savedPath = $this->fileUpload($file, $absolutePath, $fileName);

        $logo->update([
            'header_logo' => $savedPath
        ]);


    #######################
            // $path = $this->fileUpload($file, 'upload/logo/header', $fileName);
            // $logo->header_logo = $path;

        }

       if ($request->hasFile('fileFooterLogoImage')) {
        $file = $request->file('fileFooterLogoImage');
        $extension = $file->getClientOriginalExtension();
        $fileName = $this->generateRandom(16) . '.' . $extension;
   
        ######### Live Configuration #####
        $absolutePath = '/home/faizgshb/public_html/upload/logo/' . $logo->id;

        $savedPath = $this->fileUpload($file, $absolutePath, $fileName);

        $logo->update([
            'footer_logo' => $savedPath
        ]);

            ##################################################################

            // $path = $this->fileUpload($file, 'upload/logo/footer', $fileName);
            // $logo->footer_logo = $path;
        }
      
        // Toastr Notification
        $notification = [
            'message' => 'Logo Saved Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
