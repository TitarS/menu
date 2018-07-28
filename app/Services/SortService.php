<?php

namespace App\Services;

class SortService
{
    public static function getNested($items)
    {
        $items = self::buildTree($items);
        $items = self::sortByDepth($items);
        return $items;
    }

    public static function sortByDepth($array)
    {
        $items = array();
        foreach ($array as $key => $row)
        {
            $items[$key] = $row['depth'];
        }
        array_multisort($items, SORT_ASC, $array);

        return $array;
    }

    public static function buildTree(array $elements, $parentId = 0) {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    public static function getOl($array, $child = FALSE)
    {
        $str = '';

        if (count($array))
        {
            $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

            foreach($array as $item)
            {
                $str .= '<li id="list_' . $item['id'] . '">';
                $str .= '<div>' . $item['title'] . '</div>';

//Do we have any children?
                if (isset($item['children']) && count($item['children']))
                {
                    $str .= self::getOl($item['children'], TRUE);
                }
                $str .= '</li>' . PHP_EOL;
            }
            $str .= '</ol>' . PHP_EOL;
        }

        return $str;
    }

    public static function getCategoriesForSelectBox($array, $level = 0, $selected = ''){
# we have a numerically-indexed array. go through each item:
        foreach ($array as $item) {
# print out the item ID and the item name
            if ($selected == $item['title']){
                echo '<option selected value="' . $item['id'] . '">'
                    . str_repeat("—", $level)
                    . $item['title']
                    . '</option>'
                    . PHP_EOL;
            }
            else
            {
                echo '<option value="' . $item['id'] . '">'
                    . str_repeat("—", $level)
                    . $item['title']
                    . '</option>'
                    . PHP_EOL;
            }

# if item['children'] is set, we have a nested data structure, so
# call recurse on it.
            if (isset($item['children'])) {
# we have children: RECURSE!!
                self::getCategoriesForSelectBox( $item['children'], $level+1, $selected);
            }
        }
    }

}