// Fungsi untuk konfirmasi penghapusan dengan SweetAlert
function confirmDelete(event) {
    event.preventDefault(); // Menghentikan form submit default

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#0066cc", // Brutalist blue
        cancelButtonColor: "#004080", // Darker blue
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        background: "#e6f2ff", // Light blue background
        borderRadius: "0", // Sharp edges for brutalist style
        customClass: {
            popup: "brutalist-modal",
            title: "brutalist-title",
            confirmButton: "brutalist-button",
            cancelButton: "brutalist-button",
        },
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
        confirmButtonColor: "#0066cc", // Brutalist blue
        cancelButtonColor: "#004080", // Darker blue
        confirmButtonText: "Ya, logout",
        cancelButtonText: "Batal",
        background: "#e6f2ff", // Light blue background
        borderRadius: "0", // Sharp edges for brutalist style
        customClass: {
            popup: "brutalist-modal",
            title: "brutalist-title",
            confirmButton: "brutalist-button",
            cancelButton: "brutalist-button",
        },
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

document.getElementById("downloadBtn").addEventListener("click", function (e) {
    e.preventDefault();

    // Tampilkan loading
    Swal.fire({
        title: "Mempersiapkan file",
        text: "Template sedang disiapkan...",
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });

    // Simpan URL download
    const downloadUrl = this.href;

    // Buat iframe tersembunyi untuk trigger download
    const iframe = document.createElement("iframe");
    iframe.style.display = "none";
    iframe.src = downloadUrl;
    document.body.appendChild(iframe);

    // Asumsikan download selesai dalam 5 detik
    setTimeout(() => {
        Swal.close();
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Template berhasil diunduh",
            confirmButtonText: "OK",
        });
        document.body.removeChild(iframe);
    }, 1200);
});
