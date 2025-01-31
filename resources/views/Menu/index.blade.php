@extends('templates.layout')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMenu">
                <i class="fas fa-plus"></i> Tambah Menu
            </button>
            @include('menu.data')
        </div>
    </div>
</section>
@endsection

@include('menu.form')
@include('menu.edit')

@push('script')
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    $(function() {
        // dialog hapus data
        $('.delete-data').on('click', function(e) {
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            // console.log('nama')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama}</b> akan di hapus?`,
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak',
                'showDenyButton': true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#modalEdit').on('show.bs.modal', function(e) 
        {
            console.log('edi')
            let button = $(e.relatedTarget)
            let id = $(button).data('id')
            let nama_menu = $(button).data('nama_menu')
            let harga = $(button).data('harga')
            let image = $(button).data('image')
            let deskripsi = $(button).data('deskripsi')
            let jenis_id = $(button).data('jenis_id')

            $(this).find('#nama_menu').val(nama_menu)
            $(this).find('#harga').val(harga)
            $(this).find('#image').val(image)
            $(this).find('#deskripsi').val(deskripsi)
            $(this).find('#jenis_id').val(jenis_id)

            $('.form-edit').attr('action',`{{ url("menu") }}/${id}`)
        })
    })
</script>
@endpush