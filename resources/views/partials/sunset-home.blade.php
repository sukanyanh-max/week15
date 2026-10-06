<section class="sunset-home" aria-labelledby="welcome-title">
    <div class="sunset-eyebrow">✦ Creative Space · Laravel Development ✦</div>
    <div class="sunset-hero">
        <p class="text-uppercase fw-semibold mb-2">Sukanya's Web Studio</p>
        <h1 id="welcome-title">ยินดีต้อนรับสู่เว็บไซต์ของเรา</h1>
        <p><strong>สร้างสรรค์ด้วยความใส่ใจ พัฒนาสู่มาตรฐาน</strong> พื้นที่รวบรวมแบบฝึกหัด ชิ้นงานทดลอง และโปรเจกต์ Laravel ของ นางสาวสุกัญญา เนียมหอม</p>
    </div>
    <nav class="sunset-nav-tiles" aria-label="ทางลัดหน้าแรก">
        @if (Route::has('author.blog'))
            <a class="sunset-tile" href="{{ route('author.blog') }}">
                <span class="tile-icon">📰</span>
                <span class="tile-label">บทความของฉัน</span>
            </a>
        @elseif (Route::has('blog'))
            <a class="sunset-tile" href="{{ route('blog') }}">
                <span class="tile-icon">📰</span>
                <span class="tile-label">บทความของฉัน</span>
            </a>
        @else
            <div class="sunset-tile">
                <span class="tile-icon">✨</span>
                <span class="tile-label">{{ config('student.full_name_th') }}</span>
            </div>
        @endif
        @if (Route::has('products.index'))
            <a class="sunset-tile" href="{{ route('products.index') }}">
                <span class="tile-icon">🛍️</span>
                <span class="tile-label">Product Lab</span>
            </a>
        @elseif (Route::has('about'))
            <a class="sunset-tile" href="{{ route('about') }}">
                <span class="tile-icon">✨</span>
                <span class="tile-label">About Me</span>
            </a>
        @else
            <div class="sunset-tile">
                <span class="tile-icon">🆔</span>
                <span class="tile-label">{{ config('student.student_id') }}</span>
            </div>
        @endif
        @if (Route::has('books.index'))
            <a class="sunset-tile" href="{{ route('books.index') }}">
                <span class="tile-icon">📚</span>
                <span class="tile-label">Book Shelf</span>
            </a>
        @elseif (Route::has('student.profile'))
            <a class="sunset-tile" href="{{ route('student.profile', config('student.student_id')) }}">
                <span class="tile-icon">👤</span>
                <span class="tile-label">My Profile</span>
            </a>
        @else
            <div class="sunset-tile">
                <span class="tile-icon">🚀</span>
                <span class="tile-label">Laravel Course</span>
            </div>
        @endif
    </nav>
</section>