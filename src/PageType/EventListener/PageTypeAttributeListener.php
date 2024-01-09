<?php

namespace App\PageType\EventListener;

use App\PageType\Attribute\PageType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use function is_array;

class PageTypeAttributeListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER_ARGUMENTS => ['onKernelControllerArguments', 10],
        ];
    }

    public function onKernelControllerArguments(ControllerArgumentsEvent $event): void
    {
        $request = $event->getRequest();

        if (!is_array(
            $attributes = $request->attributes->get('_pageType') ?? $event->getAttributes()[PageType::class] ?? null
        )) {
            return;
        }

        $object = reset($attributes);

        $request->attributes->set('_pageType', $object);
    }
}