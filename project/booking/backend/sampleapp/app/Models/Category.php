<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable = ['name'];

    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllCategories()
    {
        return self::all();
    }

    /**
     * Get a category by ID.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getCategoryById($categoryId)
    {
        return self::findOrFail($categoryId);
    }

    /**
     * Create a new category.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createCategory($data)
    {
        return self::create($data);
    }

    /**
     * Update a category.
     *
     * @param  int  $categoryId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateCategory($categoryId, $data)
    {
        $category = self::findOrFail($categoryId);
        $category->update($data);

        return $category;
    }

    /**
     * Delete a category.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteCategory($categoryId)
    {
        $category = self::findOrFail($categoryId);
        $category->delete();

        return $category;
    }
}
