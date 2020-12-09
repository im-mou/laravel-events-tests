<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'groups' => $this->groups,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public static function fromArray($data)
    {

        $object = new \App\Models\Task;

        $object->title              = self::check_isset($data['title']);
        $object->description        = self::check_isset($data['description']);
        $object->groups             = self::check_isset($data['groups']);

        return $object;
    }

    private static function check_isset($value)
    {
        return (isset($value) && $value != '') ? $value : null;
    }

}
