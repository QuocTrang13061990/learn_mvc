<?php

class ProductModel extends Model {
    function list(){
        $list = [
            [
                'id' => 1,
                'name' => 'san pham 1'
            ],
            [
                'id' => 2,
                'name' => 'san pham 2'
            ]
        ];
        return $list;
    }

    function deleteOption(){
        $where = [
            'id' => 5,
        ];
        return $this->delete('options', $where);
    }

    function getAllOption(){
        $listAllblogs = $this->getRaw("SELECT blogs.id, blogs.title, blogs.create_at, blogs.view_count, category_id, blog_categories.name as blog_categories_name, users.id as user_id, users.fullname FROM blogs INNER JOIN blog_categories ON blog_categories.id = blogs.category_id INNER JOIN users ON users.id = blogs.user_id");
        return $listAllblogs;
    }
}
?>