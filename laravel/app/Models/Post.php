<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    use HasFactory;
    
    
    public static function deletePostById($id)
    {
        $post = self::find($id);
        
        if ($post) {
            return $post->delete();
        }
        
        return false;
    }
}