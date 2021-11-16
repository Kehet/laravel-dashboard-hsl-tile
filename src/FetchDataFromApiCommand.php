<?php

namespace Kehet\HSLTile;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class FetchDataFromApiCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-hsl-api';

    protected $description = 'Fetch data for HSL tile';

    public function handle()
    {
        $this->info('Fetching digitransit data...');

        $stops = [];

        foreach (config('dashboard.tiles.hsl.stops', []) as $id) {
            $stops[] = $this->getStopData($id);
        }

        HSLStore::make()->setData('stops', $stops);

        $this->info('All done!');
    }

    private function getStopData(string $id): array
    {
        $stop = $this->makeStopGraphQL($id);
        $routes = collect($stop['data']['stop']['routes']);

        return [
            'name' => $stop['data']['stop']['name'],
            'vehicleMode' => $stop['data']['stop']['vehicleMode'],
            'stoptimes' => collect($stop['data']['stop']['stoptimesWithoutPatterns'])
                ->map(function ($stoptime) use ($routes) {
                    $stoptime['route'] = $routes->firstWhere('gtfsId', '=', $stoptime['trip']['route']['gtfsId']);
                    $stoptime['scheduledArrival'] = Carbon::createFromTimestamp($stoptime['serviceDay'])
                        ->addSeconds($stoptime['scheduledArrival']);
                    $stoptime['realtimeArrival'] = Carbon::createFromTimestamp($stoptime['serviceDay'])
                        ->addSeconds($stoptime['realtimeArrival']);
                    $stoptime['realtimeDeparture'] = Carbon::createFromTimestamp($stoptime['serviceDay'])
                        ->addSeconds($stoptime['realtimeDeparture']);
                    $stoptime['scheduledDeparture'] = Carbon::createFromTimestamp($stoptime['serviceDay'])
                        ->addSeconds($stoptime['scheduledDeparture']);

                    return $stoptime;
                }),
        ];
    }

    /**
     * @param  string  $id
     *
     * @return array|mixed
     */
    private function makeStopGraphQL(string $id)
    {
        $body = <<<GRAPHQL
{
  stop(id: "HSL:$id") {
    name
    vehicleMode
    routes {
      shortName
      longName
      gtfsId
    }
    stoptimesWithoutPatterns {
      trip {
        route {
          gtfsId
        }
      }
      scheduledArrival
      realtimeArrival
      arrivalDelay
      scheduledDeparture
      realtimeDeparture
      departureDelay
      realtime
      realtimeState
      serviceDay
      headsign
    }
  }
}
GRAPHQL;

        return Http::acceptJson()
            ->withBody($body, 'application/graphql')
            ->post('https://api.digitransit.fi/routing/v1/routers/hsl/index/graphql')
            ->json();
    }
}
