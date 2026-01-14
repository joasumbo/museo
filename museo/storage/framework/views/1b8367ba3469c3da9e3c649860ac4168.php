<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="loader-logo">
            <img src="<?php echo e(asset('assets/img/Logo_MMA.png')); ?>" alt="Museu Municipal de Alcanena">
        </div>
        <div class="loader-spinner">
            <div class="spinner"></div>
        </div>
        <p class="loader-text">A carregar...</p>
    </div>
</div>

<style>
    /* Preloader Styles */
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    .preloader.loaded {
        opacity: 0;
        visibility: hidden;
    }

    .preloader-inner {
        text-align: center;
    }

    .loader-logo {
        margin-bottom: 30px;
        animation: fadeInDown 0.8s ease;
    }

    .loader-logo img {
        width: 120px;
        height: auto;
        filter: drop-shadow(0 5px 15px rgba(212, 165, 116, 0.3));
        animation: pulse 2s ease-in-out infinite;
    }

    .loader-spinner {
        margin: 30px 0;
    }

    .spinner {
        width: 60px;
        height: 60px;
        margin: 0 auto;
        border: 4px solid rgba(212, 165, 116, 0.2);
        border-top-color: #d4a574;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .loader-text {
        color: #d4a574;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 20px;
        animation: fadeIn 0.8s ease 0.3s both;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<script>
    // Preloader
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            setTimeout(function() {
                preloader.classList.add('loaded');
            }, 500);
        }
    });
</script>
<?php /**PATH C:\laravel_projects\museo\resources\views/components/preloader.blade.php ENDPATH**/ ?>