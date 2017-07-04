<?php

namespace Appratoo\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BonoboController extends Controller {

    public function mesInformationsAction() {
        return $this->render('AppratooPlatformBundle:bonobo:afficher-mes-informations.html.twig');
    }

    public function modifierMesInformationsAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $age = $request->request->get('age');
            $famille = $request->request->get('famille');
            $race = $request->request->get('race');
            $nourriture = $request->request->get('nourriture');

            $userConnecter = $this->get('security.token_storage')->getToken()->getUser();
            $userConnecter->setAge($age);
            $userConnecter->setFamille($famille);
            $userConnecter->setRace($race);
            $userConnecter->setNourriture($nourriture);

            $em = $this->getDoctrine()->getManager();
            $em->persist($userConnecter);
            $em->flush();

            return $this->redirectToRoute('appratoo_platform_afficher_mes_informations');
        }

        return $this->render('AppratooPlatformBundle:bonobo:modifier-mes-informations.html.twig');
    }

}
