<?php

class User extends Model
{
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);
        $row = $this->db->single();

       if($this->db->rowCount() > 0)
            return true;
        return false;
    }
}