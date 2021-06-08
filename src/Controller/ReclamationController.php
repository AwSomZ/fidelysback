<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Reclamation;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="reclamation")
     */
    public function afficher(Request $request, PaginatorInterface $paginator)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamations = $rep->findBy(['etat' => 'en cours', 'admin' => null]);
        $reclamation = $paginator->paginate(
            $reclamations,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('reclamation/reclamationenc.html.twig', ['reclamation' => $reclamation]);
    }

    /**
     * @Route("/reclamationres", name="reclamationres")
     */
    public function afficherres(Request $request, PaginatorInterface $paginator)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamations = $rep->findBy(['etat' => 'resolu']);
        $reclamation = $paginator->paginate(
            $reclamations,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('reclamation/reclamationres.html.twig', ['reclamation' => $reclamation]);
    }

    /**
     * @Route("/mesreclamations/{id}", name="mesreclamations")
     */
    public function affichermesres(Request $request, PaginatorInterface $paginator, $id)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $ad = $doctrine->getRepository(Admin::class);
        $admin = $ad->find($id);
        $reclamations = $rep->findBy(['admin' => $admin]);
        $reclamation = $paginator->paginate(
            $reclamations,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('reclamation/mesreclamations.html.twig', ['reclamation' => $reclamation]);
    }

    /**
     * @Route("/consulterreclamationenc/{id}", name="consulterreclamationenc")
     */
    public function consulter($id)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamation = $rep->find($id);
        return $this->render('reclamation/consult.html.twig', ['reclamation' => $reclamation]);

    }

    /**
     * @Route("/deletereclamationenc/{id}", name="deletereclamationenc")
     */
    public function deletereclamation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reclamation = $entityManager->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            throw $this->createNotFoundException
                (
                'No reclamation found for id ' . $id
            );
        }
        $entityManager->remove($reclamation);
        $entityManager->flush();
        return $this->redirectToRoute('reclamation');
    }

    /**
     * @Route("/deletereclamationres/{id}", name="deletereclamationres")
     */
    public function deletereclamationres($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reclamation = $entityManager->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            throw $this->createNotFoundException
                (
                'No reclamation found for id ' . $id
            );
        }
        $entityManager->remove($reclamation);
        $entityManager->flush();
        return $this->redirectToRoute('reclamationres');
    }

    /**
     * @Route("/changeretat/{id}", name="changeretat" )
     */
    public function changeretat(Request $request, EntityManagerInterface $manager, $id)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamation = $rep->find($id);
        $reclamation->setEtat('resolu');
        $manager->persist($reclamation);
        $manager->flush();
        return $this->redirectToRoute('reclamation');

    }

    /**
     * @Route("/reply/{id}", name="reply" )
     */
    public function reply(Request $request, EntityManagerInterface $manager, $id)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamation = $rep->find($id);
        return $this->render('reclamation/reply.html.twig', ['reclamation' => $reclamation]);

    }

    /**
     * @Route("/rechercherreclamation", name="rechercherreclamation")
     */
    public function rech(Request $request)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $id = $request->get('id');
        $reclamation = $rep->find($id);
        if (!$reclamation) {
            $this->get('session')->getFlashBag()->add(
                'notice',
                'reclamation non trouvé'
            );
        } else {
            return $this->redirectToRoute('consulterreclamationenc', ['id' => $id]);
        }
        return $this->redirectToRoute('reclamation');

    }

    /**
     * @Route("/rechercherreclamationres", name="rechercherreclamationres")
     */
    public function rechres(Request $request)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $id = $request->get('id');
        $reclamation = $rep->find($id);
        if (!$reclamation) {
            $this->get('session')->getFlashBag()->add(
                'notice',
                'reclamation non trouvé'
            );
        } else {
            return $this->redirectToRoute('consulterreclamationenc', ['id' => $id]);
        }
        return $this->redirectToRoute('reclamationres');

    }

    /**
     * @Route("/sendmail/{id}/{rid}", name="sendmail")
     */
    public function sendmail(Request $request, \Swift_Mailer $mailer, $id, $rid, EntityManagerInterface $manager)
    {
        $to = $request->get('to');
        $email = $request->get('email');
        $message = (new \Swift_Message('Reclamation Fidelys'))
            ->setFrom('support@fidelys.tn')
            ->setTo($to)
            ->setBody(
                $email,
                'text/plain'
            );
        $mailer->send($message);
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamation = $rep->find($rid);
        $ad = $doctrine->getRepository(Admin::class);
        $admin = $ad->find($id);
        $reclamation->setAdmin($admin);
        $manager->persist($reclamation);
        $manager->flush();
        return $this->redirectToRoute('mesreclamations', ['id' => $id]);
    }

}
