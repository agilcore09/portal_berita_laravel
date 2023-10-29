// proses insert data js



$('#proses').on("submit", (e) => {

    e.preventDefault();
    const judul = $('#judul').val();
    const gambar = $('#gambar').val();
    const berita = $('#berita').val();
    // mengubah judul menjadi slug yang akan di cari
    const slug = judul.replace(/\s+/g, '-');
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: '/tambah-berita',
        type: 'POST',
        cache: false,
        data: {
            "judul_berita": judul,
            "body_berita": berita,
            "slug": slug,
            "_token": token
        },

        success: function (response) {
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil menyimpan data',
                icon: 'success',
                confirmButtonText: 'Kembali'
            })
            $('#judul').val('');
            $('#berita').val('');
        },

        error: function (error) {
            // mendapatkan alert jika ada yang kosong
            Swal.fire({
                title: 'Error!',
                text: 'lengkapi Form Kosong',
                icon: 'warning',
                confirmButtonText: 'Perbaiki'
            });

            if (error.responseJSON.body_berita[0]) {
                $("#berita").addClass('is-invalid');
                $('#berita').val('')
            }
            else if (error.responseJSON.judul_berita[0]) {
                $("#judul").addClass('is-invalid');
                $('#judul').val('')
            }

            if (error.responseJSON.body_berita[0] && error.responseJSON.judul_berita[0]) {
                $("#berita").addClass('is-invalid');
                $('#berita').val('')
                $("#judul").addClass('is-invalid');
                $('#judul').val('')
            }
        }

    })
});