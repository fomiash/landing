<?php

namespace App\EventListener;

use App\Logic\ActivityTransfer;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class RequestListener
{
    public function __invoke(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }
        (new ActivityTransfer())->get(parse_url($_SERVER['REQUEST_URI'])['path'], new \DateTime('NOW'));
    }

}

