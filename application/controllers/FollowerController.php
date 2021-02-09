<?php

class FollowerController extends CI_Controller{

    public function Index(){
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('instaaplikasi');
        $this->load->view('footer');
    }

    // Show followers of the current user.
    public function ShowFollowers(){
        if($this->session->userdata('username') != ''){
          $userid = $this->session->userdata('userid');
          $this->load->model('Followers','fo');
          $this->load->model('Users','us');
          $showfollowers = $this->fo->showfollowers($userid);
          $whoUserFollows = $this->fo->whoUserFollows($userid);
          $fetchAllUsers = $this->us->fetchallUser();

          $bagOfValues = array(
            'fetchAllUsers' => $fetchAllUsers,
            'showfollowers' => $showfollowers,
            'whoUserFollows' => $whoUserFollows
          );
          $this->load->helper('url');
          $this->load->view('followers', $bagOfValues);
        } else {
          $this->load->helper('url');
          redirect(base_url().'index.php/UserController/LoginButton');
        }      
    }
    
    // Show who curennt user follows.
    public function ShowFollowing(){
        if($this->session->userdata('username') != ''){
          $userid = $this->session->userdata('userid');
          $this->load->model('Followers','fo');
          $this->load->model('Users','us');
          $showfollowing = $this->fo->showFollowing($userid);
          $whoUserFollows = $this->fo->whoUserFollows($userid);
          $showfollowers = $this->fo->showfollowers($userid);
          $fetchAllUsers = $this->us->fetchallUser();

          $bagOfValues = array(
            'fetchAllUsers' => $fetchAllUsers,
            'showfollowing' => $showfollowing,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers
          );
          $this->load->helper('url');
          $this->load->view('following', $bagOfValues);
        } else {
          $this->load->helper('url');
          redirect(base_url().'index.php/UserController/LoginButton');
        }      
    } 

    // Follow a user from their public profile.
    public function FollowUserPublicProfile(){
      if($this->session->userdata('username') != ''){
        $followerid = $this->input->get('followerid');
        $followername = $this->input->get('followername');
        $userid = $this->session->userdata('userid'); 
        $username = $this->session->userdata('username');
        $this->load->model('Users','us');
        $this->load->model('Posts','po');
        $this->load->model('Followers','fo');
        $whoUserFollows = $this->fo->whoUserFollows($userid);

        if (in_array($followerid, $whoUserFollows)){
          $publicprofile = $this->us->showPublicProfile($followername);
          $publicprofileposts = $this->po->publicprofileposts($followername);
          $showfollowers = $this->fo->showfollowers($userid);
          $isUserFriend = $this->fo->isUserFriend($userid);

          $bagOfValues = array(
            'publicprofile' => $publicprofile,
            'publicprofileposts' => $publicprofileposts,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers,
            'isUserFriend' => $isUserFriend
          );      
          $this->load->helper('url');
          $this->load->view('publicprofile',$bagOfValues);
        } else {
          $followUser = $this->fo->followUser($userid, $followerid, $username, $followername);
          $publicprofile = $this->us->showPublicProfile($followername);
          $publicprofileposts = $this->po->publicprofileposts($followername);
          $showfollowers = $this->fo->showfollowers($userid);
          $isUserFriend = $this->fo->isUserFriend($userid);
          $whoUserFollows = $this->fo->whoUserFollows($userid);

          $bagOfValues = array(
            'publicprofile' => $publicprofile,
            'publicprofileposts' => $publicprofileposts,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers,
            'isUserFriend' => $isUserFriend
          );      
          $this->load->helper('url');
          $this->load->view('publicprofile',$bagOfValues);
        } 
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    }

    // Unfollow a user from their public profile.
    public function UnfollowUserPublic(){
      if($this->session->userdata('username') != ''){
        $followerid = $this->input->get('followerid');
        $followername = $this->input->get('followername');
        $userid = $this->session->userdata('userid'); 
        $username = $this->session->userdata('username');

        $this->load->model('Followers','fo');
        $this->load->model('Users','us');
        $this->load->model('Posts','po');
        $unfollowUser = $this->fo->unfollowUser($userid, $followerid, $username, $followername);
        $publicprofile = $this->us->showPublicProfile($followername);
        $publicprofileposts = $this->po->publicprofileposts($followername);
        $whoUserFollows = $this->fo->whoUserFollows($userid);
        $showfollowers = $this->fo->showfollowers($userid);
        $isUserFriend = $this->fo->isUserFriend($userid);

        $bagOfValues = array(
          'publicprofile' => $publicprofile,
          'publicprofileposts' => $publicprofileposts,
          'whoUserFollows' => $whoUserFollows,
          'showfollowers' => $showfollowers,
          'isUserFriend' => $isUserFriend
        );      
        $this->load->helper('url');
        $this->load->view('publicprofile',$bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    } 

    // Unfollow a user from genre search results page.
    public function UnfollowUser(){
      if($this->session->userdata('username') != ''){
        $followerid = $this->input->get('followerid');
        $followername = $this->input->get('followername');
        $userid = $this->session->userdata('userid'); 
        $username = $this->session->userdata('username');
        $searchgenre = $this->input->get('searchgenre'); 

        $this->load->model('Followers','fo');
        $this->load->model('Users','us');
        $unfollowUser = $this->fo->unfollowUser($userid, $followerid, $username, $followername);
        $searchGenre = $this->us->searchGenre($searchgenre);
        $whoUserFollows = $this->fo->whoUserFollows($userid);
        $showfollowers = $this->fo->showfollowers($userid);
        $isUserFriend = $this->fo->isUserFriend($userid);

        $bagOfValues = array(
          'searchGenre'=> $searchGenre,
          'whoUserFollows' => $whoUserFollows,
          'showfollowers' => $showfollowers,
          'isUserFriend' => $isUserFriend
        );      
        $bagOfValues['searchedGenre'] = $searchgenre;
        $this->load->helper('url');
        $this->load->view('genresearchresults',$bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    } 

    // Follow a user from genre search results page.
    public function FollowUser(){
      if($this->session->userdata('username') != ''){
        $followerid = $this->input->get('followerid');
        $followername = $this->input->get('followername');
        $userid = $this->session->userdata('userid'); 
        $username = $this->session->userdata('username');
        $searchgenre = $this->input->get('searchgenre'); 

        $this->load->model('Followers','fo');        
        $this->load->model('Users','us');        
        $whoUserFollows = $this->fo->whoUserFollows($userid);
        if (!in_array($followerid, $whoUserFollows)){
         $followUser = $this->fo->followUser($userid, $followerid, $username, $followername);
        }
          $whoUserFollows = $this->fo->whoUserFollows($userid);
          $searchGenre = $this->us->searchGenre($searchgenre);
          $showfollowers = $this->fo->showfollowers($userid);
          $isUserFriend = $this->fo->isUserFriend($userid);

          $bagOfValues = array(
            'searchGenre'=> $searchGenre,
            'whoUserFollows' => $whoUserFollows,
            'showfollowers' => $showfollowers,
            'isUserFriend' => $isUserFriend
          );      
          $bagOfValues['searchedGenre'] = $searchgenre;
          $this->load->helper('url');
          $this->load->view('genresearchresults',$bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }
    }
}
?>