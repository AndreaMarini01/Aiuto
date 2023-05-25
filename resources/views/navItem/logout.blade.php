@if (Auth::check())
    <!--The preventDefault() method of the Event interface tells the client that if the event does not get explicitly handled,
    its default action should not be taken as it normally would be.
    handled = gestito-->
    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
    <form id="logout-form" action="{{route('logout')}}" method="POST">
        {{csrf_field()}}
    </form>
@endif
