<?php

namespace App\Notification;

use App\Entity\User;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class MailNotification {

    public function notify(MailerInterface $mailer, User $user)
    {
       
        $email = (new Email())
            ->from('noreply@eventsports.com')
            ->to($user->getEmail())

            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>Sending Mail from code</p>
                    <p> <a href = "http://127.0.0.1:8000/">Cliquer ici</a>');

        /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
        $sentEmail = $mailer->send($email);
        // $messageId = $sentEmail->getMessageId();

        // ...
    }

}