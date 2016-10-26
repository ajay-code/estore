<?php
namespace App\Http\Traits;

use App\Category;

trait CategoryTrait {


    public function categoryAll() {
        // Get all the brands from the Brands Table.
        return Category::whereNull('parent_id')->with('children')->get();
    }


    /**
     * Return only the Parent Categories.
     * ( Used to populate Category drop-down )
     *
     * @return mixed
     */
    public function parentCategory() {
        return Category::whereNull('parent_id')->get();
    }

    public function getParentCategory($cat_id){
        $subCat = Category::where('id', $cat_id)->first();
        return $subCat->parent_id;
    }

    public function getSubCategories(){
        return Category::whereNotNull('parent_id')->get();
    }

}