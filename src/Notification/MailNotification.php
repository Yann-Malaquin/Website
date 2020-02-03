<?php

namespace App\Notification;

use App\Entity\User;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;

class MailNotification {

    public function notify(MailerInterface $mailer, User $user)
    {
       
        //générer pour l'url
        $cle = md5(microtime(TRUE) * 100000);
        $user->setCle($cle);
        $user->setActivate(0);

        $email = (new Email())
                ->from('noreply@eventsports.com')
                ->to($user->getEmail())

                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>Sending Mail from code</p>
                        <p> <a href = "http://127.0.0.1:8000/">log='.urlencode($user->getUsername()).'&cle='.urlencode($cle).'</a>');

            /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
            $sentEmail = $mailer->send($email);
            // $messageId = $sentEmail->getMessageId();

            // ...
    }

}