<?php

namespace ResourceViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('ResourceViewerBundle:Default:index.html.twig');
    }

    /**
     * @Route("/resource_system")
     */
    public function resourceSystemAction()
    {
        $linfo = new \Linfo\Linfo;
        $parser = $linfo->getParser();

        return new JsonResponse(array(
          'cpu' => $parser->getCPU(),
          'disk' => $parser->getHD(),
          'ram' => $parser->getRam()
        ));
    }
}
