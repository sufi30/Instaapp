<?php

class Followers extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Returns object of followers of the user.
    function showFollowers($userid){
        $res = $this->db->get_where("following", array('follower_id' => $userid));
        $followerFound = array();
        foreach($res->result() as $row){
                $followerFound[] = new Follower($row->user_id,$row->follower_id,$row->user_name,$row->follower_name);
        }
        return $followerFound;
    }

    // Returns object of who user follows.
    function showFollowing($userid){
        $res = $this->db->get_where("following", array('user_id' => $userid));
        $followerFound = array();
        foreach($res->result() as $row){
                $followerFound[] = new Follower($row->user_id,$row->follower_id,$row->user_name,$row->follower_name);
        }
        return $followerFound;
    }

    // Unfollow a user.
    function unfollowUser($userid, $followerid, $username, $followername){
        $this->db->delete('following', 
            array(
                'user_id' => $userid,
                'follower_id' => $followerid
            )
        );     
    }

    // Follow a user.
    function followUser($userid, $followerid, $username, $followername){
        $data = array (
            'user_id' => $userid,
            'follower_id' => $followerid,
            'user_name' => $username,
            'follower_name' => $followername
        );
        $res = $this->db->insert('following',$data);
    }

    // Returns an array of who user follows.
    function whoUserFollows($userid){
        $this->db->distinct();
        $this->db->select('follower_id');
        $this->db->where('user_id', $userid); 
        $query = $this->db->get('following');
        $followersFound = array();

        foreach($query->result() as $data){
            array_push($followersFound, $data->follower_id);
        }
        return $followersFound;
    }

    // Returns an array of user's friends.
    function isUserFriend($userid){
        $this->db->distinct();
        $this->db->select('user_id');
        $this->db->where('follower_id', $userid); 
        $query = $this->db->get('following');
        $friendfound = array();

        foreach($query->result() as $data){
            array_push($friendfound, $data->user_id);
        }
        return $friendfound;
    }
      
}

// Follower class
class Follower {
    public $user_id;
    public $follower_id;
    public $user_name;
    public $follower_name;

    function __construct($y,$e,$t,$k) {
        $this->user_id = $y;
        $this->follower_id = $e;
        $this->user_name = $t;
        $this->follower_name = $k;
    }

    function getUserId() { 
        return $this->user_id; 
    }

    function getFollowerId() { 
        return $this->follower_id; 
    }

    function getUserName() { 
        return $this->user_name; 
    }

    function getFollowerName() { 
        return $this->follower_name; 
    }
}
?>
