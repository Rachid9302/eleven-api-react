<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Astronaute;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AstronauteController extends Controller
{
    /**
     * @return JsonResponse
     * @Route("/astronautes", name="astronautes")
     * @Method({"GET"})
     */
    public function getAstronautesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $astronautes = $em->getRepository(Astronaute::class)->findAll();

        return new JsonResponse($astronautes, 200, array('Access-Control-Allow-Origin'=> '*'));
    }

    /**
     * @return JsonResponse
     * @Route("/astronaute/{id}", name="astronaute")
     * @Method({"GET"})
     */
    public function getAstronauteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $astronaute = $em->getRepository(Astronaute::class)->find($id);

        return new JsonResponse($astronaute);
    }

    /**
     * @return JsonResponse
     * @Route("/new-astronaute", name="astronaute_new")
     * @Method({"POST"})
     */
    public function setNewAstronauteAction(Request $request)
    {
        $astronaute = new Astronaute();
        $em = $this->getDoctrine()->getManager();
        $astronaute
            ->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setAge($request->get('age'));
        $em->persist($astronaute);
        $em->flush();

        return new JsonResponse("ok", 200, array('Access-Control-Allow-Origin'=> '*'));
    }
}
