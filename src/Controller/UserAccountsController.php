<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\User; 

class UserAccountsController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function show(Request $request,PaginatorInterface $paginator)
    {
        $doctrine=$this->getDoctrine();
        $rep=$doctrine->getRepository(User::class);
        $user=$rep->findAll();
        $users = $paginator->paginate(
            $user, 
            $request->query->getInt('page', 1), 
            6
        );
        return $this->render('user_accounts/index.html.twig',['user'=>$users]);
        
    }

    /**
    * @Route("/consulteruser/{id}", name="consulteruser")
    */
    public function consulter($id)
        {
            $doctrine=$this->getDoctrine();
            $rep=$doctrine->getRepository(User::class);
            $user=$rep->find($id);
            $datenaiss=$user->getDatenaiss()->format("Y-m-d");
            return $this->render('user_accounts/consult.html.twig',['user'=>$user,'dn'=>$datenaiss ] );
    
        }

        /**
    * @Route("/deleteuser/{id}", name="deleteuser")
    */
    public function deleteuser($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(user::class)->find($id);
        if (!$user) 
            {
                throw $this->createNotFoundException
                    (
                        'No user found for id '.$id
                    );
            }
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('user');
    }  

    /**
    * @Route("/rechercheruser", name="rechercheruser")
    */
    public function rech(Request $request)
        {
            $doctrine=$this->getDoctrine();
            $rep=$doctrine->getRepository(user::class);
            $id= $request->get('id');
            $user=$rep->find($id);
            if (!$user) 
                {
                    $this->get('session')->getFlashBag()->add(
                        'notice',
                        'utilisateur non trouvé'
                    );
                }
                else
                    {
                        return $this->redirectToRoute('consulteruser',['id' =>$id]);
                    }
                    return $this->redirectToRoute('user');
                
        }

}
