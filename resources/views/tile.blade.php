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

            @forelse ($stops as $stop)

                <div class="grid gap-2">
                    <h2 class="uppercase">
                        {{$stop['name']}}
                    </h2>
                    <ul class="divide-y-2">

                        @foreach ($stop['stoptimes'] as $stoptime)

                            <li class="grid grid-cols-1-auto-auto py-1">
                                    <span class="mr-2">
                                        @switch($stop['vehicleMode'])
                                            @case('AIRPLANE')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#0046ad]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('BUS')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#007ac9]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('TRAM')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#008151]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('SUBWAY')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#ca4000]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('RAIL')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#8c4799]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('FERRY')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#007a97]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('CAR')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#333]">{{$stoptime['route']['shortName']}}</span>
                                            @break

                                            @case('BICYCLE')
                                            @case('CABLE_CAR')
                                            @case('FUNICULAR')
                                            @case('GONDOLA')
                                            @case('WALK')
                                            <span
                                                class="inline-flex rounded px-2 py-1 text-sm font-semibold leading-4 text-white bg-[#666]">{{$stoptime['route']['shortName']}}</span>
                                        @endswitch
                                        {{$stoptime['headsign']}}
                                    </span>

                                <span class="
                                        flex-none font-bold text-right variant-tabular
                                        {{ $stoptime['realtime'] ? 'text-green' : '' }}
                                    ">
                                        {{$stoptime['realtimeDeparture']->format('H:i')}}
                                    </span>

                        @endforeach
                    </ul>
                </div>
            @empty
                    No stops added, please refer to documentation
            @endforelse
        </div>
    </div>
</x-dashboard-tile>
