<?php

namespace App\Transformers;

use App\Models\Client;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    /**
     * @param \App\ServiceCategory $serviceCategory
     * @return array
     */
    public function transform(Client $client): array
    {
        $image_path = getImageUrl($client->image);
        return [
            'image' => '<img src="'.$image_path.'" width="80" height="80" />',
            'name'  =>  $client->name,
            'email' =>  $client->email,
            'phone' =>  $client->phone,
            'actions'   =>  $this->getActionButtons($client , $image_path),
        ];
    }

    public function getActionButtons($client , $image_path)
    {
        return "";
    }
}
