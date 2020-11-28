<?php

class Post extends Model
{
    public function postList()
    {
        $this->db->query('SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id');
        $result = $this->db->resultSet();
        return $result;

    }
}