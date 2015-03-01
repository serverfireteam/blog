<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author alireza
 */
class Blog extends Eloquent {
    //put your code here
    protected  $table = 'blog';
    
    // return url of blog post 
    function getUrl(){
        return Config::get('app.url') .'/blog/post/'. $this->id . '/' . BlogController::seoUrl($this->title);
    }
    
    public static  function mostRecommended(){
        return  Blog::orderBy('socialPoint','desc')->where('public', 1)->take(1)->get()->first();
    }
    public function nextPost(){
        // get next post
        return Blog::where('id', '>', $this->id)->where('public', 1)->orderBy('id','asc')->take(1)->get()->first();
    }
    public  function previousPost(){
        // get previous  post 
        return Blog::where('id', '<', $this->id)->where('public', 1)->orderBy('id','desc')->take(1)->get()->first();
    }
    
    public static  function lastPosts(){
        return Blog::orderBy('created_at','desc')->where('public', 1)->get();
    }
}
