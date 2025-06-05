<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" rel="icon">
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
        }

        /* Animated background elements */
        .bg-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: linear-gradient(45deg, #06926f, #0aa87a);
            border-radius: 50%;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            right: 30%;
            animation-delay: 1s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-20px) rotate(120deg);
            }

            66% {
                transform: translateY(10px) rotate(240deg);
            }
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(6, 146, 111, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 146, 111, 0.1);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .image-container {
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #06926f, #0aa87a);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .image-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            50% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }

            100% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
        }

        .image-placeholder {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            position: relative;
            z-index: 2;
        }

        .error-code {
            font-size: clamp(80px, 15vw, 120px);
            font-weight: 800;
            color: #06926f;
            margin: 20px 0;
            text-shadow: 0 4px 20px rgba(6, 146, 111, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 4px 20px rgba(6, 146, 111, 0.3);
            }

            to {
                text-shadow: 0 4px 30px rgba(6, 146, 111, 0.6);
            }
        }

        .error-title {
            font-size: clamp(24px, 4vw, 32px);
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .error-message {
            font-size: clamp(16px, 2.5vw, 18px);
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .back-button {
            background: linear-gradient(135deg, #06926f, #0aa87a);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(6, 146, 111, 0.3);
            position: relative;
            overflow: hidden;
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .back-button:hover::before {
            left: 100%;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(6, 146, 111, 0.4);
        }

        .back-button:active {
            transform: translateY(-1px);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 30px 20px;
            }

            .image-container {
                width: 150px;
                height: 150px;
                margin-bottom: 20px;
            }

            .image-placeholder {
                width: 90px;
                height: 90px;
                font-size: 36px;
            }

            .back-button {
                padding: 12px 30px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px 15px;
            }

            .image-container {
                width: 120px;
                height: 120px;
            }

            .image-placeholder {
                width: 70px;
                height: 70px;
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="image-container">
            <div class="image-placeholder">
                📁
            </div>
        </div>

        <div class="error-code">404</div>

        <h1 class="error-title">Halaman Tidak Ditemukan</h1>

        <p class="error-message">
            Maaf, halaman yang Anda cari tidak dapat ditemukan.<br>
            Mungkin halaman telah dipindahkan atau tidak lagi tersedia.
        </p>

        <button class="back-button" onclick="goBack()">
            ← Kembali ke Halaman Sebelumnya
        </button>
    </div>

    <script>
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                // Fallback jika tidak ada history sebelumnya
                window.location.href = '/';
            }
        }

        document.addEventListener('mouseleave', function() {
            const container = document.querySelector('.container');
            container.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg)';
        });
    </script>
</body>

</html>