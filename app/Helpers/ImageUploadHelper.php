<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadHelper
{
    /**
     * Upload image to specified folder
     */
    public static function uploadImage(UploadedFile $file, string $folder, string $oldImage = null): string
    {
        // Delete old image if exists
        if ($oldImage && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }

        // Generate unique filename
        $filename = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        
        // Store in public folder structure
        $path = $folder . '/' . $filename;
        
        // Move file to public directory
        $file->move(public_path($folder), $filename);
        
        return $path;
    }

    /**
     * Delete image from storage
     */
    public static function deleteImage(string $imagePath): bool
    {
        if ($imagePath && file_exists(public_path($imagePath))) {
            return unlink(public_path($imagePath));
        }
        return false;
    }

    /**
     * Get image URL
     */
    public static function getImageUrl(string $imagePath): string
    {
        if (empty($imagePath)) {
            return '';
        }
        
        if (str_starts_with($imagePath, 'http')) {
            return $imagePath;
        }
        
        return asset($imagePath);
    }
}
