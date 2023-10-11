<?php

namespace app\controllers;

use tryu\phpmvc\Application;
use tryu\phpmvc\Controller;
use tryu\phpmvc\Request;
use tryu\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Ryusei"
        ];

        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', ['model' => $contact]);
    }

    public function handleContent(Request $request)
    {
         $body = $request->getBody();
        return 'handling submitted data';
    }
}