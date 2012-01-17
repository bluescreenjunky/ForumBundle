<?php

namespace Nico\ForumBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nico\ForumBundle\Form\ForumType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nico\ProfileBundle\NicoProfileBundle;


/**
 * @Route("/forum")
 */
class ForumController extends Controller
{
    /**
     * @Route("/show/{id}", name="forum_show", defaults={"id" = "0"})
     * @Template()
     */
    public function showAction($id)
    {
        $forum = $this->getDoctrine()
            ->getRepository('NicoForumBundle:Forum')
            ->find($id);

        return array('forum' => $forum);
    }

    /**
     * @Route("/new", name="forum_new")
     * @Template()
     */
    public function newAction()
    {
        $message='Merci de compléter le formulaire suivant pour ajouter un forum.';
        $forum = new \Nico\ForumBundle\Entity\Forum();
        $form = $this->createForm(new ForumType(), $forum);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if ($form->isValid())
            {
                $em = $this->container->get('doctrine')->getEntityManager();
                $em->persist($forum);
                $em->flush();
                $message='Forum ajouté avec (plus ou moins de) succès !';
            }
        }

        return $this->render('NicoForumBundle:Forum:new.html.twig', array(
            'form' => $form->createView(),
            'message' => $message,
        ));

    }

}