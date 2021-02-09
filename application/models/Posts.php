<?php

class Posts extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    // Create a post from current user.
    function createUserPost($posttitle,$postcontent){
        $currentusername = $this->session->userdata('username');
        $currentuserid = $this->session->userdata('userid');
        $currentTimeinSeconds = time();
        $data = array (
            'title' => $posttitle,
            'content' => $postcontent,
            'user' => $currentusername,
            'userid' => $currentuserid,
            'timestamp' => $currentTimeinSeconds,
        );
        $res = $this->db->insert('user_posts',$data);
    }

    // Returns object of all posts order by descending timestamp.
    function getUserPosts(){
        $postFound = array();
        $this->db->order_by("timestamp", "DESC");
        $res = $this->db->get('user_posts');
        foreach($res->result() as $row){
            $postFound[] = new Post($row->id,$row->title,$row->content,$row->user,$row->userid,$row->timestamp);
        }

        return $postFound;
    }

    // Returns object of posts of the user order by descending timestamp.
    function publicprofileposts($username){
        $postFound = array();
        $this->db->order_by("timestamp", "DESC");
        $res = $this->db->get_where('user_posts', array('user' => $username));

        foreach($res->result() as $row){
            $postFound[] = new Post($row->id,$row->title,$row->content,$row->user,$row->userid,$row->timestamp);
        }

        return $postFound;
    }            
}

// Post class
class Post {
    public $id;
    public $title;
    public $content;
    public $user;
    public $userid;
    public $timestamp;

    function __construct($y,$p, $u, $a, $g, $x) {
        $this->id = $y;
        $this->title = $p;
        $this->content = $u;
        $this->user = $a;
        $this->userid = $g;
        $this->timestamp = $x;
    }

    function getId() { 
        return $this->id; 
    }

    function getTitle() { 
        return $this->title; 
    }

    function getContent() { 
        return $this->content; 
    }

    function getUser() { 
        return $this->user; 
    }

    function getUserId() { 
        return $this->userid; 
    }

    function getTimestamp() { 
        return $this->timestamp; 
    }
}
?>