<?php

namespace App\Models\Traits;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

trait UploadFiles
{

    protected $file_path = '';


    public function imageSave(UploadedFile $image) :void
    {
        $this->file_path = $image->store('images', 'public');

            Image::create([
                'name' => $this->file_path, 
                'product_id' => $this->id
            ]);
    }


    public function photoSave(UploadedFile $photo) :void
    {
        $this->file_path = $photo->store('photo', 'public');
        $this->forceFill([
            'photo' => $this->file_path
        ]);

        $this->save();
    }


}