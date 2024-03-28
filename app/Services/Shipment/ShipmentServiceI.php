<?php

namespace App\Services\Shipment;

interface ShipmentServiceI {

    /**
     * @param array $sender
     * @param array $receiver
     * @param array $shipmentInfo
     *
     * @return void
     */
    public function createShipment(array $sender, array $receiver, array $shipmentInfo): void;
}