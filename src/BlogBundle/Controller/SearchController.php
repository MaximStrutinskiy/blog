<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * Search page
     */
    public function searchAction()
    {
        return $this->render('BlogBundle:Page/_blog:search.html.twig');
    }

}
