@if (isset($user))
    @if ($user->photo)
        <img class="{{ $class }}" src="{{ asset('storage/' .$user->photo) }}" alt="user photo" @isset($style) style="{{$style}}" @endisset  @isset($id)
            id={{$id}}
        @endisset>
    @else
        <img class="{{ $class }}" src="{{ asset('storage/image/avatar.png') }}" alt="user photo" @isset($style) style="{{$style}}" @endisset @isset($id)
        id={{$id}}
    @endisset>
    @endif
@else
    @if (Auth::guard(activeGuard())->user()->photo)
        <img class="{{ $class }}" src="{{ asset('storage/' . auth()->guard(activeGuard())->user()->photo) }}" alt="user photo" @isset($id)
        id={{$id}}
    @endisset @isset($style) style="{{$style}}" @endisset>
    @else
        <img class="{{ $class }}" src="{{ asset('storage/image/avatar.png') }}" alt="user photo" @isset($id)
        id={{$id}}
    @endisset @isset($style) style="{{$style}}" @endisset>
    @endif
@endif
