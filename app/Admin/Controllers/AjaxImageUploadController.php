<?php


namespace App\Admin\Controllers;


use Encore\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Validator;
use App\PayService;


class AjaxImageUploadController extends AdminController
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

            $input = $request->all();
            $input['file'] = time().'.'.$request->file->extension();
            $request->file->move(public_path('images'), $input['file']);


            $payservice = new PayService();
            $payservice->update(
               ['id' => $input['id']],
               [$request->file->extension() => $input['file']]
               );

            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
