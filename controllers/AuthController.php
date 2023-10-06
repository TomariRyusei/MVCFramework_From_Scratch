<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');

        return $this->render('login');
    }

    public function register(Request $request)
    {
        $userModel = new User();

        if($request->isPost()){
            $userModel->loadData($request->getBody());

            if($userModel->validate() && $userModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
            }
            
            return $this->render('register', ['model' => $userModel]);
        }
        
        $this->setLayout('auth');

        return $this->render('register', ['model' => $userModel]);
    }
}