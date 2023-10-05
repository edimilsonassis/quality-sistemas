<?php

namespace App\Utils;

class PeoplesUtils
{
    /**
     * Uploads a profile picture to the APP/PUBLIC storage
     *
     * @param  mixed $fileName The name of the file to be uploaded
     * @return string
     */
    public static function uploadProfilePicture(string $fileName, float $maxKbFileSize = 200): ?string
    {
        if (!request()->hasFile($fileName))
            return null;

        return '/' . request()->file($fileName)->store('public');
    }
}
