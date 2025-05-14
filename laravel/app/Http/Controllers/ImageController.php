<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Save to MinIO
        $originalPath = $image->storeAs('uploads', $fileName, 'minio');

        // Create thumbnail
        $thumbnailPath = 'public/thumbnails/' . $fileName;
        // Ensure Intervention Image is installed and the correct class is imported
        // composer require intervention/image
        Image::make($image)->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path('app/' . $thumbnailPath));

        return redirect()->route('gallery.index')->with('success', 'Image uploaded.');
    }

    public function index()
    {
        $files = Storage::disk('public')->files('thumbnails');
        $thumbnails = array_map(function ($file) {
            return basename($file);
        }, $files);

        return view('gallery', compact('thumbnails'));
    }
}
