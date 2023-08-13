@if(session()->has('message'))
    <div style="color:red; ">
        <p>{{session('message')}}</p>
    </div>
@endif