<?php

declare(strict_types=1);

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailNotification implements NotificationInterface
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function send(string $message, array $context = []): bool
    {
        $notificationMail = new Email();
        $notificationMail
            ->from($_ENV['NOTIFICATION_MAIL_FROM'] ?? 'example@example.com')
            ->to($_ENV['NOTIFICATION_MAIL_TO'] ?? 'admin@example.com')
            ->subject('[API] Notification')
            ->text($message);

        $this->mailer->send($notificationMail);

        return true;
    }
}