<?php

namespace App\CommandBus\Shipment;

use Rosamarsky\CommandBus\Handler;
use Rosamarsky\CommandBus\Command;

class CreateShipmentHandler implements Handler
{
    /**
     * @param CreateShipment|Command $command
     *
     * @return array
     */
    public function handle(CreateShipment|Command $command): array
    {
        $serviceClass = '\\App\Services\Shipment\\' . $command->shipmentInfo()['shipmentService'] . 'Service';

        if (!class_exists($serviceClass)) {
            throw new \Exception("Service $serviceClass does not exist");
        }

        (new $serviceClass())->createShipment($command->sender(), $command->receiver(), $command->shipmentInfo());

        return ['Message' => 'OK'];
    }
}
