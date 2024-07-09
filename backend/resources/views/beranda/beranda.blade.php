<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">

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

        <div class="bungkus1">
            <div class="teks1">
                <p>Telkom University</p>
                <p></p>
                <p>Best private university, Tel-U has several times ranked as the top private university in Indonesia and has been ranked to be one of The Best Universities in Indonesia. Tel-U also became Indonesia's First Private University to be accredited "Excellent" by BAN-PT.</p>
            </div>

            <img src="{{asset('images/logo univ telkom.png')}}" alt="">
        </div>

        <div class="teks2">
            <p>ACADEMIC</p>
        </div>

        <div class="bungkus2">
            <div class="teks3">
                <p>Why Tel-U?</p>
                <p></p>
                <p>Tel-U has been accredited superior, and the study program is already accredited Superior or A.</p>
            </div>

            <div class="teks4">
                <p>About Study Program</p>
                <p></p>
                <p>About the Study Program. Telkom University has 8 vocational programs, 23 undergraduate programs, and 9 post-graduate programs that have been accredited by BAN-PT and International.</p>
            </div>

            <div class="teks5">
                <p>Why Tel-U?</p>
                <p></p>
                <p>Telkom University provides qualified and superior learning support facilities in online learning systems.</p>
            </div>
        </div>

        <div class="box1">
            <div class="bungkus3">
                <p>Kontak</p>
                <img src="{{asset('images/logo telkom km.png    ')}}" alt="">
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