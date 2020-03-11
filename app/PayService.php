<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayService extends Model
{

    protected $fillable = ['name', 'video_mp4', 'video_m4v', 'video_webm', 'video_ogv', 'audio_mp3', 'image'];

    public function group_code() {
        return $this->belongsTo(GroupCode::class);
    }

    public function updateVideoFiles($id) {
        try {

            $filename = md5(session('payservice_id', 1) . env('SECRET_KEY'));
            $data = [];
            if (file_exists(storage_path('videoshow/tmp/' . $filename . '.mp4'))) {
                $data['video_mp4'] = $filename . '.mp4';
                rename(storage_path('videoshow/tmp/' . $filename . '.mp4'), storage_path('videoshow/' . $filename . '.mp4'));
            }
            if (file_exists(storage_path('videoshow/tmp/' . $filename . '.webm'))) {
                $data['video_webm'] = $filename . '.webm';
                rename(storage_path('videoshow/tmp/' . $filename . '.webm'), storage_path('videoshow/' . $filename . '.webm'));
            }
            if (file_exists(storage_path('videoshow/tmp/' . $filename . '.m4v'))) {
                $data['video_m4v'] = $filename . '.m4v';
                rename(storage_path('videoshow/tmp/' . $filename . '.m4v'), storage_path('videoshow/' . $filename . '.m4v'));
            }
            if (file_exists(storage_path('videoshow/tmp/' . $filename . '.ogv'))) {
                $data['video_ogv'] = $filename . '.ogv';
                rename(storage_path('videoshow/tmp/' . $filename . '.ogv'), storage_path('videoshow/' . $filename . '.ogv'));
            }
            if (file_exists(storage_path('videoshow/tmp/' . $filename . '.mp3'))) {
                $data['audio_mp3'] = $filename . '.mp3';
                rename(storage_path('videoshow/tmp/' . $filename . '.mp3'), storage_path('videoshow/' . $filename . '.mp3'));
            }
            if (count($data) > 0) {
                $this->find($id)->update($data);
            }
            return true;
        }
        catch (\Exception $exception) {
//            dd($exception->getMessage());
            return false;
        }
    }
}
