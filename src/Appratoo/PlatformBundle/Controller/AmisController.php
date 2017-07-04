<?php

namespace Appratoo\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AmisController extends Controller {

    public function indexAction() {
        return $this->render('AppratooPlatformBundle:Home:index.html.twig');
    }

    public function listeAmisAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppratooPlatformBundle:User");

        $users = $repository->findAll();

        return $this->render('AppratooPlatformBundle:amis:liste-amis.html.twig', array('users' => $users));
    }

    public function ajouterAmiAction($id) {
        $userConnecter = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppratooPlatformBundle:User");

        $user = $repository->find($id);

        if ($user != null) {
            if (!$userConnecter->estAmi($user) && !$user->estAmi($userConnecter)) {
                $userConnecter->addAmi($user);
                $em->persist($userConnecter);
                $em->flush();
            }
        }

        return $this->redirectToRoute("appratoo_platform_liste_amis");
    }

    public function supprimerAmiAction($id) {
        $userConnecter = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppratooPlatformBundle:User");

        $user = $repository->find($id);

        if ($user != null) {
            if ($userConnecter->estAmi($user)) {
                $userConnecter->removeAmi($user);
                $em->persist($userConnecter);
                $em->flush();
            } else if ($user->estAmi($userConnecter)) {
                $user->removeAmi($userConnecter);
                $em->persist($user);
                $em->flush();
            }
        }

        return $this->redirectToRoute("appratoo_platform_liste_amis");
    }

}
