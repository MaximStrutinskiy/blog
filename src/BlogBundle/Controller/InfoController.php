<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{

    public function contactAction()
    {
        return $this->render('BlogBundle:Page:contact.html.twig');
    }

    public function infoAction()
    {
        return $this->render('BlogBundle:Page:info.html.twig');
    }
}