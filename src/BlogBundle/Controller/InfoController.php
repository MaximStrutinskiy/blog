<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Info;
use BlogBundle\Forms\FormInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InfoController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Page/_page:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $info = new Info();
        $form = $this->createForm(FormInfo::class, $info);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($info);
            $em->flush();

            return $this->redirectToRoute('contact');
        }

        return $this->render(
            'BlogBundle:Page/_page:contact.html.twig',
            [
                'form_info' => $form->createView(),
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function infoAction()
    {
        return $this->render('BlogBundle:Page/_page:info.html.twig');
    }
}