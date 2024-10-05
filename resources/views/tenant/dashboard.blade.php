<h3>
    {{ auth()->user()->name }}

</h3>
<h3>
    {{ auth()->user()->email }}
</h3>


<form method="POST" action="{{route('tenant.logout')}}">
    @csrf
    <button type="submit"> logout</button>
</form>