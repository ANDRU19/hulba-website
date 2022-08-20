<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Actions\UploadFiles;
use Illuminate\Http\Request;


class ProductMediaController extends Controller
{


    public function store(Request $request , UploadFiles $uploadFiles)
    {
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:mimes:jpeg,png,jpg,svg,mp4|max:9048',
        ]);
        $user = auth()->user();
        $currentTeam = $user->current_team_id;
        $files = $request->file('file');
        $path = 'uploads/team_id_' . $currentTeam . '/compendium-logo';
        $response = $uploadFiles->upload($files, $path, ['response' => 'json']);
        return $response;
    }
}
