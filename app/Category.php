<?php

namespace App;

use App\Services\SortService;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = ['title', 'parent_id'];

    public static function getNested()
    {
        $categories = Category::all()->toArray();
        $array = SortService::getNested($categories);

        return $array;
    }

    public static function saveOrder($categories)
    {
        if (count($categories))
        {
            foreach($categories as $order => $category)
            {
                $data = [
                    'parent_id' => (int) $category['parent_id'],
                    'sort' => $order,
                    'depth' => $order,
                    '_lft'=>$category['left'],
                    '_rgt'=>$category['right'],
                ];
                Category::where('id', $category['id'])
                    -> update($data);
            }
        }
    }

    public function getParentId()
    {
        return $this->parent != null ? $this->parent->id : 'not';
    }

}
