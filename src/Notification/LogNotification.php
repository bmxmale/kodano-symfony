<?php

declare(strict_types=1);

namespace App\Notification;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LogNotification implements NotificationInterface
{
    public function __construct(
        private LoggerInterface $logger,
        private SerializerInterface $serializer
    )
    {
    }

    public function send(string $message, array $context = []): bool
    {
        if ((!empty($context))) {
            $context = $this->serializer->serialize($context, 'json');
        }

        $this->logger->info($message, [$context]);

        return true;
    }
}