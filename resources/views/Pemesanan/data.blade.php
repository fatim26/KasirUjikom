<!-- <div class="mt-4">
    <table class="table table-striped rounded overflow-hidden" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Meja Id</th>
                <th>Tanggal Pemesanan</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Nama Pemesan</th>
                <th>Jumlah Pelanggan</th>
                <th>Action</th>
            </tr>
        </thead> -->
        <!-- <tbody>
            @foreach ($pemesanan as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $s->meja_id }}</td>
                <td>{{ $s->tanggal_pemesanan }}</td>
                <td>{{ $s->jam_mulai }}</td>
                <td>{{ $s->jam_selesai}}</td>
                <td>{{ $s->nama_pemesan }}</td>
                <td>{{ $s->jumlah_pelanggan }}</td>
                <td>
                    <button type="button" class="btn btn-success btn-size" data-bs-toggle="modal" data-bs-target="#modalEdit" data-mode="edit" 
                    data-id="{{ $s->id }}" 
                    data-meja_id="{{ $s->meja_id }}" 
                    data-tanggal_pemesanan="{{ $s->tanggal_pemesanan }}"
                    data-jam_mulai="{{ $s->jam_mulai }}" 
                    data-jam_selesai="{{ $s->jam_selesai }}"
                    data-nama_pemesan="{{ $s->nama_pemesan }}"  
                    data-jumlah_pelanggan="{{ $s->jumlah_pelanggan }}" -->

                    >
                        <!-- <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('menu.destroy', $s->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data btn-size" data-id="{{ $s->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> -->