<div class="container mx-auto p-6 m-6 rounded-xl bg-slate-50">
    @if (session()->has('error'))
        <div class="py-2 rounded-lg">
            <div class="bg-red-300 rounded-md">
                <li 
                class="text-gray-800 p-5"
                >
                    {{session('error')}}
                </li>
            </div>
        </div>
    @endif
    <div class="card-container flex flex-wrap items-center justify-between border-solid align-middle md:flex">
        {{-- foreach card --}}
        @foreach ($kandidatList as $kandidat)
            <div class="card flex-col items-center p-3 justify-evenly transition-all duration-300 border-2 border-gray-600 rounded-xl
            {{$kandidatSelected == $kandidat->id ? 'scale-95 ring-4 ring-blue-600 border-transparent' : 'scale-100'}}
            ">
                <div
                wire:click="selectKandidat({{$kandidat->id}})"
                class="card w-[400px] max-h-max flex-row items-center border-solid 
                ">
                    <p class="font-bold text-center text-[2rem] w-[50px] h-[50px] rounded-full border-2 solid border-black justify-self-center">{{$kandidat->no_kandidat}}</p>
                    <p class="text-center font-bold text-[1.5rem] p-1">{{$kandidat->name}}</p>
                    <img src="{{asset('assets/foto-kadidat/kadidat-1.jpeg')}}" alt="" 
                    class="rounded-xl min-[200px]:"
                    >
                </div>
            </div>
        @endforeach
        {{-- end foreach card --}}
    </div>

    <div class="modal fade " id="exampleModal" aria-labelledby="exampleModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismis="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <div class="mt-1 flex align-middle justify-center space-x-4">
        <button
        wire:click="clear()"
        class="bg-gray-700 text-white py-2 px-7 rounded-[5px] active:scale-95 transition-all"
        >
        Clear
        </button>

        <button
        wire:click="pilih()"
        wire:click="app/Livewire/ChartPemilihan::class"
        class="bg-green-600 text-white py-2 px-7 rounded-[5px] active:scale-95 transition-all"
        @if ($vote_status === 'sudah')
            data-bs-target="exampleModal"
        @endif
        >
        Pilih
        </button>
    </div>

    @if ($kandidatSelected)     
    <div class="visi-misi p-6 mt-4 flex-col gap-4 bg-slate-200 rounded-lg">
        <div class="flex justify-between px-10">
            <div class="visi flex-col w-[48%]">
                <p>Visi</p>
                <p>{{$visi}}</p>
                {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit ex, sapiente praesentium consequuntur labore quod deserunt repudiandae impedit illo quibusdam! Magni unde autem sed eveniet animi excepturi pariatur accusantium! A!</p> --}}
            </div>
            <div class="misi flex-col w-[48%]">
                <p>misi</p>
                <ul>
                    @foreach ($misis as $misi )
                        <li>{{$misi->misi}}</li> <br>
                    @endforeach
                </ul>
                {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur porro ipsa iure facilis aliquam veritatis et atque delectus dolorem, quasi voluptatem voluptatibus modi odio autem vitae cum illo blanditiis? Repellat.</p> --}}
            </div>
        </div>
        <div class="w-[100%] flex items-center justify-center pt-6">
            <button
            wire:click="$set('showVisiMisi', false)"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors"
            >
                Close
            </button>
        </div>
    </div>
    @endif
</div>
