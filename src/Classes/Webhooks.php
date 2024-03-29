<?php

namespace Corals\Utility\Webhook\Classes;

class Webhooks
{
    public function __construct()
    {
    }

    protected $events = [];

    /**
     * @param $eventName
     * @param $jobClass
     */
    public function registerEvent($eventName, $jobClass)
    {
        $this->events[$eventName] = $jobClass;
    }

    /**
     * @param $eventName
     * @return mixed
     */
    public function getEventJob($eventName)
    {
        return $this->events[$eventName] ?? null;
    }

    public function getEvents()
    {
        return $this->events;
    }
}
