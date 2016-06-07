<?php

class ProfileController extends BaseController {
    public function showProfile()
    {
        if(Auth::check()){
            return View::make('main.home', array(
                'postContent' => Posts::find($id)->first()
            ));
        }
    }

    public function returnSesuatu(){
        $hasil = array();
        $apeaje1 = array(1,2,3,4,5,6,7,8,9,12,23,45,67,89);

        $apeaje2 = array('q','w','e','r');

        foreach($apeaje2 as $row){
            $hasil[$row] = $apeaje1;
        }

//        return json_encode($hasil);
//        print_r($hasil);
    }

}
