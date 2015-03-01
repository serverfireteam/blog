<?php namespace Serverfireteam\blog;

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /blog
	 *
	 * @return Response
	 */
	public function getIndex()
	{
            $mostRecommended = Blog::mostRecommended();
            $last            = Blog::lastPosts();
            //echo'<pre>';
            //dd($mostRecommended);
            return View::make('blog.index',array('title'=>"Wellcome ",'mostRecommended'=>$mostRecommended,'last'=>$last));
	}

    public static function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
	/**
	 * Display the specified resource.
	 * GET /blog/{id}/title
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getPost($id)
	{
            $post = Blog::find($id);
            if($post == NULL){
                App::abort(404);
            }
            return View::make('blog.post',array('title'=>$post['title'],'post'=>$post));
	}
        
    /**
     * Add the point to  
     * 
     * 
     */ 
    public function getShare($id,$social)
    {
        $url = '';
        $post = Blog::find($id);
        if($post == NULL){
            App::abort(404);
        }
        // add social point 
        $post->socialPoint ++;
        $post->save();
        switch ($social){
            case 'twitter' :
                $url  = 'https://twitter.com/home?status=';
                $url .= $post['title'] . ' ' . $post->getUrl();
            break;
            case 'facebook' :
                $url  = 'https://www.facebook.com/sharer/sharer.php?u=';
                $url .=  $post->getUrl();
            break;
            case 'googlePlus' :
                $url  = 'https://plus.google.com/share?url=';
                $url .= $post->getUrl();
            break;
            case 'linkedIn' :
                $url  = 'https://www.linkedin.com/shareArticle?mini=true&';
                $url .= 'url='.$post->getUrl().'&title='.$post['title'].'&summary=&source=';
            break;          
        }
        return Redirect::to($url);
    }



}