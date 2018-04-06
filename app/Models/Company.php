<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use CrudTrait;
    public $table = 'companies';

    public $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function getLogoAttribute($value)
    {
        $result = $this->fromJson($value);
        if (is_array($result)) {
            return array_map(function($url) {
                $url = '/' . ltrim($url, '/');
                return $url;
            }, $this->fromJson($value));
        }
        return [];
    }

    /**
     * @description I think we can allow for upload different logo images. Why do i use json? You will see in migration
     * @param $value
     */
    public function setLogoAttribute($value)
    {
        $attribute_name = 'logo';
        $disk = 'local';
        $destination_path = 'public';

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path); // <- i'm like multiple ;-)
        // to avoid object instead of array
        $files = json_decode($this->attributes[$attribute_name], true);
        $this->attributes[$attribute_name] = json_encode(array_values($files));
    }
    
}
