<?php

class Post extends Model
{
    public function postList()
    {
        $this->db->query('SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id');
        $result = $this->db->resultSet();
        return $result;

    }

    public function savePost(array $data)
    {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
        $this->db->bind(":title", $data['title']);
        $this->db->bind(":body", $data['body']);
        $this->db->bind(":user_id", $data['user_id']);
        if($this->db->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function showPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

    // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }
}