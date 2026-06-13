<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageOptimizationService
{
    /**
     * Upload and optimize image with WebP conversion
     */
    public function uploadAndOptimize($file, string $path = 'rooms'): array
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $webpFilename = time() . '_' . uniqid() . '.webp';
        
        // Original image
        $originalPath = $file->storeAs("public/{$path}", $filename);
        
        // Create optimized WebP version
        $image = Image::make($file);
        
        // Resize if too large (max 1920px width)
        if ($image->width() > 1920) {
            $image->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        
        // Save as WebP
        $webpPath = storage_path("app/public/{$path}/{$webpFilename}");
        $image->encode('webp', 85)->save($webpPath);
        
        // Create thumbnail (400px width)
        $thumbnailFilename = 'thumb_' . $webpFilename;
        $thumbnail = Image::make($file)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $thumbnailPath = storage_path("app/public/{$path}/{$thumbnailFilename}");
        $thumbnail->encode('webp', 80)->save($thumbnailPath);
        
        return [
            'original' => Storage::url("public/{$path}/{$filename}"),
            'webp' => Storage::url("public/{$path}/{$webpFilename}"),
            'thumbnail' => Storage::url("public/{$path}/{$thumbnailFilename}"),
        ];
    }
    
    /**
     * Delete image and its variants
     */
    public function deleteImage(string $path): bool
    {
        $pathInfo = pathinfo($path);
        $directory = $pathInfo['dirname'];
        $filename = $pathInfo['filename'];
        
        // Delete original
        Storage::delete($path);
        
        // Delete WebP version
        Storage::delete("{$directory}/{$filename}.webp");
        
        // Delete thumbnail
        Storage::delete("{$directory}/thumb_{$filename}.webp");
        
        return true;
    }
}
