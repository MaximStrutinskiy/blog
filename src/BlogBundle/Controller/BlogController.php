<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

    public function homeAction()
    {
        return $this->render('BlogBundle:Page/_blog:blog.html.twig');
    }
}
