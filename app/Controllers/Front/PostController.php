<?php
namespace App\Controllers\Front;
use App\Models\Post;
use App\Core\Controller;

class PostController extends Controller{
    private $post;

    public function __construct(){
        parent::__construct();
        $this->post = new Post();
    }

    public function posts(){
        $allPosts=$this->post->getAllPosts();
        $this->render('posts',['posts'=>$allPosts]);
    }

}