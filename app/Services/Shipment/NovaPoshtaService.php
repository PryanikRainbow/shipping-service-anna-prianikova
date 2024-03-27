<?php

namespace App\Services\Shipment;

class NovaPoshtaService implements ShipmentServiceI {
    
    /**
     * {@inheritdoc}
     */
    public function handle(array $sender, array $receiver, array $shipmentInfo): void
    {
        dd('nova');
        //some impementation...
    }
}