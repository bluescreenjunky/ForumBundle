<?php

namespace Nico\ForumBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nico\ForumBundle\Form\ForumType;
use Nico\ForumBundle\Form\ThreadType;
use Nico\ForumBundle\Form\PostType;
use Nico\ForumBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nico\ProfileBundle\NicoProfileBundle;


/**
 * @Route("/thread")
 */
class ThreadController extends Controller
{
    /**
     * @Route("/show/{id}", name="thread_show", defaults={"id" = "0"})
     * @Template()
     */
    public function showAction($id)
    {
        $thread = $this->getDoctrine()
            ->getRepository('NicoForumBundle:Thread')
            ->find($id);

        return array('thread' => $thread);
    }

    /**
     * @Route("/new/{forum_id}", name="thread_new", defaults={"forum_id" = "0"})
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function newAction($forum_id)
    {
        $thread = new \Nico\ForumBundle\Entity\Thread();


        $form = $this->createForm(new ThreadType(), $thread);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if ($form->isValid())
            {
                $em = $this->container->get('doctrine')->getEntityManager();
                $thread->setDatecreated(new \DateTime('now'));

                $forum = $this->getDoctrine()
                    ->getRepository('NicoForumBundle:Forum')
                    ->find($forum_id);

                $thread->setForum($forum);
                $em->persist($thread);
                $em->persist($thread->getFirstpost());

                $em->flush();
            }
        }

        return $this->render('NicoForumBundle:Thread:new.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}