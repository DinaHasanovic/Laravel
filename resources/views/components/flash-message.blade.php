@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false,3000)" x-show="show" style="color:red; ">
        <p>{{session('message')}}</p>
    </div>
@endif