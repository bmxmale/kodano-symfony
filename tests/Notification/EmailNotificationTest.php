<?php

declare(strict_types=1);

namespace App\Tests\Notification;

use App\Notification\EmailNotification;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailNotificationTest extends TestCase
{
    public function testSend(): void
    {
        $mailer = $this->createMock(MailerInterface::class);

        $mailer->expects($this->once())
            ->method('send')
            ->with($this->isInstanceOf(Email::class));

        $notification = new EmailNotification($mailer);
        $result = $notification->send('Test message');

        $this->assertTrue($result);
    }
}