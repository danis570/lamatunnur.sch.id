<!-- Footer Ala Mazer (Tanpa Background - Perbaikan Rata Tengah) -->
<footer class="bg-transparent mt-5 border-top">
    <div class="container py-4 d-flex flex-column flex-md-row justify-content-between align-items-center text-muted fs-7">

        <!-- Left (Ditambahkan text-center agar tidak patah kaku ke kiri saat di HP) -->
        <p class="mb-0 text-center text-md-start">
            &copy; <?= date('Y') ?> MADRASAH DINIYAH TAKMALIYAH AWALIYAH
        </p>

        <!-- Right (Ditambahkan justify-content-center agar menu ikut ke tengah di HP) -->
        <div class="d-flex gap-3 mt-3 mt-md-0 justify-content-center">
            <a href="#" class="text-secondary text-decoration-none link-hover-mazer transition">Tentang</a>
            <a href="#" class="text-secondary text-decoration-none link-hover-mazer transition">Kontak</a>
            <a href="#" class="text-secondary text-decoration-none link-hover-mazer transition">Privacy</a>
        </div>
    </div>
</footer>

<style>
    .link-hover-mazer:hover {
        color: #158684 !important;
    }
    .fs-7 {
        font-size: 0.875rem;
    }
    .transition {
        transition: color 0.2s ease-in-out;
    }
</style>

</body>
</html>
