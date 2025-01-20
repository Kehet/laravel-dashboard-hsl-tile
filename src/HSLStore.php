<?php

namespace Kehet\HSLTile;

use Spatie\Dashboard\Models\Tile;

class HSLStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("hsl-tile");
    }

    public function setData(string $key, array $data): self
    {
        $this->tile->putData($key, json_encode($data, JSON_THROW_ON_ERROR));

        return $this;
    }

    public function getData($key): array
    {
        $data = $this->tile->getData($key);

        return isset($data) ? json_decode($data, false, 512, JSON_THROW_ON_ERROR) : [];
    }
}
