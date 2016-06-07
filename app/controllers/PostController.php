<?php

class PostController extends BaseController {
    public function showPost($id){
        if(Auth::check()){
            return View::make('main.home', array(
                'postContent' => Posts::find($id)->first()
            ));
        }

    }

}
