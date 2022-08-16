<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        // This is gonna give us an array of objects
        // $this->db->query('SELECT * FROM users'); // --> the code below is used in order to join users table with posts table, to get the author name
        $this->db->query('SELECT *,
                        posts.id as postId, /* -as- is called allias. for example postId is an allias for posts.id and we use postId in our view */
                        users.id as userId, 
                        posts.created_at as postCreated, /* so we can get the post created time and not confuse with user created time */
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');

        $results = $this->db->resultSet(); // resultSet() will return more than one row
        return $results;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
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
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
