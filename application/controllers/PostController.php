<?php

class PostController extends CI_Controller{

    public function Index(){
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('instaaplikasi');
        $this->load->view('footer');
    }
    
    // Create current user's new post.
    public function AddPost(){
      if($this->session->userdata('username') != ''){
        $posttitle = $this->input->post('title');
        $postcontent = $this->input->post('newpost');
        $this->load->model('Posts','po');
        $createPost = $this->po->createUserPost($posttitle,$postcontent);
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/Enter');
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }    
    }
    
    // Read posts of all the users.
    public function ReadPosts(){
      if($this->session->userdata('username') != ''){
        $this->load->model('Posts','po');
        $postFound = $this->po->getUserPosts();
        
        $bagOfValues = array(
            'postFound'=> $postFound
          );
        $this->load->view('userdashboard', $bagOfValues);
      } else {
        $this->load->helper('url');
        redirect(base_url().'index.php/UserController/LoginButton');
      }  
    }
}
?>