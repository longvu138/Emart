<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'photo',
        'status',
        'is_parent',
        'parent_id'
    ];

    // xoá cha thay đổi trạng thái của con về 1
    public static function shiftChild($cate_id)
    {
        return Category::whereIn('id', $cate_id)->update(['is_parent'=> 1]);
    }
}