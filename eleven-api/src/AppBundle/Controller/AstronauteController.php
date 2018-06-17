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
     * Fonction qui permet d'afficher tous les astronautes
     */
    public function getAstronautesAction(Request $request)
    {
        // appel à doctrine pour récupérater de tout les astronautes de la base de données
        $em = $this->getDoctrine()->getManager();
        $astronautes = $em->getRepository(Astronaute::class)->findAll();

        return new JsonResponse($astronautes, 200, array('Access-Control-Allow-Origin'=> '*'));
    }

    /**
     * @return JsonResponse
     * @Route("/astronaute/{id}", name="astronaute")
     * @Method({"GET"})
     * Fonction qui permet d'afficher un astronaute en particulier grâce à l'id récupéré
     */
    public function getAstronauteAction(Request $request, $id)
    {
        // appel à doctrine pour récupérer un astrontaute grâce à l'id en paramètre
        $em = $this->getDoctrine()->getManager();
        $astronaute = $em->getRepository(Astronaute::class)->find($id);

        return new JsonResponse($astronaute);
    }

    /**
     * @return JsonResponse
     * @Route("/new-astronaute", name="astronaute_new")
     * @Method({"POST"})
     * Fonction qui permet d'ajouter un astronaute
     */
    public function setNewAstronauteAction(Request $request)
    {
        // création d'un astronaute et on set les valeur saisie dans le formulaire
        $astronaute = new Astronaute();
        $em = $this->getDoctrine()->getManager();
        $astronaute
            ->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setAge($request->get('age'));
        $em->persist($astronaute);
        $em->flush();

        return new JsonResponse("ok", 200);
    }
}
