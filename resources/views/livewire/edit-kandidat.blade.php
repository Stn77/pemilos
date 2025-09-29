<div class="container bg-body">
    <form 
    class="mx-auto border flex flex-col w-max"
    method="POST" action="">
    <div class="top">
        <input type="text" name="name" id="name" value="{{$data->name}}">
        <input type="text" name="visi" id="visi" value="{{$data->visi}}">
    </div>
    <div class="bottom">
        {{-- @foreach ($misi as $misi)
            <input type="text" value="{{$misi->misi}}">
        @endforeach --}}
        <p>{{$misi}}</p>
    </div>
    
</form>
</div>