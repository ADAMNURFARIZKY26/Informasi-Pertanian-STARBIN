<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .main-content {
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .icon {
            width: 80px;
            height: 80px;
            background-color: #06926f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            position: relative;
        }

        .icon::after {
            content: '✉';
            color: white;
            font-size: 36px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 32px;
            font-weight: 600;
        }

        .subtitle {
            color: #666;
            margin-bottom: 40px;
            font-size: 18px;
            line-height: 1.5;
        }

        .email-display {
            color: #06926f;
            font-weight: 600;
        }

        .verification-form {
            margin: 40px 0;
        }

        .code-inputs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .code-input {
            width: 70px;
            height: 70px;
            border: 3px solid #e1e5e9;
            border-radius: 12px;
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: #333;
            background: white;
            transition: all 0.3s ease;
            outline: none;
        }

        .code-input:focus {
            border-color: #06926f;
            box-shadow: 0 0 0 4px rgba(6, 146, 111, 0.15);
            transform: scale(1.08);
        }

        .code-input.filled {
            background-color: #f0f9f6;
            border-color: #06926f;
            color: #06926f;
        }

        .verify-button {
            width: 100%;
            max-width: 350px;
            padding: 18px;
            background-color: #06926f;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .verify-button:hover {
            background-color: #057a5e;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(6, 146, 111, 0.4);
        }

        .verify-button:active {
            transform: translateY(-1px);
        }

        .verify-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .resend-section {
            margin-top: 50px;
        }

        .resend-text {
            color: #666;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .resend-button {
            background: none;
            border: none;
            color: #06926f;
            font-weight: 600;
            cursor: pointer;
            text-decoration: underline;
            font-size: 16px;
            transition: color 0.3s ease;
            padding: 5px;
        }

        .resend-button:hover {
            color: #057a5e;
        }

        .timer {
            color: #999;
            font-size: 14px;
            margin-top: 10px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 12px;
            border: 2px solid #c3e6cb;
            margin-bottom: 25px;
            display: none;
            font-weight: 500;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 12px;
            border: 2px solid #f5c6cb;
            margin-bottom: 25px;
            display: none;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 0 10px;
            }

            h1 {
                font-size: 28px;
            }

            .subtitle {
                font-size: 16px;
            }

            .code-input {
                width: 55px;
                height: 55px;
                font-size: 22px;
            }

            .code-inputs {
                gap: 10px;
            }

            .verify-button {
                font-size: 16px;
                padding: 16px;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(6, 146, 111, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(6, 146, 111, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(6, 146, 111, 0);
            }
        }

        .slide-in {
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="main-content slide-in">
        <div class="icon pulse"></div>

        <h1>Verifikasi Email</h1>
        <p class="subtitle">
            Kami telah mengirimkan kode verifikasi 6 digit ke email Anda<br>
            <span class="email-display">example@email.com</span>
        </p>

        @if (session('success'))
        <div class="success-message">
            ✅ {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="error-message">
            ❌ {{ session('error') }}
        </div>
        @endif

        <form class="verification-form" id="verificationForm" method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <div class="code-inputs">
                <input type="text" class="code-input" name="digit1" maxlength="1" id="code1">
                <input type="text" class="code-input" name="digit2" maxlength="1" id="code2">
                <input type="text" class="code-input" name="digit3" maxlength="1" id="code3">
                <input type="text" class="code-input" name="digit4" maxlength="1" id="code4">
                <input type="text" class="code-input" name="digit5" maxlength="1" id="code5">
                <input type="text" class="code-input" name="digit6" maxlength="1" id="code6">
            </div>

            <button type="submit" class="verify-button" id="verifyButton" disabled>
                Verifikasi Kode
            </button>
        </form>

        <div class="resend-section">
            <p class="resend-text">Tidak menerima kode?</p>
            <form method="POST" action="{{ route('otp.resend') }}">
                @csrf
                <button type="submit" class="resend-button">Kirim Ulang Kode</button>
            </form>
            <div class="timer" id="timer"></div>
        </div>
    </div>

    <script>
        const codeInputs = document.querySelectorAll('.code-input');
        const verifyButton = document.getElementById('verifyButton');
        const resendButton = document.getElementById('resendButton');
        const timer = document.getElementById('timer');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');
        const verificationForm = document.getElementById('verificationForm');

        let resendTimer = 60;
        let timerInterval;

        // Auto focus dan navigasi antar input
        codeInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const value = e.target.value;

                // Hanya izinkan angka
                if (!/^\d*$/.test(value)) {
                    e.target.value = '';
                    return;
                }

                // Tambah class filled jika ada value
                if (value) {
                    input.classList.add('filled');
                    // Auto focus ke input berikutnya
                    if (index < codeInputs.length - 1) {
                        codeInputs[index + 1].focus();
                    }
                } else {
                    input.classList.remove('filled');
                }

                checkAllInputsFilled();
            });

            input.addEventListener('keydown', (e) => {
                // Backspace - pindah ke input sebelumnya
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    codeInputs[index - 1].focus();
                }

                // Arrow keys navigation
                if (e.key === 'ArrowLeft' && index > 0) {
                    codeInputs[index - 1].focus();
                }
                if (e.key === 'ArrowRight' && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').replace(/\D/g, '');

                if (pastedData.length === 6) {
                    codeInputs.forEach((inp, i) => {
                        inp.value = pastedData[i] || '';
                        if (inp.value) {
                            inp.classList.add('filled');
                        }
                    });
                    checkAllInputsFilled();
                }
            });
        });

        function checkAllInputsFilled() {
            const allFilled = Array.from(codeInputs).every(input => input.value.length === 1);
            verifyButton.disabled = !allFilled;
        }

        function startResendTimer() {
            resendButton.disabled = true;
            resendTimer = 60;

            timerInterval = setInterval(() => {
                timer.textContent = `Kirim ulang dalam ${resendTimer} detik`;
                resendTimer--;

                if (resendTimer < 0) {
                    clearInterval(timerInterval);
                    timer.textContent = '';
                    resendButton.disabled = false;
                }
            }, 5000);
        }

        function showMessage(type, show = true) {
            successMessage.style.display = type === 'success' && show ? 'block' : 'none';
            errorMessage.style.display = type === 'error' && show ? 'block' : 'none';
        }

        function resetForm() {
            codeInputs.forEach(input => {
                input.value = '';
                input.classList.remove('filled');
            });
            verifyButton.disabled = true;
            codeInputs[0].focus();
        }

        // // Event listeners
        // verificationForm.addEventListener('submit', async (e) => {
        //     e.preventDefault();

        //     const code = Array.from(codeInputs).map(input => input.value).join('');

        //     try {
        //         const response = await fetch("{{ route('otp.verify') }}", {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        //             },
        //             body: JSON.stringify({ code })
        //         });

        //         const data = await response.json();

        //         if (data.success) {
        //             window.location.href = data.redirect; // Redirect ke dashboard atau halaman sukses
        //         } else {
        //             showMessage('error');
        //             setTimeout(() => {
        //                 showMessage('error', false);
        //                 resetForm();
        //             }, 3000);
        //         }
        //     } catch (err) {
        //         console.error(err);
        //         showMessage('error');
        //     }
        // });

        // resendButton.addEventListener('click', async () => {
        //     try {
        //         const response = await fetch("{{ route('otp.resend') }}", {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        //             },
        //         });

        //         const data = await response.json();

        //         if (data.success) {
        //             alert('Kode verifikasi baru telah dikirim ke email Anda!');
        //             startResendTimer();
        //             resetForm();
        //         }
        //     } catch (err) {
        //         alert('Terjadi kesalahan saat mengirim ulang kode.');
        //     }
        // });

        // Inisialisasi
        codeInputs[0].focus();
        startResendTimer();
    </script>
</body>

</html>