<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //check is the category is child category of that parent category
//open category
    public function ParentOrNotCategory($parent_id, $child_id)
    {
        $categories = Category::where('id', $child_id)->where('id', $parent_id)->get();
        if (!is_null($categories)) {
            return true;
        } else {
            return false;
        }
    }
}
