// ===== Hamburger menu (JS-driven, menggantikan checkbox hack) =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;
    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}



function initHapusConfirm() {
    document.addEventListener("submit", function (e) {
        const form = e.target;
        if (!form.classList.contains("form-hapus")) return;
        const row = form.closest("tr");
        const name = row ? row.querySelector("td")?. textContent : "this data";
        const sure = confirm("Sure wants to delete \"" + name + "\"?");
        if (!sure) {
            e.preventDefault();
        }
    });
}





// ===== Filter/pencarian tabel real-time =====
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;
    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

// ===== Validasi form (client-side) =====
function tampilkanError(input, message) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = message;
    input.insertAdjacentElement("afterend", span);
}
function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}
function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;
    form.addEventListener("submit", function (e) {
        let valid = true;
        const judul = form.querySelector("[name='title'], [name='name']");
        if (judul && judul.value.trim() === "") {
            tampilkanError(judul, "Field ini wajib diisi.");
            valid = false;
        } else if (judul) {
            hapusError(judul);
        }
        // ...(pengecekan pengarang, tahun, stok dengan pola serupa)...
        if (!valid) {
            e.preventDefault();
        }
    });
}