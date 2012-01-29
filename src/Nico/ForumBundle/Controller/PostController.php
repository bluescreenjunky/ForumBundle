<?php

namespace Nico\ForumBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nico\ForumBundle\Form\PostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Nico\ProfileBundle\NicoProfileBundle;


 /**
 * @Route("/post")
 */
class PostController extends Controller
{
    /**
     * @Route("/show/{id}", name="post_show", defaults={"id" = "0"})
     * @Template()
     */
    public function showAction($id)
    {
        $post = $this->getDoctrine()
            ->getRepository('NicoForumBundle:Post')
            ->find($id);

        return array('post' => $post);
    }

    /**
     * @Route("/new/{thread_id}", name="post_new", defaults={"thread_id" = "0"})
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function newAction($thread_id)
    {
        $post = new \Nico\ForumBundle\Entity\Post();
        $form = $this->createForm(new PostType(), $post);

        $request = $this->container->get('request');

        $thread = $this->getDoctrine()
            ->getRepository('NicoForumBundle:Thread')
            ->find($thread_id);

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if ($form->isValid())
            {
                $post->setThread($thread);
                $post->setDatecreated(new \DateTime('now'));

                $em = $this->container->get('doctrine')->getEntityManager();
                $em->persist($post);
                $em->flush();
            }
        }

        return $this->render('NicoForumBundle:Post:new.html.twig', array(
            'form' => $form->createView(),
            'thread' => $thread,
        ));

    }

}