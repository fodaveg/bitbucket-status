<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="status")
     */
    public function statusAction(Request $request)
    {
        $this->getBitbucketManager()->authenticate();

        $repositories = $this->getBitbucketManager()->getRepositoriesFromBitbucket(true);

        return $this->render('default/status.html.twig', array(
            'repositories' => $repositories,
        ));
    }

    private function getBitbucketManager()
    {
        return $this->get('app.manager.bitbucket');
    }
}
