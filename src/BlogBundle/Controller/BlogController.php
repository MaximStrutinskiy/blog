<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Page/_page:index.html.twig');
    }

    public function homeAction()
    {
        return $this->render('BlogBundle:Page/_blog:blog.html.twig');
    }
}
