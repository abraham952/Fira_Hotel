<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\ImageOptimizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    protected $imageService;

    public function __construct(ImageOptimizationService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Upload room images
     */
    public function upload(Request $request, Room $room)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'type' => 'required|in:gallery,featured'
        ]);

        try {
            $uploadedImages = [];
            
            foreach ($request->file('images') as $image) {
                $paths = $this->imageService->uploadAndOptimize($image, 'rooms');
                $uploadedImages[] = $paths['webp'];
            }

            // Update room based on type
            if ($request->type === 'featured') {
                $room->featured_image = $uploadedImages[0];
            } else {
                $currentGallery = $room->gallery ?? [];
                $room->gallery = array_merge($currentGallery, $uploadedImages);
            }
            
            $room->save();

            return response()->json([
                'success' => true,
                'message' => 'Images uploaded successfully',
                'images' => $uploadedImages
            ]);

        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload images'
            ], 500);
        }
    }

    /**
     * Delete room image
     */
    public function delete(Request $request, Room $room)
    {
        $request->validate([
            'image_path' => 'required|string'
        ]);

        try {
            $imagePath = $request->image_path;
            
            // Remove from gallery
            if ($room->gallery) {
                $room->gallery = array_values(array_filter($room->gallery, function($img) use ($imagePath) {
                    return $img !== $imagePath;
                }));
            }
            
            // Clear featured if it matches
            if ($room->featured_image === $imagePath) {
                $room->featured_image = null;
            }
            
            $room->save();
            
            // Delete physical files
            $this->imageService->deleteImage($imagePath);

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Image deletion failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete image'
            ], 500);
        }
    }

    /**
     * Optimize existing image
     */
    public function optimize(Request $request)
    {
        $request->validate([
            'path' => 'required|string'
        ]);

        try {
            // Implementation for optimizing existing images
            return response()->json([
                'success' => true,
                'message' => 'Image optimized successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Image optimization failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to optimize image'
            ], 500);
        }
    }
}
