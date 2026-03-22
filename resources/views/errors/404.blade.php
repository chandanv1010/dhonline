@extends('frontend.homepage.layout')

@section('content')
<style>
    :root {
        --primary-color: #016D87;
        --secondary-color: #DC143C;
        --accent-color: #00B9FF;
        --glass-bg: rgba(255, 255, 255, 0.75);
        --glass-border: rgba(255, 255, 255, 0.4);
    }

    .error-404-page {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f4f8;
        position: relative;
        overflow: hidden;
        padding: 40px 20px;
    }

    /* Animated Background Blobs */
    .bg-blobs {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .blob {
        position: absolute;
        width: 500px;
        height: 500px;
        background: var(--primary-color);
        filter: blur(80px);
        opacity: 0.15;
        border-radius: 50%;
        animation: move 20s infinite alternate;
    }

    .blob-1 { top: -100px; left: -100px; background: var(--primary-color); }
    .blob-2 { bottom: -100px; right: -100px; background: var(--secondary-color); animation-delay: -5s; }
    .blob-3 { top: 50%; left: 50%; transform: translate(-50%, -50%); background: var(--accent-color); opacity: 0.1; animation-delay: -10s; }

    @keyframes move {
        from { transform: translate(0, 0) scale(1); }
        to { transform: translate(100px, 50px) scale(1.1); }
    }

    .error-404-container {
        max-width: 900px;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .error-404-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        padding: 80px 50px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    .error-404-header {
        position: relative;
        margin-bottom: 30px;
    }

    .error-404-number {
        font-size: clamp(120px, 15vw, 200px);
        font-weight: 900;
        font-family: 'Asap', sans-serif;
        line-height: 0.8;
        letter-spacing: -5px;
        margin-bottom: 10px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .error-404-title {
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 800;
        color: #1a202c;
        margin-bottom: 20px;
        font-family: 'Asap', sans-serif;
    }

    .error-404-text {
        font-size: 18px;
        color: #4a5568;
        max-width: 600px;
        margin: 0 auto 40px;
        line-height: 1.7;
        font-family: 'Quicksand', sans-serif;
    }

    .error-404-actions {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-bottom: 50px;
    }

    .btn-action {
        padding: 16px 36px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 16px;
        text-decoration: none !important;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: 'Quicksand', sans-serif;
    }

    .btn-home {
        background: var(--primary-color);
        color: #fff !important;
        box-shadow: 0 10px 20px -5px rgba(1, 109, 135, 0.4);
    }

    .btn-home:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -5px rgba(1, 109, 135, 0.5);
        background: #015F77;
    }

    .btn-back {
        background: #fff;
        color: var(--primary-color) !important;
        border: 2px solid var(--primary-color);
    }

    .btn-back:hover {
        transform: translateY(-5px);
        background: var(--primary-color);
        color: #fff !important;
    }

    /* Modern Search Bar */
    .error-search-box {
        max-width: 500px;
        margin: 0 auto;
        position: relative;
    }

    .error-search-form {
        display: flex;
        background: #fff;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        padding: 6px;
        transition: all 0.3s ease;
    }

    .error-search-form:focus-within {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(1, 109, 135, 0.1);
    }

    .error-search-input {
        flex: 1;
        border: none;
        padding: 10px 25px;
        font-size: 16px;
        border-radius: 50px;
        outline: none;
        font-family: 'Quicksand', sans-serif;
    }

    .error-search-btn {
        background: var(--primary-color);
        color: #fff;
        border: none;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .error-search-btn:hover {
        background: #015F77;
    }

    @media (max-width: 640px) {
        .error-404-card {
            padding: 50px 25px;
        }
        
        .error-404-actions {
            flex-direction: column;
            gap: 15px;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="error-404-page">
    <div class="bg-blobs">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="error-404-container">
        <div class="error-404-card">
            <div class="error-404-header">
                <div class="error-404-number">404</div>
            </div>
            
            <h1 class="error-404-title">Rất tiếc! Không tìm thấy trang</h1>
            <p class="error-404-text">
                Có vẻ như trang bạn đang truy cập không tồn tại hoặc đã được di chuyển. 
                Hãy thử tìm kiếm thông tin bên dưới hoặc quay lại trang chủ.
            </p>

            <div class="error-404-actions">
                <a href="{{ route('home.index') }}" class="btn-action btn-home">
                    <i class="fa-solid fa-house"></i> Quay về trang chủ
                </a>
                <a href="javascript:history.back()" class="btn-action btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại trang trước
                </a>
            </div>

            <div class="error-search-box">
                <form class="error-search-form" action="{{ route('product.catalogue.search') }}" method="GET">
                    <input 
                        type="text" 
                        name="keyword" 
                        class="error-search-input" 
                        placeholder="Tìm ngành học, khóa học..."
                        required
                    >
                    <button type="submit" class="error-search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
