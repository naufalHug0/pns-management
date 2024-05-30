@if (session()->has('notification'))
    <div class="notification animate-scale-appear">
        @if (session('notification')['type'] == 'success')
            <i class="bi bi-check-circle-fill text-[150px] text-green-700"></i>
        @elseif (session('notification')['type'] == 'error')
            <i class="bi bi-x-circle-fill text-[150px] text-red-500"></i>
        @else
            <i class="bi bi-exclamation-triangle-fill text-[150px] text-orange-400"></i>
        @endif
        <p class="text-4xl -mt-4 font-extrabold text-purple text-center">{{ session('notification')['message'] }}</p>
        <div class="flex gap-2 w-full mt-12">
            @foreach (session('notification')['options'] as $option)
                @if (isset($option['post']))
                    <form action="{{ $option['post']['path'] }}" method="post" class="flex grow">
                        @csrf
                        @if (isset($option['post']['requests']))
                            @foreach ($option['post']['requests'] as $request)
                                <input type="hidden" name="{{ $request['name'] }}" value="{{ $request['value'] }}">
                            @endforeach
                        @endif
                        <button type='submit' class="notification-button {{ $option['type'] }}">{{ $option['text'] }}</button>
                    </form>
                @else
                <div class="notification-button {{ !isset($option['directTo']) ? 'dismissable' : '' }} {{ $option['type'] }}">{{ $option['text'] }}</div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="overlay opacity-0 animate-appear"></div>
@endif