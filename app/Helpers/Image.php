<?php

namespace App\Helpers;

class Image
{

    public static function addMediaToLibraryWithManipulation($model, $image, $width, $height,$collection = 'default')
    {

        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = storage_path('tmp/uploads/' . $image->getClientOriginalName());
        \Intervention\Image\Facades\Image::make($image)->resize($width, $height)->save($path);
        $media = $model->addMedia($path)->toMediaCollection($collection);
        return $media->getUrl();
    }

    public static function addMediaToLibraryWithManipulationWithName($model, $name, $width, $height,$keep = false,$collection = 'default')
    {

        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = storage_path('tmp/uploads/' . $name);
        \Intervention\Image\Facades\Image::make($path)->resize($width, $height,function($constraint) {
            $constraint->aspectRatio();
        })->save($path);

        if ($keep){
            $media = $model->addMedia($path)->preservingOriginal()->toMediaCollection($collection);
        }else{
            $media = $model->addMedia($path)->toMediaCollection($collection);
        }

        return $media->getUrl();
    }


    public static function addMediaToLibrary($model, $image, $collection = 'default')
    {

        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = storage_path('tmp/uploads/' . $image->getClientOriginalName());
        \Intervention\Image\Facades\Image::make($image)->save($path);
        $media = $model->addMedia($path)->toMediaCollection($collection);
        return $media->getUrl();
    }

    public static function addMediaToLibraryFromUrl($model, $url, $collection = 'default')
    {

        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = storage_path('tmp/uploads/' . rand(0,999999999999999).'.jpg');
        \Intervention\Image\Facades\Image::make($url)->save($path);
        $media = $model->addMedia($path)->toMediaCollection($collection);
        return $media->getUrl();
    }

    public static function upload($file)
    {
        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return [
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ];
    }
}
