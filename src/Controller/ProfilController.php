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
        $username = $user->getUsername();
        $form = $this->createForm(ProfilType::class, $profil);
        $manager = $this->getDoctrine()->getManager();

        $imagetmp = $profil->getImage();
        dump($profil->getImage());
        $form->handleRequest($request);
        dump($profil->getImage());

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $image */

            $image = $form->get('image')->getData();

            if ($image) {
                dump("if");
                switch (implode($_FILES['profil']['type'])) {

                    case "image/png":
                        $name = $username . ".png";
                        break;
                    case "image/jpeg":
                        $name = $username . ".jpeg";
                        break;
                    case "image/gif":
                        $name = $username . ".gif";
                        break;
                }
                try {
                    $image->move(
                        $this->getParameter('profil_directory'),
                        $name
                    );
                } catch (FileException $e) {
                    dump($e);
                }
                $profil->setImage($name);
            } else {
                $name = $imagetmp;
                dump($name);
            }

            $profil->setImage($name);
            $manager->persist($profil);
            $manager->flush();
            $user->setEmail($profil->getEmail());
        }

        return $this->render('profil/profil.html.twig', [
            'formProfil' => $form->createView(),
            'srcImage' => '/profil/' . $profil->getImage()
        ]);
    }
}
