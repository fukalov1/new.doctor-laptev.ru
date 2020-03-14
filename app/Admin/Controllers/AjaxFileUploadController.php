<?php


namespace App\Admin\Controllers;


use Encore\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Validator;
use App\PayService;


class AjaxFileUploadController extends AdminController
{
    /**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxFileUploadPost(Request $request)
    {
//        dd( pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION));
        $validator = Validator::make($request->all(), [
            'upl' => 'required|mimes:m4v,mp4,webm,ogv,mpga,wav,mp3|max:51200',
        ]);


        if ($validator->passes()) {

            try {

// A list of permitted file extensions

                if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

                    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
                    $filename  = md5(session('payservice_id', 1).env('SECRET_KEY')).'.'.$extension;

                    if(move_uploaded_file($_FILES['upl']['tmp_name'], storage_path('/app/public/videoshow/tmp/'.$filename))) {
                        return Response()->json([
                            'status' => 'success'
                        ]);
                    }
                }

                return Response()->json([
                    "status" => 'error',
                ]);

            }
            catch (\Exception $exception) {
                return Response()->json([
                    "status" => 'error',
                    'message' => $exception->getMessage()
                ]);
            }
        }


        return response()->json(['status'=>$validator->errors()->all()]);
    }
}
