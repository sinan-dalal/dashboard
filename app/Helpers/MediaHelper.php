<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class MediaHelper
{
    /**
     * @param             $file [ image]
     * @param string $path
     * @param string|null $old_image [image path] [delete old image if exist]
     * @param false $with_original_name if want to save image with its original data
     * @return string [image full path after being moved]
     */
    public static function uploadFile(
        $file,
        string $path,
        string $old_image = null,
        bool $with_original_name = false
    ): string
    {
        if (!is_null($old_image)) {
            self::deleteFile($old_image);
        }

        if ($with_original_name) {
            return Storage::putFileAs($path, $file, $file->getClientOriginalName());
        }

        return $file->store('public/' . $path);
    }

    public static function moveFile(string $old_path, string $new_path): bool
    {
        return Storage::move($old_path, 'public/' . $new_path);
    }

    /**
     * [deleteImage description]
     * @param  [string] $file [image path to be deleted]
     */
    public static function deleteFile($file): void
    {
        if (Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * get image full path
     */
    public static function getFile($file): ?string
    {
        return !is_null($file) ? \Storage::url($file) : null;
    }
}
