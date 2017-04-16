<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/status", name="status")
     */
    public function statusAction(Request $request)
    {
        $this->getBitbucketManager()->authenticate();

        $repositories = $this->getBitbucketManager()->getRepositoriesFromBitbucket(true);

        // replace this example code with whatever you need
        return $this->render('default/status.html.twig', array(
            'repositories' => $repositories,
        ));
    }

    private function getBitbucketManager()
    {
        return $this->get('app.manager.bitbucket');
    }
}
