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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{

    public function __construct(ProfilRepository $prepository, UserRepository $urepository)
    {
        $this->prepository = $prepository;
        $this->urepository = $urepository;
    }

    /**
     * @Route("/profil/city={city}/{username}", name="profil")
     */
    public function index(Request $request, EntityManagerInterface $manager, $username)
    {

        $user = $this->urepository->findOneBy(['username' => $username]);
        $profil = $this->prepository->findOneBy(['email' => $user->getEmail()]);
        $username = $user->getUsername();
        $form = $this->createForm(ProfilType::class, $profil);
        $manager = $this->getDoctrine()->getManager();
        $imagetmp = $profil->getImage();
        $form->handleRequest($request);

        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $image */

            $image = $form->get('image')->getData();

            if ($image) {
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
            }

            $profil->setImage($name);
            $manager->persist($profil);
            $manager->flush();
            $user->setEmail($profil->getEmail());
        }

        return $this->render('profil/profil.html.twig', [
            'formProfil' => $form->createView(),
            'srcImage' => '/profil/' . $profil->getImage(),
            'sports' => $sports
        ]);
    }

    /**
     * @Route("/pwdchange/{username}", name="pwdchange")
     */

    public function modificationpwd(Request $request, EntityManagerInterface $manager,  UserPasswordEncoderInterface $encoder, $username)
    {
        $user = $this->urepository->findOneBy(['username' => $username]);

        $manager = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()
            ->add('pwd', PasswordType::class)
            ->add('confirmPwd', PasswordType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pwd = $form['pwd']->getData();
            $confirmPWD =  $form['confirmPwd']->getData();
            if (strcmp($pwd, $confirmPWD) == 0) {

                $manager = $this->getDoctrine()->getManager();
                $hash = $encoder->encodePassword($user, $pwd);
                $user->setPassword($hash);
                $manager->persist($user);
                $manager->flush();

                return $this->redirectToRoute('home');
            } else {
                return $this->render('security/pwdmodif.html.twig', [
                    'formPWD' => $form->createView(),
                    'error' => "Les mots de passe ne correspondent pas"
                ]);
            }
        }

        return $this->render('security/pwdmodif.html.twig', [
            'formPWD' => $form->createView(),
            'error' => NULL
        ]);
    }
}
