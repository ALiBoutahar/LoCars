
<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="{{url('/')}}">Home</a>
    <a href="{{url('/reputationTracker')}}">Reputation Tracker</a>
    @auth
        @can('super_admin')
            <a href="{{route('home')}}">Dashboard</a>
        @endcan
        <a href="{{url('/domain')}}">Check Domains</a>
        <a href="{{ url('/check-ip') }}">Check IPs</a>

        @if(auth()->user()->email_verified_at != '')
            <a href="{{url('/spamhaus_ip')}}">Spamhaus</a>
        @endif


        <a href="{{route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    @else
        <a href="{{route('login')}}">Login</a>
    @endauth
    {{-- <a href="#contact">Contact Us</a> --}}
</div>