<?php

class UserController extends CI_Controller{

    public function Index(){
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('instaaplikasi');
        $this->load->view('footer');
    }

    // Authenticate and login current user.
    public function LoginUser(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if( $this->form_validation->run() ){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('Users','us');
        $listusers = $this->us->loginUser($username,$password); 

        if (count($listusers) > 0) {
            $counter = 1;
            foreach ($listusers as $m) {
                $email = $m->getUserEmail();
                $avatar = $m->getUserAvatar();
                $fullname = $m->getUserFullname();
                $genres = $m->getGenre();
                $userid = $m->getId();
                $counter++;
            }
        }
        else {
            
        }

          if($this->us->canLogin($username,$password)){
            $session_data = array(
              'username' => $username,
              'email' => $email,
              'avatar' => $avatar,
              'fullname' => $fullname,
              'genres' => $genres,
              'userid' => $userid
            );
              $this->session->set_userdata($session_data);
              if($avatar != ''){    
                 $this->load->helper('url');
                 redirect(base_url().'index.php/UserController/Enter');
              } else {
                  $this->load->helper('url');
                  $this->load->view('header');
                  $this->load->view('createprofile');
                  $this->load->view('footer');
              }
          } else {
            $this->session->set_flashdata('error','Invalid Username or Password !');
            $this->load->helper('url');
            redirect(base_url().'index.php/UserController/LoginButton');

          }
      } else {
          $this->LoginButton();
      }
    }  

    // Enter into dashboard of the user once logged in.
    public function Enter(){
      if($this->session->userdata('username') != ''){
        $this->load->helper('url');
        $userid = $this->session->userdata('userid');
        $this->load->model('Followers','fo');
        $this->load->model('Posts','po');
        $postFound = $this->po->getUserPosts();
        $showfollowers = $this->fo->showfollowers($userid);
        $whoUserFollows = $this->fo->whoUserFollows($userid);

        $bagOfValues = array(
            'postFound'=> $postFound,
            'showfollowers' => $showfollowers,
            'whoUserFollows' => $whoUserFollows
        );
        $this->load->view('userdashboard', $bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    }
    #User
    public function Logout(){
        $this->session->unset_userdata('username');
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
    }
    #User
    public function SigninUser(){
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $confirmpassword = $this->input->post('passwordConfirm');

      $this->load->model('Users','us');
      $usernamecheck = $this->us->usernamecheck($username);
      $emailcheck = $this->us->emailcheck($email);
      
      if ($usernamecheck){
         $this->session->set_flashdata('errorusername','Username already taken please try another!');
         $this->load->helper('url');
         redirect(base_url().'index.php/UserController/SignInButton');
      } else {
        if(strlen($username) <= '10'){
         $this->session->set_flashdata('errorusername','Username should contain only 10 characters!');
         $this->load->helper('url');
         redirect(base_url().'index.php/UserController/SignInButton');
        } else {
          if($emailcheck){
            $this->session->set_flashdata('erroremail','Email already used please try another!');
            $this->load->helper('url');
            redirect(base_url().'index.php/UserController/SignInButton');
          } else {            
            if($password != $confirmpassword){
              $this->session->set_flashdata('errorpassword','Your password and confirm Password does not match !');
              $this->load->helper('url');
              redirect(base_url().'index.php/UserController/SignInButton');
            } else {
              if (strlen($password) <= '10') {
                $this->session->set_flashdata('errorpassword','Your password must contain at least 10 characters !');
                $this->load->helper('url');
                redirect(base_url().'index.php/UserController/SignInButton');
              }else{
                if (!preg_match("#[0-9]+#",$password)) {
                    $this->session->set_flashdata('errorpassword','Your password must contain at least 1 number !');
                    $this->load->helper('url');
                    redirect(base_url().'index.php/UserController/SignInButton');
                } else {
                  if (!preg_match("#[A-Z]+#",$password)) {
                    $this->session->set_flashdata('errorpassword','Your password must contain at least 1 capital letter!');
                    $this->load->helper('url');
                    redirect(base_url().'index.php/UserController/SignInButton');
                  } else{
                    if (!preg_match("#[a-z]+#",$password)) {
                      $this->session->set_flashdata('errorpassword','Your password must contain at least 1 lowercase letter!');
                      $this->load->helper('url');
                      redirect(base_url().'index.php/UserController/SignInButton');
                    }else{
                      $this->session->set_flashdata('successlogin','You registered successfully please login now');
                      $password_hash = $this->us->better_crypt($password);
                      $addUser = $this->us->signInUser($username,$email,$password_hash);
                      $this->load->helper('url');
                      $this->load->view('header');
                      $this->load->view('login');
                      $this->load->view('footer');
                    }
                  }  
                }
              }
            }
          }            
        }  
      } 
    }

    // Create profile for registered user.
    public function CreateProfile(){
      $username = $this->session->userdata('username');

      if($username != ''){
        $this->load->model('Users','us');
        $listusers = $this->us->showPublicProfile($username); 

          if (count($listusers) > 0) {
              $counter = 1;
              foreach ($listusers as $m) {
                  $email = $m->getUserEmail();
                  $avatar = $m->getUserAvatar();
                  $fullname = $m->getUserFullname();
                  $genres = $m->getGenre();
                  $userid = $m->getId();
                  $counter++;
              }
          }
          else {
              // echo "No users found";
          }

          if($avatar != ''){    
                    $this->load->helper('url');
                    redirect(base_url().'index.php/UserController/Enter');
          } else {
                    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];  
                    $fullname = $this->input->post('fullname');
                    $genres = $this->input->post('genres[]');
                    $check_array = implode(',',$genres);
                    $profileImageSize = $_FILES['profileImage']['size'];
                    $profileImageTmp = $_FILES["profileImage"]["tmp_name"];

                    $this->load->model('Users','us');
                    $createUserProfile = $this->us->createUserProfile($profileImageName,$fullname,$check_array,$profileImageSize,$profileImageTmp);
                    $this->load->helper('url');
                    redirect(base_url().'index.php/UserController/Enter');
          }
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }   
    }

    // Update the current user's profile.
    public function UpdateProfile(){
      if($this->session->userdata('username') != ''){
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];  
        $fullname = $this->input->post('fullname');
        $genres = $this->input->post('genres[]');
        $check_array = implode(',',$genres);      
        $email = $this->input->post('email');
        $profileImageSize = $_FILES['profileImage']['size'];
        $profileImageTmp = $_FILES["profileImage"]["tmp_name"];

        $this->load->model('Users','us');
        $createUserProfile = $this->us->updateUserProfile($profileImageName,$fullname,$check_array,$profileImageSize,$profileImageTmp,$email);
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/Enter');
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }

    }
    
