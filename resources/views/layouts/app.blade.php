<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'App' }}</title>

    <!-- ✅ Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- 🔹 Tambahkan CSS opsional agar tombol ❌ kecil dan rapi -->
    <style>
        .toast-close {
            color: #fff !important;
            font-size: 20px !important;
            margin-right: 10px !important;
            opacity: 0.8 !important;
        }
        .toast-close:hover {
            opacity: 1 !important;
            transform: scale(1.1);
        }
        .custom-toastify {
            animation: slideDownFade 0.6s ease forwards;
        }
        @keyframes slideDownFade {
            from {
                opacity: 0;
                transform: translateY(-40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <!-- ✅ Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // === Notifikasi SUCCESS ===
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3500,
                gravity: "top",
                position: "center",
                stopOnFocus: true,
                close: false, 
                backgroundColor: "linear-gradient(135deg, #e0b5cbff, #da8fb5ff, #ce8cadff)", 
                className: "custom-toastify",
                style: {
                    fontSize: "20px",
                    padding: "16px 34px",
                    borderRadius: "20px",
                    boxShadow: "0 10px 25px rgba(0,0,0,0.25)",
                    maxWidth: "520px",
                    textAlign: "center",
                    fontWeight: "700",
                    color: "#fff",
                    marginTop: "100px",
                    opacity: "0.97",
                    border: "2px solid #fbcfe8",
                    transition: "transform 0.4s ease, opacity 0.4s ease",
                }
            }).showToast();
        @endif

        // === Notifikasi ERROR ===
        @if(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3500,
                gravity: "top",
                position: "center",
                stopOnFocus: true,
                close: true,
                backgroundColor: "linear-gradient(135deg, #fca5a5, #f87171, #ef4444)",
                className: "custom-toastify",
                style: {
                    fontSize: "30px",
                    padding: "15px 40px",
                    borderRadius: "20px",
                    boxShadow: "0 10px 25px rgba(0,0,0,0.25)",
                    maxWidth: "520px",
                    textAlign: "center",
                    fontWeight: "700",
                    color: "#fff",
                    marginTop: "100px",
                    opacity: "0.97",
                    border: "2px solid #ef4444",
                    transition: "transform 0.4s ease, opacity 0.4s ease",
                }
            }).showToast();
        @endif
    });
    </script>
</body>
</html>
