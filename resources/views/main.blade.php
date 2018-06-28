<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
@include('partials._nav')

<div class="">

@include('partials._messages')

{{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}
{{-- {{ $id = Auth::id() }} --}}


{{-- {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->username }}} --}}



@yield('content')


</div>


{{-- @include('partials._nofooter') --}}

@include('partials._javascript')

@yield('scripts')
</body>
</html>
