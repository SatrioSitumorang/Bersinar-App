function confirmDelete(positionId) {
    const swalInit = swal.mixin({
        buttonsStyling: false,
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-danger",
            denyButton: "btn btn-light",
        },
    });
    swalInit
        .fire({
            title: "Apakah Anda Yakin?",
            text: "Data yang dihapus tidak dapat dipulihkan kembali!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
        })
        .then((result) => {
            if (result.isConfirmed) {
                const deleteForm = document.getElementById(
                    "delete-form-" + positionId
                );
                if (deleteForm) {
                    deleteForm.submit();
                    swalInit.fire({
                        title: "Hapus Berhasil!",
                        text: "Data sudah dihapus!",
                        icon: "success",
                        showConfirmButton: false,
                    });
                } else {
                    Swal.fire("Error!", "Delete form not found.", "error");
                }
            }
        });
}
