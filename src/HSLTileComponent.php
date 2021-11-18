<?php

namespace Kehet\HSLTile;

use Livewire\Component;

class HSLTileComponent extends Component
{
    public $position;


    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {
        return view('dashboard-hsl-tile::tile', [
            'stops' => HSLStore::make()->getData('stops'),
            'alerts' => HSLStore::make()->getData('alerts'),
            'refreshIntervalInSeconds' => config('dashboard.tiles.hsl.refresh_interval_in_seconds', 60),
        ]);
    }
}
