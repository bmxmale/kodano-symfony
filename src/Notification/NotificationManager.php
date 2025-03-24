<?php

declare(strict_types=1);

namespace App\Notification;

class NotificationManager implements NotificationInterface
{
    private array $notifications = [];

    /**
     * @param \App\Notification\NotificationInterface $notification
     *
     * @return void
     */
    public function addNotification(NotificationInterface $notification): void
    {
        if (!isset($this->notifications[$notification::class])) {
            $this->notifications[$notification::class] = $notification;
        }
    }

    /**
     * @param string $message
     * @param array $context
     *
     * @return bool
     */
    public function send(string $message, array $context = []): bool
    {
        $notificationStatus = [];
        foreach ($this->notifications as $notification) {
            try {
                $notificationStatus[$notification::class] = $notification->send($message, $context);
            } catch (\Throwable $e) {
                // TODO: notification failure log
                $notificationStatus[$notification::class] = false;
                continue;
            }
        }

        return !in_array(false, $notificationStatus, true);
    }
}