     // Edit option for the current user to update profile information.
    public function ShowEditProfile(){
      if($this->session->userdata('username') != ''){
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('updateprofile');
        $this->load->view('footer');
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    } 

    // Show the public profile of the selected user.
    public function ShowPublicProfile(){
      if($this->session->userdata('username') != ''){
        if( $this->input->get('username')){
            $username = $this->input->get('username');
            $currentusername = $this->session->userdata('username');
            $currentuserid = $this->session->userdata('userid');       
            $userid = $this->input->get('followerid');
            $this->load->model('Users','us');
            $this->load->model('Posts','po');
            $this->load->model('Followers','fo');

            $publicprofile = $this->us->showPublicProfile($username);
            $publicprofileposts = $this->po->publicprofileposts($username);
            $whoUserFollows = $this->fo->whoUserFollows($currentuserid);
            $showfollowers = $this->fo->showfollowers($currentuserid);
            $isUserFriend = $this->fo->isUserFriend($currentuserid);

            $bagOfValues = array(
                'publicprofile' => $publicprofile,
                'publicprofileposts' => $publicprofileposts,
                'whoUserFollows' => $whoUserFollows,
                'showfollowers' => $showfollowers,
                'isUserFriend' => $isUserFriend
              );
            $this->load->helper('url');
            $this->load->view('publicprofile', $bagOfValues);
        } else {
          $currentuserid = $this->session->userdata('userid');       
          $username = $this->session->userdata('username');       
          $userid = $this->input->get('followerid'); 

          $this->load->model('Users','us');
          $this->load->model('Posts','po');
          $this->load->model('Followers','fo');
          $whoUserFollows = $this->fo->whoUserFollows($currentuserid); 
          $showfollowers = $this->fo->showfollowers($currentuserid);
          $isUserFriend = $this->fo->isUserFriend($currentuserid);
          $publicprofile = $this->us->showPublicProfile($username);
          $publicprofileposts = $this->po->publicprofileposts($username);


          $bagOfValues = array(
            'publicprofile' => $publicprofile,
            'publicprofileposts' => $publicprofileposts,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers,
            'isUserFriend' => $isUserFriend
          );
          $this->load->helper('url');
          $this->load->view('publicprofile', $bagOfValues);
        }
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    }  

    // Search users by using a perticular genre. 
    public function SearchGenre(){
      if($this->session->userdata('username') != ''){
        $searchgenre = $this->input->post('search');
        $this->load->model('Users','us');
        $this->load->model('Followers','fo');
        $searchGenre = $this->us->searchGenre($searchgenre);
        $userid = $this->session->userdata('userid');
        $whoUserFollows = $this->fo->whoUserFollows($userid);
        $showfollowers = $this->fo->showfollowers($userid);
        $isUserFriend = $this->fo->isUserFriend($userid);

        $bagOfValues = array(
          'searchGenre'=> $searchGenre,
          'whoUserFollows' => $whoUserFollows,
          'showfollowers' => $showfollowers,
          'isUserFriend' => $isUserFriend
        );
        $this->load->helper('url');
        $bagOfValues['searchedGenre'] = $searchgenre;
        $this->load->view('genresearchresults', $bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }  
    }   

    // Show curennt user's dashboard.
    public function UserDashboardButton(){
      if($this->session->userdata('username') != ''){
        $addUserDashBoardButton = $this->input->get('userDashboardButton');
        $this->load->helper('url');
        $userid = $this->session->userdata('userid');
        $this->load->model('Posts','po');
        $this->load->model('Followers','fo');
        $postFound = $this->po->getUserPosts();
        $whoUserFollows = $this->fo->whoUserFollows($userid);
        $showfollowers = $this->fo->showfollowers($userid);

        $bagOfValues = array(
            'postFound' => $postFound,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers
          );
        $this->load->view('userdashboard', $bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/');
      }  
    }

    // Signin button to show register page. 
    public function SignInButton(){
      if($this->session->userdata('username') != ''){
        $loginButton = $this->input->get('loginButton');
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('alreadyloggedin');
        $this->load->view('footer');
      }  else {
        $signInButton = $this->input->get('signInButton');
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('signin', 'sg');
        $this->load->view('footer');
      }  
    }  

    // Login button to show login page.
    public function LoginButton(){
      if($this->session->userdata('username') != ''){
          $loginButton = $this->input->get('loginButton');
          $this->load->helper('url');
          $this->load->view('header');
          $this->load->view('alreadyloggedin');
          $this->load->view('footer');
      }  else {
        $loginButton = $this->input->get('loginButton');
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('login', 'lg');
        $this->load->view('footer');
      }
    }
}
?>