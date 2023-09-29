<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Ryusei"
        ];

        return $this->render('home', $params);
    }

    public function content()
    {
        return $this->render('contact');
    }

    public function handleContent(Request $request)
    {
         $body = $request->getBody();
        return 'handling submitted data';
    }
}