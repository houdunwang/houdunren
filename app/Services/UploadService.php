<?php

namespace App\Services;

use App\Attachment;
use Auth;
use Illuminate\Http\UploadedFile;

class UploadService
{
    public function image(UploadedFile $file)
    {
        $path = $file->store(date('Ym'), 'attacment');
        return $this->save($file, '/attacments/' . $path);
    }

    protected function save(UploadedFile $file, string $path)
    {
        return Attachment::create([
            'path' => $path,
            'user_id' => Auth::id(),
            'name' => $file->getClientOriginalName(),
            'extension' => $file->extension(),
        ]);
    }
}
