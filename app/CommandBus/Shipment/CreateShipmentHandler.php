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
        $className = '\\App\Services\Shipment\\' . $command->shipmentInfo()['shipmentService'] . 'Service';
        (new $className())->handle($command->sender(), $command->receiver(), $command->shipmentInfo());

        return ['Message' => 'OK'];
    }
}
