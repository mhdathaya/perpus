<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="{{asset('css/tentang.css')}}">
    <style>
        body {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="frame">
        <div class="navbar">
            <p>Telkom University</p>
            <p><a href="/login-view" style="text-decoration: none; color: white;">Login</a></p>
        </div>

        <div class="heading">
            <div class="icon-fakultas">
                <img src="{{asset('images/Perpustakaan_Nasional_Republik_Indonesia-removebg-preview.png')}}" alt="">
            </div>

            <div class="hdg1">
                <p><a href="/" style="text-decoration: none;">Beranda</a></p>
                <p><a href="/tentang" style="text-decoration: none; color: black;  ">Tentang</a></p>
                <p><a href="/portofolios" style="text-decoration: none; color: black; ">Portofolio</a></p>
            </div>
        </div>

        <div class="bungkus">
            <div class="teks">
                <p>Sistem Informasi Portofolio</p>
                <p>Platform ini adalah wadah yang berisi koleksi komprehensif dari portofolio dosen-dosen terbaik di Telkom University. Dibangun dengan tujuan untuk memberikan layanan yang memudahkan masyarakat untuk menjelajahi dan mengakses portofolio serta prestasi yang telah dicapai oleh dosen-dosen unggul di universitas ini. Melalui berbagai macam informasi yang tersedia, platform ini memungkinkan untuk melihat beragam karya, penelitian, proyek, dan kontribusi yang telah diberikan oleh dosen-dosen terbaik Telkom University dalam bidangnya masing-masing. Dengan demikian, masyarakat dapat lebih mengenal dan mengapresiasi kontribusi serta keahlian yang dimiliki oleh para pendidik yang menjadi kebanggaan institusi ini."</p>
            </div>

            <div class="image">
                <img src="{{asset('images/logo univ telkom.png')}}" alt="">
            </div>
        </div>

        <div class="box1">
            <div class="bungkus3">
                <p>Kontak</p>
                <img src="{{asset('images/logo telkom km.png')}}" alt="">
                <p>Gedung Bangkit Telkom University Jl. Telekomunikasi Terusan Buah Batu Indonesia 40257, Bandung, Indonesia</p>
                <p>(022) 7566456</p>
                <p>info@telkomuniversity.ac.id</p>
            </div>
        </div>

        <div class="footer">
            <p>© Telkom University | Universitas Swasta Terbaik</p>
        </div>
    </div>
</body>

</html>