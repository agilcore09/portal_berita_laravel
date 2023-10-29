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
            alert(response.message)
            console.log(response)
        },

        error: function (error) {

            console.log(error.responseJSON.judul_berita[0])
            if (error.responseJSON.judul_berita[0]) {
                alert(`Judul Masih kosong`);
            }

            else if (error.responseJSON.body_berita[0]) {
                alert(`Isi Masih kosong`);
            }
        }

    })
});