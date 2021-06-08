<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Reclamation;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

        $emm = $this->getDoctrine()->getManager();
        $repoComplaintenc = $emm->getRepository(Reclamation::class);
        $NbrComplaintenc = $repoComplaintenc->createQueryBuilder('d')
            ->select('count(d.id)')
            ->where('d.etat = :etat')
            ->setParameter('etat', 'en cours');
        $countenc = $NbrComplaintenc->getQuery()->getSingleScalarResult();

        $emm = $this->getDoctrine()->getManager();
        $repoComplaintme = $emm->getRepository(Reclamation::class);
        $NbrComplaintme = $repoComplaintme->createQueryBuilder('e')
            ->select('count(e.id)')
            ->where('e.etat = :etat')
            ->andWhere('e.admin = :admin')
            ->setParameter('admin', $this->getUser()->getId())
            ->setParameter('etat', 'resolu');
        $countme = $NbrComplaintme->getQuery()->getSingleScalarResult();

        $repoComplaintmeenc = $emm->getRepository(Reclamation::class);
        $NbrComplaintmeenc = $repoComplaintmeenc->createQueryBuilder('f')
            ->select('count(f.id)')
            ->where('f.etat = :etat')
            ->andWhere('f.admin = :admin')
            ->setParameter('admin', $this->getUser()->getId())
            ->setParameter('etat', 'en cours');
        $countmeenc = $NbrComplaintmeenc->getQuery()->getSingleScalarResult();

        return $this->render('dashboard/index.html.twig', [
            'nombrev' => $NbrClient, 'nombreu' => $NbrUser, 'nombrer' => $countenc, 'resoluparmoi' => $countme, 'traiteparmoi' => $countmeenc,
        ]);

    }
}
