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

            $path = 'app/public/videoshow/';

            $filename = md5(session('payservice_id', 1) . env('SECRET_KEY'));
            $data = [];
            if (file_exists(storage_path($path.'tmp/' . $filename . '.mp4'))) {
                $data['video_mp4'] = $filename . '.mp4';
                rename(storage_path($path.'tmp/' . $filename . '.mp4'), storage_path($path . $filename . '.mp4'));
            }
            if (file_exists(storage_path($path.'tmp/' . $filename . '.webm'))) {
                $data['video_webm'] = $filename . '.webm';
                rename(storage_path($path.'tmp/' . $filename . '.webm'), storage_path($path . $filename . '.webm'));
            }
            if (file_exists(storage_path($path.'tmp/' . $filename . '.m4v'))) {
                $data['video_m4v'] = $filename . '.m4v';
                rename(storage_path($path.'tmp/' . $filename . '.m4v'), storage_path($path . $filename . '.m4v'));
            }
            if (file_exists(storage_path($path.'tmp/' . $filename . '.ogv'))) {
                $data['video_ogv'] = $filename . '.ogv';
                rename(storage_path($path.'tmp/' . $filename . '.ogv'), storage_path($path . $filename . '.ogv'));
            }
            if (file_exists(storage_path($path.'tmp/' . $filename . '.mp3'))) {
                $data['audio_mp3'] = $filename . '.mp3';
                rename(storage_path($path.'tmp/' . $filename . '.mp3'), storage_path($path . $filename . '.mp3'));
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
