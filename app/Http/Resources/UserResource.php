<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\{AddressResource, OrderResource};

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
						'name' => $this->name,
						'email' => $this->email,
						'addresses' => AddressResource::collection($this->addresses),
						'orders' => OrderResource::collection($this->orders)
				];
    }
}
