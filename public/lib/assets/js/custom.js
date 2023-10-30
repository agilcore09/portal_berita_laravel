// memotorng string yang ada di body
const cutOff = $('.cut-off');

for (const test of cutOff) {
    if (test.innerHTML.length >= 50) {
        let cut = test.innerHTML.slice(0, 60);
        test.innerHTML = cut + "<br><span class='text-danger'> selengkapnya ... </span>"
    }
}

// memotong string ada di judul jika terlalu panjang
const cutHead = $('.cut-head');
for (const head of cutHead) {
    if (head.innerHTML.length >= 26) {
        let cut = head.innerHTML.slice(0, 24);
        head.innerHTML = cut + "..."
    }
}
