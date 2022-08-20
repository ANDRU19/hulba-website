<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class UploadFiles

{

    public function upload(array $files, String $path, $options = [])
    {
        try {

            $uploadedFiles = [];

            foreach ($files as $file) {
                $filePath = $file->storePublicly($path, ['disk' => 'public']);

                $uploadedFiles[] = [
                    'filename' => basename($filePath),
                    'url' => url(Storage::url($filePath)),
                    'path' => $path,
                ];
            }
        } catch (\Exception $exception) {

            $response = [
                'error' => $exception->getMessage(),
            ];
            return  response()->json($response);
        }

        $response = [
            'files' => $uploadedFiles,
        ];
        return response()->json($response);
    }
}
