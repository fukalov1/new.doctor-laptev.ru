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
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,m4v,mp4,webm,ogg|max:51200',
        ]);


        if ($validator->passes()) {

            try {

// A list of permitted file extensions

                if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

                    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

                    if(move_uploaded_file($_FILES['upl']['tmp_name'], public_path('/uploads/files/tmp/'.$_FILES['upl']['name']))){
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
