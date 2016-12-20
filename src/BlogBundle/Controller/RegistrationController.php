<?php

namespace BlogBundle\Controller;


use BlogBundle\Entity\User;
use BlogBundle\Forms\FOSUserBundle\FormRegistrationType;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends BaseController
{
    public function registerAction(Request $request)
    {

        $info = new User();
        $form = $this->createForm(FormRegistrationType::class, $info);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($info);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }


        return $this->render(
            'FOSUserBundle:Registration:register.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}