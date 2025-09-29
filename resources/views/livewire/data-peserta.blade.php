<div class="container m-4 mx-auto p-4">
    
    <div class="my-3 bg-body p-3 rounded shadow-sm">
        
        <div class="heading">
            <h2 class="poppins-medium text-[#2e3131]">Data Peserta</h2>
        </div>
        <div class="search flex gap-4 p-0">
            <input type="text" class="w-1/4 py-2 px-3 mb-4 rounded-sm border outline-gray-800 bg-transparent" placeholder="Search..." wire:model.live="kataKunci">
            <select name="voteStatus" id="voteStatus" 
            class="w-1/4 py-2 px-3 mb-4 rounded-sm border outline-gray-800 bg-transparent focus:border-gray-700"
            wire:model.change='voteStatus'
            >
                <option value="">Vote Status...</option>
                <option value="belum">belum</option>
                <option value="sudah">sudah</option>
            </select>
            <select name="kelas" id="kelas" 
            class="w-1/4 py-2 px-3 mb-4 rounded-sm border outline-gray-800 bg-transparent focus:border-gray-700"
            wire:model.change='kelas'
            >
                <option value="">Kelas...</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
            <select name="jurusan" id="jurusan" 
            class="w-1/4 py-2 px-3 mb-4 rounded-sm border outline-gray-800 bg-transparent focus:border-gray-700"
            wire:model.change='jurusan'
            >
                <option value="">Jurusan...</option>
                <option value="RPL">RPL</option>
                <option value="TSM">TSM</option>
                <option value="DKV">DKV</option>
                <option value="TKKR">TKKR</option>
                <option value="MP">MP</option>
                <option value="BD">BD</option>
                <option value="AK">AK</option>
            </select>
            @if ($voteStatus  || $jurusan || $kelas || $kataKunci)                
            <span class="poppins-regular text-center h-[45px] rounded bg-blue-500 cursor-pointer mdi mdi-refresh" wire:click="refresh()"></span>
            @endif
        </div>
        <div class="flex justify-center space-x-2 mt-4">
            {{-- Tombol "Previous" --}}
            @if ($dataPeserta->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 cursor-not-allowed rounded">Prev</span>
            @else
                <button wire:click="previousPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Prev</button>
            @endif
        
            {{-- Nomor Halaman --}}
            @foreach ($dataPeserta->links()->elements[0] as $page => $url)
                @if ($page == $dataPeserta->currentPage())
                    <span class="px-4 py-2 bg-blue-700 text-white font-bold rounded">{{ $page }}</span>
                @else
                    <button wire:click="gotoPage({{ $page }})" class="px-4 py-2 bg-gray-200 hover:bg-gray-400 rounded">{{ $page }}</button>
                @endif
            @endforeach
        
            {{-- Tombol "Next" --}}
            @if ($dataPeserta->hasMorePages())
                <button wire:click="nextPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Next</button>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 cursor-not-allowed rounded">Next</span>
            @endif
        </div>
                {{-- <p>{{$voteStatus}}</p>
        <p>{{$kelas}}</p>
        <p>{{$jurusan}}</p> --}}
        <table class="table table-striped table-sortable mt-4">
            <thead class="bg-[#0080EC] text-[#ebf1ff]">
                <tr>
                    <th class="w-[5% ] align-middle border poppins-regular border-b-1 border-gray-700">No</th>
                    <th class="w-[20%] align-middle border poppins-regular border-b-1 border-gray-700">NISN</th>
                    <th class="w-[35%] align-middle border poppins-regular border-b-1 border-gray-700">Nama</th>
                    <th class="w-[10%] align-middle border poppins-regular border-b-1 border-gray-700">Kelas</th>
                    <th class="w-[10%] align-middle border poppins-regular border-b-1 border-gray-700">Jurusan</th>
                    <th class="w-[10%] align-middle border poppins-regular border-b-1 border-gray-700">Vote Status</th>
                    <th class="w-[10%] align-middle border poppins-regular border-b-1 border-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $dataPeserta as $key=>$valueData)    
                <tr>
                    <td class="w-[5% ] align-middle font-light border poppins-regular">{{$key+1}}</td>
                    <td class="w-[20%] align-middle font-light border poppins-regular">{{$valueData->nisn}}</td>
                    <td class="w-[35%] align-middle font-light border poppins-regular">{{$valueData->name}}</td>
                    <td class="w-[10%] align-middle font-light border poppins-regular">{{$valueData->kelas}}</td>
                    <td class="w-[10%] align-middle font-light border poppins-regular">{{$valueData->jurusan}}</td>
                    <td class="w-[10%] align-middle font-light border poppins-regular">{{$valueData->vote_status}}</td>
                    <td class="w-[10%] align-middle font-light border poppins-regular">
                        <a 
                        wire:click="edit({{$valueData->id}})" 
                        data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning btn-sm mdi mdi-account-edit text-2xl"></a>
                        <a wire:click="openDeleteModal({{$valueData->id}})"
                        {{-- wire:click="delete({{$valueData->id}})" --}}
                        class="btn btn-danger btn-sm mdi mdi-delete"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center space-x-2 mt-4">
            {{-- Tombol "Previous" --}}
            @if ($dataPeserta->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 cursor-not-allowed rounded">Prev</span>
            @else
                <button wire:click="previousPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Prev</button>
            @endif
        
            {{-- Nomor Halaman --}}
            @foreach ($dataPeserta->links()->elements[0] as $page => $url)
                @if ($page == $dataPeserta->currentPage())
                    <span class="px-4 py-2 bg-blue-700 text-white font-bold rounded">{{ $page }}</span>
                @else
                    <button wire:click="gotoPage({{ $page }})" class="px-4 py-2 bg-gray-200 hover:bg-gray-400 rounded">{{ $page }}</button>
                @endif
            @endforeach
        
            {{-- Tombol "Next" --}}
            @if ($dataPeserta->hasMorePages())
                <button wire:click="nextPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Next</button>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 cursor-not-allowed rounded">Next</span>
            @endif
        </div>
    </div>
    {{-- Edit Modal --}}
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Updated form in data-peserta.blade.php -->
                    <form wire:submit.prevent="update" class="flex-col w-96">
                        @csrf
                        <div class="mb-4">
                            <label for="nisn" class="px-2 pt-4">NISN</label>
                            <input 
                                type="number" 
                                id="nisn"
                                wire:model.defer="nisn" 
                                class="w-[100%] h-10 p-2 border-2 border-[#cecece] focus:border-none focus:outline-gray-500 transition-all duration-500 ease-in"
                            >
                            @error('nisn') 
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="px-2 pt-4">Nama</label>
                            <input 
                                type="text" 
                                id="name"
                                wire:model.defer="name" 
                                class="w-[100%] h-10 p-2 border-2 border-[#cecece] focus:border-none focus:outline-gray-500 transition-all duration-500 ease-in"
                            >
                            @error('name') 
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="button-x flex mt-4 gap-4">
                            <button type="submit" class="btn px-4 font-semibold btn-primary" data-bs-dismiss="modal">
                                Submit
                            </button>
                            <button type="button" wire:click="clear" class="btn px-4 font-semibold btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade @if($showDeleteModal) show @endif" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" wire:click="closeModals"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModals">Batal</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#exampleModal').modal('hide');
        });
    </script>
    @endpush
    {{-- modal backdrop --}}
    @if($showDeleteModal)
    <div class="modal-backdrop fade show"></div>
    @endif
    
</div>
