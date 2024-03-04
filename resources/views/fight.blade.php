@extends('layouts.app')
@section('content')


<body style="background-image: url('/images/complementos/division.png'); background-size: cover; background-position: center;">
    <div>

        <div class=" justify-between items-center">
            @if (isset($winnerName))
            <p class="font-bold text-5xl">Winner's Name: {{ $winnerName }}</p>
            @endif

            @if (isset($winner))
            <p>Final Power: {{ $winner }}</p>
            @endif
        </div>


        <div class="flex justify-between items-center font-bold">
            <div class="text-center">
                <div class="flex flex-col items-center">
                    <img src="/images/{{ $match->teamLocal->fighter_image }}" alt="Fighter 3" class="w-3/4 h-3/4 rounded-lg mb-4">
                    <p>{{ $match->teamLocal->name }}</p>
                    <p>Initial power: {{ $match->teamLocal->power }}</p>
                </div>
            </div>

            <form action="{{ route('winner.get') }}" method="post">
                @csrf
                <input type="number" name="teamLocal" class="hidden" value="{{ $match->teamLocal->power }}">
                <input type="number" name="teamGuest" class="hidden" value="{{ $match->teamGuest->power }}">
                <input type="text" name="idLocal" class="hidden" value="{{ $match->teamLocal->name }}">
                <input type="text" name="idGuest" class="hidden" value="{{ $match->teamGuest->name }}">
                <input type="number" name="match_id" class="hidden" value="{{ $match->id }}">



                <button type="submit" class="rounded-md border bg-yellow-600 px-7 py-4 font-bold mb-4">FIGHT!</button>
            </form>

            <div class="text-center font-bold">
                <div class="flex flex-col items-center">
                    <img src="/images/{{ $match->teamGuest->fighter_image }}" alt="Fighter 3" class="w-3/4 h-3/4 rounded-lg mb-4">
                    <p>{{ $match->teamGuest->name }}</p>
                    <p>Initial power:{{ $match->teamGuest->power }}</p>
                </div>
            </div>
        </div>


    </div>
</body>




@endsection