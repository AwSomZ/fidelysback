<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Mouvement;
use App\Entity\Reclamation;
use App\Entity\Transaction;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientAccountsController extends AbstractController
{

    /**
     * @Route("/client", name="client")
     */

    public function show(Request $request, PaginatorInterface $paginator)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Client::class);
        $client = $rep->findAll();
        $clients = $paginator->paginate(
            $client, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en clients, passé dans l'URL, 1 si aucune page
            6// Nombre de résultats par page
        );
        return $this->render('client_accounts/index.html.twig', ['client' => $clients]);

    }

    /**
     * @Route("/consulterclient/{id}", name="consulterclient")
     */
    public function consulter($id, Request $request, PaginatorInterface $paginator)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Client::class);
        $client = $rep->find($id);
        $repmvt = $doctrine->getRepository(Mouvement::class);
        $mouvement = $repmvt->findOneBy(['client' => $id]);
        $reptrs = $doctrine->getRepository(Transaction::class);
        $transaction = $reptrs->findBy(['client' => $id]);
        $datenaiss = $client->getDatenaiss()->format("Y-m-d");
        $diff = $dateexp = $mouvement->getPlafond() - $mouvement->getSoldecummule();
        $dateexp = $mouvement->getDateExpiration()->format("Y-m-d");
        return $this->render('client_accounts/consult.html.twig', ['client' => $client, 'dn' => $datenaiss, 'mouvement' => $mouvement, 'dateexp' => $dateexp, 'diff' => $diff, 'transaction' => $transaction]);

    }

    /**
     * @Route("/deleteclient/{id}", name="deleteclient")
     */
    public function deleteclient($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);
        if (!$client) {
            throw $this->createNotFoundException
                (
                'No Client found for id ' . $id
            );
        }
        $entityManager->remove($client);
        $entityManager->flush();
        return $this->redirectToRoute('client');
    }

    /**
     * @Route("/rechercherclient", name="rechercherclient")
     */
    public function rech(Request $request)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Client::class);
        $id = $request->get('id');
        $client = $rep->find($id);
        if (!$client) {
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Client non trouvé'
            );
        } else {
            return $this->redirectToRoute('consulterclient', ['id' => $id]);
        }
        return $this->redirectToRoute('client');

    }
    /**
     * @Route("/reclamationclient/{id}", name="reclamationclient")
     */
    public function afficher($id, Request $request, PaginatorInterface $paginator)
    {
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(Reclamation::class);
        $reclamations = $rep->findBy(['etat' => 'en cours', 'client' => $id]);
        $reclamation = $paginator->paginate(
            $reclamations,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('reclamation/reclamationenc.html.twig', ['reclamation' => $reclamation]);
    }
}
