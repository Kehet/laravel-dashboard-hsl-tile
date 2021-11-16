<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center w-10 h-10 rounded-full"
            style="background-color: rgba(255, 255, 255, .9)"
        >
            <div class="text-3xl leading-none -mt-1">
                🚌
            </div>
        </div>
        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | grid gap-8">

            @foreach ($stops as $stop)

                <div class="grid gap-2">
                    <h2 class="uppercase">
                        {{$stop['name']}}
                    </h2>
                    <ul class="divide-y-2">

                        @foreach ($stop['stoptimes'] as $stoptime)

                            <li class="
                                    grid grid-cols-1-auto-auto py-1
                                    {{ false ? 'line-through text-danger' : '' }}
                                ">
                                    <span class="mr-2">
                                        @switch($stop['vehicleMode'])
                                            @case('AIRPLANE')
                                            <span
                                                class="route-number-container airplane">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('BUS')
                                            <span
                                                class="route-number-container bus">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('TRAM')
                                            <span
                                                class="route-number-container tram">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('SUBWAY')
                                            <span
                                                class="route-number-container subway">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('RAIL')
                                            <span
                                                class="route-number-container rail">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('FERRY')
                                            <span
                                                class="route-number-container ferry">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('CAR')
                                            <span
                                                class="route-number-container car">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('BICYCLE')
                                            @case('CABLE_CAR')
                                            @case('FUNICULAR')
                                            @case('GONDOLA')
                                            @case('WALK')
                                            <span
                                                class="route-number-container other">{{$stoptime['route']['shortName']}}</span>
                                        @endswitch
                                        {{$stoptime['headsign']}}
                                    </span>

                                @if(false)
                                    <span class="ml-auto mr-2 font-bold variant-tabular text-danger">
                                            {{ $train['delay'] }}m
                                        </span>
                                @endif

                                <span class="
                                        flex-none font-bold text-right variant-tabular
                                        {{ $stoptime['realtime'] ? 'text-green' : '' }}
                                    ">
                                        {{$stoptime['realtimeDeparture']->format('H:i')}}
                                    </span>

                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboard-tile>
