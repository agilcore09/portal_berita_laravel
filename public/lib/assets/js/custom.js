// proses insert data js



$('#proses').on("submit", (e) => {

    e.preventDefault();
    const judul = $('#judul').val();
    const gambar = $('#gambar').val();
    const berita = $('#berita').val();
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: '/tambah-berita',
        type: 'POST',
        cache: false,
        data: {
            "judul_berita": judul,
            "body_berita": berita,
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

            console.log(error.responseJSON.body_berita[0])

            if (error.responseJSON.body_berita[0]) {
                $("#berita").addClass('is-invalid');
            }
            if (error.responseJSON.judul_berita[0]) {
                $("#judul").addClass('is-invalid');
            }
        }

    })
});