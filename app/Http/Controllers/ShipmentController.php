<?php

namespace App\Http\Controllers;

use App\CommandBus\Shipment\CreateShipment;
use App\Http\Requests\ShipmentRequest;
use Illuminate\Http\Response;

class ShipmentController extends AbsctractController
{
    /**
     * @param ShipmentRequest $request
     *
     * @return Response
     */
    public function __invoke(ShipmentRequest $request): Response
    {
        return new Response($this->dispatch(CreateShipment::fromRequest($request)), Response::HTTP_OK);
    }
}
