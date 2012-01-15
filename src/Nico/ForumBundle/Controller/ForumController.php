<?php

namespace Nico\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nico\ProfileBundle\NicoProfileBundle;


/**
 * @Route("/forum")
 */
class ForumController extends Controller
{
    /**
     * @Route("/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $forum = $this->getDoctrine()
            ->getRepository('NicoForumBundle:Forum')
            ->find($id);

        return array('forum' => $forum);
    }
}