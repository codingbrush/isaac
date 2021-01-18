<?php 

namespace Isaac\App\Controllers;

class ErrorStatusController {
    public function notFound(){
        return view('errors/404');
    }
}