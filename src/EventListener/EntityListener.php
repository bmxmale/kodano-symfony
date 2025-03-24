<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Product;
use App\Notification\NotificationManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Serializer\SerializerInterface;

final class EntityListener
{
    public function __construct(
        private NotificationManager $notificationManager,
        private SerializerInterface $serializer
    ) {
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $this->sendNotification($args);
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $this->sendNotification($args);
    }

    private function sendNotification(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof Product) {
            $this->notificationManager->send(
                sprintf(
                    'Product saved: "%s" (ID:%d)',
                    $entity->getName(),
                    $entity->getId()
                ),
                ['entity' => $entity]
            );
        }
    }
}
