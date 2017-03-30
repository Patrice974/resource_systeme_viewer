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
        $cpu_usage = sys_getloadavg()[0];

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2]/$mem[1]*100;

        return new JsonResponse(array('name' => "toto", 'cpu_usage' => $cpu_usage, 'memory_usage' => $memory_usage));
    }
}
