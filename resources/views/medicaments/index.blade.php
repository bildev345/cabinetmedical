<div>
    @if ($errors->any())
       <ul class="alert alert-success">
            @foreach ($errors as $error)
                <li>{{$error}}</li>
            @endforeach 
       </ul>   
    @endif
    @if (session("success"))
        <div class="alert alert-success">
            {{session("success")}}
        </div>
    @endif
</div>
