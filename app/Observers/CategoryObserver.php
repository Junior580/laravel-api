<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{

    public function deleting(Category $category): void
    {
        $category->products()->update(['category_id' => null]);
    }
}
