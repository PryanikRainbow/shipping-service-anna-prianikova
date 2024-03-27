<?php

namespace App\CommandBus\Shipment;

use App\Http\Requests\ShipmentRequest;
use Rosamarsky\CommandBus\Command;

class CreateShipment implements Command
{
    public function __construct(
        private array $sender,
        private array $receiver,
        private array $shipmentInfo
    ) {
    }

    public static function fromRequest(ShipmentRequest $request): self
    {
        return new self(
            $request->input()['sender'],
            $request->input()['receiver'],
            $request->input()['shipmentInfo'],
        );
    }

    public function sender(): array
    {
        return $this->sender;
    }

    public function receiver(): array
    {
        return $this->receiver;
    }

    public function shipmentInfo(): array
    {
        return $this->shipmentInfo;
    }
}
