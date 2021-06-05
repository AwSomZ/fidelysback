<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client; 
use App\Entity\User;
use App\Entity\Reclamation;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repoClient = $em->getRepository(Client::class);
        $NbrClient = $repoClient->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository(User::class);
        $NbrUser = $repoUser->createQueryBuilder('b')
            ->select('count(b.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $em = $this->getDoctrine()->getManager();
        $repoComplaint = $em->getRepository(Reclamation::class);
        $NbrComplaint = $repoComplaint->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();    


        return $this->render('dashboard/index.html.twig', [
            'nombrev' => $NbrClient , 'nombreu' => $NbrUser , 'nombrer' => $NbrComplaint
        ]);
    
    }
}
