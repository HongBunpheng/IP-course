<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateThumbnail implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function handle()
{
    $disk   = Storage::disk('minio');
    $stream = $disk->readStream($this->path);
    $img    = Image::make($stream);

    // 1) Force a 200×200 square thumbnail
    $img->resize(200, 200);

    // 2) Encode as JPG @80% quality and cast to string
    $encoded = $img->encode(new \Intervention\Image\Encoders\JpegEncoder(quality: 80));
    $thumbData = (string) $encoded;   // <-- cast here

    // 3) Build thumbnail path
    $basename  = pathinfo($this->path, PATHINFO_FILENAME);
    $thumbPath = "thumbnails/{$basename}.jpg";

    // 4) Store thumbnail
    $disk->put($thumbPath, $thumbData);
}

}
