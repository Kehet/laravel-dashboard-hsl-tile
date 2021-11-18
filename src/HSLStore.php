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
        $this->tile->putData($key, serialize($data));

        return $this;
    }

    public function getData($key): array
    {
        $data = $this->tile->getData($key);

        return isset($data) ? unserialize($data) : [];
    }
}
