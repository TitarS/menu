<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index() {
        $nodes = Category::get()->toTree()->sortBy('sort');
        $categories = $this->buildTree($nodes);

        return view('categories', compact('categories'));
    }

    public function buildTree($categories)
    {
        $tree = '';
        foreach ($categories as $category) {
            if(count($category->children)) {
                $tree .='<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $category->title .'<b class="caret"></b></a>
                    <ul class="dropdown-menu">';
                $tree .= $this->buildTree($category->children->sortBy('sort'));
                $tree .= '</ul></li>';
            }
            else {
                $tree .='<li><a href="#">'.  $category->title . '</a></li>';
            }
        }

        return $tree;
    }

    public function childTree($categories)
    {
        $tree = '';
        foreach ($categories as $category) {
            if(count($category->children)) {
                $tree .='<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $category->title .'<b class="caret"></b></a>
                    <ul class="dropdown-menu kyky">';
                $tree .= $this->childTree($category->children);
                $tree .= '</ul></li>';
            }
            else {
                $tree .= '<li><a href="#">'. $category->title .'</a></li>';
            }
        }

        return $tree;
    }
}
