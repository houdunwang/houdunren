<?php

namespace App\Services;

use App\Attachment;
use Auth;
use Illuminate\Http\UploadedFile;

class UplaodService
{
    public function image(UploadedFile $file)
    {
        $path =  $file->store('attachments/' . date('Ym'));
        return $this->save($path);
    }

    protected function save(string $path)
    {
        return Attachment::create([
            'path' => $path,
            'user_id' => Auth::id(),
        ]);
    }
}
