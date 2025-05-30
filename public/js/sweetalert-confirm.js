// Fungsi untuk konfirmasi penghapusan dengan SweetAlert
function confirmDelete(event) {
    event.preventDefault(); // Menghentikan form submit default

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika dikonfirmasi, submit form
            event.target.closest("form").submit();
        }
    });
}

// Fungsi untuk konfirmasi logout dengan SweetAlert
function confirmLogout(event) {
    event.preventDefault(); // Menghentikan form submit default

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan keluar dari sesi ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, logout",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika dikonfirmasi, submit form
            event.target.submit();
        }
    });
}

// Inisialisasi untuk semua tombol hapus dengan class 'btn-delete'
document.querySelectorAll(".btn-delete").forEach((button) => {
    button.addEventListener("click", confirmDelete);
});

// Inisialisasi untuk semua form logout
document.querySelectorAll(".form-logout").forEach((form) => {
    form.addEventListener("submit", confirmLogout);
});
