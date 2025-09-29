<div class="container p-6 mt-6 bg-body">
    <style>
    </style>
    <h2 class="pl-4 poppins-medium text-[#2e3131]">Daftar Kandidat</h2>
    <div class="w-[100%] flex align-middle justify-end mx-auto px-3">
        <p class="mdi mdi-plus before:text-white before:font-bold text-center bg-[#0080EC] btn-active rounded" wire:click="addKandidatModal()"></p>
        {{$kandidatList->links()}}
    </div>
    <div class="card-c flex flex-col items-center justify-normal m-4 my-3 mt-5 gap-4">
        @forelse ($kandidatList as $kandidat)            
        <div class="w-[1000px] py-4 px-9 gap-10 outline-none border-none rounded"  style="box-shadow: rgba(0, 0, 0, 0.24) 0.2px 0px 10px;">
            <div class="w-[100%] flex justify-end">
                <input type="text" wire:model="search">
                <i 
                wire:click="deleteModal({{$kandidat->id}})"
                class="mdi mdi-delete btn-active before:text-gray-500 before:text-[0.5em] cursor-pointer text-center"></i>
            </div>
            <div class="top flex gap-10">
                <div class="top-left">
                    <img 
                    class="w-60 rounded-md"
                    src="{{asset('storage/' . $kandidat->foto_kandidat)}}" alt="FotoKandidat">
                </div>
                <div class="top-right flex">
                    <div class="ll w-[200px]">
                        <p class="poppins-regular text-gray-800 h-[32px] py-2 text-2xl">No:</p>
                        <p class="poppins-regular text-gray-800 h-[32px] py-2 text-2xl">Nama:</p>
                    </div>
                    <div class="rr ml-2">
                        <p class="poppins-regular text-gray-800 h-[32px] py-2 ">:  {{$kandidat->no_kandidat}}</p>
                        <p class="poppins-regular text-gray-800 h-[32px] py-2 ">:  {{$kandidat->name}}</p>
                    </div>
                </div>
            </div>
            <div class="visi-misi gap-8 flex flex-col mt-7">
                <div class="visi">
                    <p class="poppins-regular text-gray-800 text-[1.5rem]">Visi</p>
                    <p>{{$kandidat->visi}}</p>
                </div>
                <div class="misi">
                    <p class="poppins-regular text-gray-800 text-[1.5rem]">Misi</p>
                    @foreach ($kandidat->misi as $key=>$misi)
                    <p class="my-1">{{$key+1}}. {{$misi->misi}}</p>
                    @endforeach
                </div>
            </div>
            <div class="detail p-2 ">
                <button class="text-blue-500 cursor-pointer btn-sctive" wire:click="openDataKandidat({{$kandidat->id}})">Edit >></butto>
            </div>
        </div>
        @empty
        <p class="poppins-regular">---Empty---</p>
        @endforelse
        {{-- @endforeach  --}}
    </div>

    @if ($showKandidatDetail)
    <div  id="mdl" class="mdl w-max h-max z-10 fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <div class="mdl-content w-[1000px] px-4 py-2 bg-[#F0F1F1] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <div class="mdl-head flex align-middle justify-between items-center">
                <h4 class="p-auto">Edit</h4>
                <span wire:click="closeModals()" class="mdi mdi-close before:text-[#636363] cursor-pointer"></span>
            </div>
            <div class="mdl-body">
                <form wire:submit.prevent="update">
                    <div class="">
                        <label for="no_kandidat">No Kandidat</label>
                        <input id="no_kandidat" name="no_kandidat" type="number" value="{{$curentKandidat->no_kandidat}}">
                    </div>
                    <div class="">
                        <label for="name">Nama</label>
                        <input id="name" name="name" type="text" value="{{$curentKandidat->name}}">
                    </div>
                    <div class="">
                        <label for="visi">Visi</label>
                        <input id="visi" name="visi" type="text" value="{{$curentKandidat->visi}}">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-active">Submit</button>
                    </div>
                </form>
            </div>
            <div class="mdl-footer">
                <div class=""></div>
                
            </div>
        </div>
    </div>
    @endif

    @if ($showKandidatAdd)
    <div  id="mdl" class="mdl mdl w-max h-max z-10 fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <div class="mdl-content w-[1000px] px-4 py-2 bg-[#F0F1F1] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] rounded-md">
            <div class="mdl-head flex align-middle justify-between items-center my-2">
                <h4 class="p-auto">Tambah Kandidat</h4>
                <span wire:click="$js.closeModals" class="mdi mdi-close before:text-[#636363] cursor-pointer"></span>
            </div>
            <div class="mdl-body flex flex-row-reverse my-2">
                <div class="image-preview w-[40%] @if(!$image) border @endif flex align-middle items-center justify-center">
                    @if ($image)
                        <img src="{{$image->temporaryUrl()}}" alt="">
                    @else
                        <p class="text-gray-500 text-[1.12rem]">Image Preview</p>
                    @endif
                </div>
                <form wire:submit.prevent="createKandidat" class="w-[60%]">
                    <div class="flex flex-col w-[100%] justify-between my-3 ">
                        <label 
                        class="text-[1.2rem]"
                        for="poster" class="font-bold">Foto Kandidat</label>
                        <input type="file" name="poster" wire:model="image"
                        class="w-[90%] px-2 py-2"
                        autocomplete="off"
                        >
                    </div>
                    <div class="flex flex-col w-[100%] justify-between my-3 ">
                        <label 
                        class="text-[1.2rem]"
                        for="no_kandidat">No Kandidat</label>
                        <input id="no_kandidat" name="no_kandidat" type="number" wire:model="noKandidat" required
                        class="w-[90%] px-2 py-2"
                        autocomplete="off" required
                        >
                    </div>
                    <div class="flex flex-col w-[100%] justify-between my-3 ">
                        <label 
                        class="text-[1.2rem]"
                        for="name">Nama</label>
                        <input id="name" name="name" type="text" wire:model="name" required
                        class="w-[90%] px-2 py-2"
                        autocomplete="off" required
                        >
                    </div>
                    <div class="flex flex-col w-[100%] justify-between my-3 ">
                        <label 
                        class="text-[1.2rem]"
                        for="visi">Visi</label>
                        <input id="visi" name="visi" type="text" wire:model="visi" required
                        class="w-[90%] px-2 py-2"
                        autocomplete="off" required
                        >
                    </div>
                    <div class="flex w-[50%] mx-auto align-middle justify-between my-2">
                        <button type="submit" class="px-4 py-2 mx-2 poppins-regular rounded btn-active text-white bg-blue-500">Tambah</button>
                        <button type="Reset"  class="px-4 py-2 mx-2 poppins-regular rounded btn-active text-white bg-red-500" wire:click="clear()">Clear</button>
                    </div>
                </form>
            </div>
            <div class="mdl-footer">
                <div class=""></div>
                
            </div>
        </div>
    </div>
    @endif

    @if ($showKandidatDelete)
        <div id="mdl" class="mdl w-max h-max z-10 fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <div class="mdl-content min-w-[500px] max-w-[1000px] px-4 py-4 bg-[#F0F1F1] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] rounded-md">
                <div class="mdl-head flex align-middle justify-between items-center my-2">
                    <h4 class="p-auto">Hapus Kandidat</h4>
                    <span wire:click="$js.closeModals" class="mdi mdi-close text-center before:text-[#636363] cursor-pointer"></span>
                </div>
                <div class="mdl-body">
                    <p class="text-[1rem] text-gray-600 poppins-regular">Apakah yakin ingin menghapusnya ??</p>
                </div>
                <div class="mdl-footer flex justify-around pt-3">
                    <button 
                    wire:click="closeModals()"
                    class="btn-active px-4 py-2 rounded text-white poppins-regular bg-red-500">Tidak</button>
                    <button 
                    wire:click="delete()"
                    class="btn-active px-4 py-2 rounded text-white poppins-regular bg-blue-500">Hapus</button>
                </div>
            </div>
        </div>
    @endif

    @if ($showKandidatDetail || $showKandidatAdd || $showKandidatDelete)
        <div id="mdl-bacdrop" class="mdl-backdrop " wire:click="closeModals()"></div>
    @endif
</div>

@script
<script>
    $js('closeModals', () => {
        mdl = document.getElementById("mdl")
        mdl_bacdrop = document.getElementById("mdl-bacdrop")
        if(mdl.style.opacity = "1"){
            mdl.style.opacity = "0"
            mdl_bacdrop.style.opacity = "0"
        }

        setTimeout(() => {
            $wire.closeModals()
        }, 100);

    })
</script>
@endscript
