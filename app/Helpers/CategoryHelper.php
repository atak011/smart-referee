<?php

namespace App\Helpers;

use App\Models\Category;

class CategoryHelper
{
    public static function getParentsTree($category,$name)
    {

        if ($category->parent_id == null)
        {
            return $name;
        }
        $parent = Category::find($category->parent_id);
        $name = $parent->details[0]->name . ' > ' . $name;

        return self::getParentsTree($parent, $name);
    }
}
