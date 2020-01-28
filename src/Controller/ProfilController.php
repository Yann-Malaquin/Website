<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Repository\UserRepository;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{

    public function __construct(ProfilRepository $prepository, UserRepository $urepository)
    {
        $this->prepository = $prepository;
        $this->urepository = $urepository;
    }



    /**
     * @Route("/profil/{username}", name="profil")
     */
    public function index(Request $request, EntityManagerInterface $manager, $username)
    {

        $user = $this->urepository->findOneBy(['username' => $username]);
        $profil = $this->prepository->findOneBy(['email' => $user->getEmail()]);

        $form = $this->createForm(ProfilType::class,$profil);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($profil);
            $manager->flush();
            $user->setEmail($profil->getEmail());
        }

        return $this->render('profil/profil.html.twig', [
            'formProfil' => $form->createView()
        ]);
    }
}
