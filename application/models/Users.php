<?php

class Users extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    // Returns true or false, if the user can login or not according to the given username and password.
    function canLogin($username, $password){
        $res = $this->db->get_where("businessUser", array('username' => $username));
        
        $userFound = array();
        foreach($res->result() as $row){
                $userFound[] = new User($row->id,$row->username,$row->email,$row->password,$row->profile_image,$row->fullname,$row->genres);
        }
        
        if (count($userFound) > 0) {
            $counter = 1;
            foreach ($userFound as $m) {
                $passwordhash = $m->getUserPassword();

                if(crypt($password, $passwordhash) == $passwordhash) {
                    // Password is correct
                    return true;
                } else {
                    return false;
                }
                $counter++;
            }
        }       
    }

    // Check if email is already used by any user.
    function emailcheck($email){
        $res = $this->db->get_where("businessUser", array('email' => $email));
        if ($res->num_rows() != NULL){
            return true;
        } else {
            return false;
        }
    }

    // Check if username is already used by any user.
    function usernamecheck($username) {
        $res = $this->db->get_where("businessUser", array('username' => $username));
        if ($res->num_rows() != NULL){
            return true;
        } else {
            return false;
        }
    }

    // Returns the user object of the current user who tries to login.
    function loginUser($username,$password){        
        $res = $this->db->get_where("businessUser", array('username' => $username));
        $userFound = array();
        foreach($res->result() as $row){
                $userFound[] = new User($row->id,$row->username,$row->email,$row->password,$row->profile_image,$row->fullname,$row->genres);
        }
        return $userFound;
    }

    // Returns object of a user to show their public profile. 
    function showPublicProfile($username){
        $res = $this->db->get_where("businessUser", array('username' => $username));
        $userFound = array();
        foreach($res->result() as $row){
        $userFound[] = new User($row->id,$row->username,$row->email,$row->password,$row->profile_image,$row->fullname,$row->genres);
        }
        return $userFound;
    }

    // Returns the converted hashed password of the user by adding salt using blowfish.
    function better_crypt($input, $rounds = 7){
        $salt = "";
        $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
        for($i=0; $i < 22; $i++) {
          $salt .= $salt_chars[array_rand($salt_chars)];
        }
        return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }

    // Register a new user in database.
    function signInUser($username,$email,$password_hash){
        $data = array (
            'username' => $username,
            'email' => $email,
            'password' => $password_hash,
            'profile_image' => '',
            'fullname' => '',
            'genres' => '',
        );
        $res = $this->db->insert('businessUser',$data);
    }

    // Returns all the users who registered in the database.
    function fetchallUser(){
        $res = $this->db->get('businessUser');
        $userFound = array();
        foreach($res->result() as $row){
        $userFound[] = new User($row->id,$row->username,$row->email,$row->password,$row->profile_image,$row->fullname,$row->genres);
        }

        return $userFound;
    }

    // Creating a new profile for the registered user. 
    function createUserProfile($profileImageName,$fullname,$check_array,$profileImageSize,$profileImageTmp){
      $msg = "";
      $msg_class = "";

      // For image upload
      $base = $this->config->base_url();
      $target_dir = 'assets/images/';
      $target_file = $target_dir . basename($profileImageName);

      // VALIDATION
      // validate image size. Size is calculated in Bytes
      if($profileImageSize > 200000) {
        $msg = "Image size should not be greated than 200Kb";
        $msg_class = "alert-danger";
      }

      // Check if file exists
      if(file_exists($target_file)) {
        $msg = "File already exists";
        $msg_class = "alert-danger";
      }

      // Upload image only if no errors
      if (empty($error)) {
        if(move_uploaded_file($profileImageTmp, $target_file)) {
            $currentusername = $this->session->userdata('username');

            $this->db->set('profile_image', $profileImageName);
            $this->db->set('fullname', $fullname);
            $this->db->set('genres', $check_array);
            $this->db->where('username', $currentusername);
            $this->db->update('businessUser'); 

            $session_data = array(
                  'avatar' => $profileImageName,
                  'fullname' => $fullname,
                  'genres' => $check_array
                );
            $this->session->set_userdata($session_data);

        } else {
          $error = "There was an error uploading the file";
          $msg = "alert-danger";
        }      
      }
    }

    // Update a user's profile when edit profile called. 
    function updateUserProfile($profileImageName,$fullname,$check_array,$profileImageSize,$profileImageTmp,$email){
      $msg = "";
      $msg_class = "";

      // For image upload
      $base = $this->config->base_url();
      $target_dir = 'assets/images/';
      $target_file = $target_dir . basename($profileImageName);

      // VALIDATION
      // validate image size. Size is calculated in Bytes
      if($profileImageSize > 200000) {
        $msg = "Image size should not be greated than 200Kb";
        $msg_class = "alert-danger";
      }

      // Check if file exists
      if(file_exists($target_file)) {
        $msg = "File already exists";
        $msg_class = "alert-danger";
      }

      // Upload image only if no errors
      if (empty($error)) {
        if(move_uploaded_file($profileImageTmp, $target_file)) {
            $currentusername = $this->session->userdata('username');

            $this->db->set('profile_image', $profileImageName);
            $this->db->set('fullname', $fullname);
            $this->db->set('genres', $check_array);
            $this->db->set('email', $email);
            $this->db->where('username', $currentusername);
            $this->db->update('businessUser'); 

            $session_data = array(
                  'avatar' => $profileImageName,
                  'fullname' => $fullname,
                  'genres' => $check_array,
                  'email' => $email
                );
            $this->session->set_userdata($session_data);

        } else {
          $error = "There was an error uploading the file";
          $msg = "alert-danger";
        }
      }
    }

    // Search users based on perticular genre.  
    function searchGenre($searchgenre){
        $genreFound = array();
        $conn = mysqli_connect('localhost','root','','soundcrave');
        $authres = mysqli_query($conn,'SELECT * from (select *, genres REGEXP REPLACE("'.$searchgenre.'", ",","(\\,|$)|") as haslists from businessUser B) A where A.haslists = 1') or die(mysqli_error($conn));

        while (($row = mysqli_fetch_array($authres,MYSQLI_ASSOC)) != NULL) {
        $genreFound[] = new User($row['id'],$row['username'],$row['email'],$row['password'],$row['profile_image'],$row['fullname'],$row['genres']);
        }
        return $genreFound;
    }
         
}

// User class.
class User {
    public $id;
    public $username;
    public $email;
    public $password;
    public $profile_image;
    public $fullname;
    public $genre;

    function __construct($y,$e,$p, $u, $a, $c, $t) {
        $this->id = $y;
        $this->username = $e;
        $this->email = $p;
        $this->password = $u;
        $this->profile_image = $a;
        $this->fullname = $c;
        $this->genre = $t;
    }

    function getId() { 
        return $this->id; 
    }

    function getUserName() { 
        return $this->username; 
    }

    function getUserEmail() { 
        return $this->email;
    }

    function getUserPassword() { 
        return $this->password;
    }

    function getUserAvatar() { 
        return $this->profile_image;
    }

    function getUserFullname() { 
        return $this->fullname;
    }

    function getGenre() { 
        return $this->genre;
    }
}
?>