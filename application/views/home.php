<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>OPEN RECRUITMENT BEM KM FASILKOM</title>

    <link href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Theme Freelancer CSS -->
    <link href="<?= base_url('assets/css/freelancer.css') ?>" rel="stylesheet">

    <!-- Theme Grayscale CSS -->
    <link href="<?= base_url('assets/css/grayscale.css') ?>" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>">

    <link rel="shortcut icon" href="<?= base_url('assets/img/bem.png') ?>">

    <script type="text/javascript" src="<?= base_url('assets/jquery/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/inc/TimeCircles.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/inc/TimeCircles.css') ?>" />

    <style type="text/css">
        body{
            background-color: white;
            color: black !important; 
        }
        #cd {
            color: black;
            margin-top: -30%; 
            /*background-color: rgba(252, 174, 7, 0.2);*/
            border-radius: 20%; 
        }

        .intro{
            background: url(<?= base_url('assets/img/header.png') ?>) no-repeat bottom center scroll;
            background-size: contain;
            height: 800px;
            -moz-background-size: 1400px 1100px;
            background-size: 1400px 1100px;
        }
        ul li {
            font-size: 18px;
            list-style: none;
            margin-bottom: 3%;
        }
        ul li a{color: black;}
        .box{
            min-width: 300px; min-height: 400px;
            border: 10px double #FD7F04;
            margin-top: -8%;
        }
        .box2{
            min-width: 300px; min-height: 400px;
            border: 10px groove #FD7F04;
            margin-top: -8%;
        }
        .gambar img{
            width: 300px; height: 320px;
        }
        .centered-form{
            margin-top: 60px;
        }

        .centered-form .panel{
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        }
        #black li a{
            color: #3D3A3A; 
            font-family: "Comic Sans MS", "Century Gothic";
        }
        #black li a:hover{
            background-color: #FD7F04; 
        }
        .logo_utama{
            width:50px; height: 50px; float: left;
            padding: -2%;
      }
      .logo_utama img{
        width:50px; height: 50px; 
        border-radius: 50%;
      }
        .coun{
            margin-top: 30%;
        }
    </style>

    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <style type="text/css">
        .logo_utama{
            width:50px; height: 50px; float: left;
            padding: 1%;
          }
          .logo_utama img{
            width:50px; height: 50px;
          }
    </style>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container" style="color: black;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a href="<?= base_url('') ?>">
                    <div class="logo_utama">
                      <img src="<?= base_url('assets/img/bem.png') ?>">
                    </div>
                  </a>
                <a class="navbar-brand page-scroll" href="http://bem.ilkom.unsri.ac.id">
                    <span class="light">BEM KM FASILKOM</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown">
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#"><i class="fa fa-smile-o"></i> 
                            Tentang <span class="caret"></span>
                        </a>
                        <!-- <a tabindex="-1" class="page-scroll" href="#about">About</a> -->
                        <ul class="dropdown-menu" style="background-color: white;" id="black">
                            <li><a tabindex="-1" class="page-scroll" href="#Kesekretariatan">Kesekretariatan</a></li>
                            <li><a class="page-scroll" href="#PSDM">PSDM</a></li>
                            <li><a class="page-scroll" href="#PTI">PTI</a></li>
                            <li><a class="page-scroll" href="#Sosmas">Sosial dan Masyarakat</a></li>
                            <li><a class="page-scroll" href="#Senbut">Seni dan Olahraga</a></li>
                            <li><a class="page-scroll" href="#kwu">Kewirausahaan</a></li>
                            <li><a class="page-scroll" href="#akademik">Akademik</a></li>
                            <li><a class="page-scroll" href="#Kastrad">Kajian Strategi dan Advokasi</a></li>
                            <li><a class="page-scroll" href="#Polstrad">Politik Kajian Strategi</a></li>
                            <li><a class="page-scroll" href="#Adkam">Advokasi Kampus</a></li>
                            <li><a class="page-scroll" href="#Medinfo">Media dan Informasi</a></li>
                            <li><a class="page-scroll" href="#Humas">Hubungan Masyarakat</a></li>
                            <li><a class="page-scroll" href="#Mulmed">Multimedia</a></li>
                        </ul>
                    </li>

                    <?php 
                        $nim = $this->session->userdata('nim');
                        $role = $this->session->userdata('role');
                        if(isset($nim, $role)): 
                    ?>
                        <?php if($role == 'super admin'): ?>
                            <li><a href="<?= base_url('super_admin') ?>"><i class="fa fa-home"></i> Dasbor</a></li>
                        <?php elseif($role == 'admin'): ?>
                            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Dasbor</a></li>
                        <?php elseif($role == 'mhs'): ?>
                            <li><a href="<?= base_url('peserta') ?>"><i class="fa fa-book"></i> Formulir</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a class="page-scroll" href="#daftar"><i class="fa fa-user"></i> Daftar</a></li>
                        <li><a href="<?= base_url('login') ?>"><i class="fa fa-sign-in"></i> Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <style type="text/css">
        #coming img{
            width: 100%; height: 680px;
            /*margin-bottom: -2%;*/
        }
    </style>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <!-- <div class="row" style="margin-bottom: -5%;">
                <div class="col-md-6 col-lg-offset-2">
                     <div>
                        <?php 
                            $msg = $this->session->flashdata('msg');

                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                </div>
            </div> -->
            <div class="row" id="coming">
                <div class="col-md-8 col-sm-8 col-lg-offset-2">
                    <img src="<?= base_url('assets/img/oprec.jpg') ?>">
                </div>
            </div>
            <!-- <div class="container" style="margin-top: -10%;">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-md-offset-2">
                        <div class="coun">
                            <div id="cd" class="cd" data-date="2017-01-10 24:00:00"></div>
                            <script type="text/javascript">
                                $(".cd").TimeCircles();
                            </script>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </header>
    <style type="text/css">
        .logoo img{
            width: 100%; height: 100%;
        }
        #inti{
            margin-top: -20%;
            background: url(<?= base_url('assets/img/header.png') ?>) no-repeat bottom center scroll;
            background-size: contain;
            height: 1000px;
            -moz-background-size: 1400px 1000px;
            background-size: 1400px 1000px;
        }
        #inti img{
            width: 100%; height: 900px;
        }
    </style>

    <section class="content-section text-center" id="inti">
        <img src="<?= base_url('assets/img/dinas/inti.png') ?>">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-offset-2">
                <a href="#about" class="btn btn-circle page-scroll" style="color: black;">
                    <i class="fa fa-angle-double-down animated" style="color: black;"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="container content-section text-center" style="color: black;">
        <div class="row"  style="text-align: center; margin-bottom: 5%; margin-top: -15%;">
            <div class="col-md-2 logoo">
                <img src="<?= base_url('assets/img/Unsri.png') ?>">
            </div>
            <div class="col-md-8">
                <div style="font-size: 40px;">
                    <h1>Dinas dan Divisi <br>BEM KM Fasilkom <br> Universitas Sriwijaya</h1>
                </div>
            </div>
            <div class="col-sm-2 logoo">
                <img src="<?= base_url('assets/img/bem.png') ?>">
            </div>
        </div>
        <div class="row" style="color: black !important;">
            <div class="col-lg-4 col-lg-offset-2">
                <ul>
                    <li style="color: black;"><a class="page-scroll" href="#Kesekretariatan">Kestari</a></li>
                    <li style="color: black;"><a class="page-scroll" href="#PSDM">PSDM</a></li>
                    <li><a class="page-scroll" href="#PTI">PTI</a></li>
                    <li><a class="page-scroll" href="#Sosmas">Sosmas</a></li>
                    <li><a class="page-scroll" href="#Senbut">Seni dan Olahraga</a></li>
                    <li><a class="page-scroll" href="#kwu">KWU</a></li>
                    <li><a class="page-scroll" href="#akademik">Akademik</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul>
                    <li><a class="page-scroll" href="#Kastrad">Kajian Strategi dan Advokasi</a></li>
                    <li><a class="page-scroll" href="#Polstrad">Politik Kajian Strategi</a></li>
                    <li><a class="page-scroll" href="#Adkam">Advokasi Kampus</a></li>
                    <li><a class="page-scroll" href="#Medinfo">Media dan Informasi</a></li>
                    <li><a class="page-scroll" href="#Humas">Hubungan Masyarakat</a></li>
                    <li><a class="page-scroll" href="#Mulmed">Multimedia</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Kestari Section -->
    <section id="Kesekretariatan" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%; margin-bottom: 5%;">
                <div class="col-md-6 gambar">
                    <img src="<?= base_url('assets/img/dinas/kestari.png') ?>">
                </div> 
                <div class="col-md-6">
                <h1><strong>Kestari</strong></h1>
                    <p>
                        Dinas kesekretariatan merupakan dinas yang mengurus surat menyurat serta mengurus urusan rumah tangga BEM KM Fasilkom Unsri.
                    </p>
                </div>               
            </div>
        </div>
    </section>

    <!-- PSDM  Section -->
    <section id="PSDM" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%;">
                <div class="col-md-6 gambar">
                    <img src="<?= base_url('assets/img/dinas/psdm.png') ?>">
                </div>                
                <div class="col-md-6">
                <h1><strong>PSDM</strong></h1>
                    <p>
                        Dinas Pengembangan Sumber Daya Mahasiswa (PSDM) merupakan salah satu  Dinas yang bergerak di Internal BEM KM FASILKOM UNSRI yang Bertanggung Jawab dalam perkembangan kualitas dan eksistansi kader-kader dan sumber daya mahasiswa di dalam BEM KM FASILKOM UNSRI  dan serta berperan penuh menjaga koordinasi yang baik antar dinas demi terciptanya hubungan yang kondusif dan harmonis dengan berlandaskan iman dan taqwa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PTI Section -->
    <section id="PTI" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%; margin-bottom: 5%;">
                <div class="col-md-6 gambar">
                  <img src="<?= base_url('assets/img/dinas/pti.png') ?>">
                </div>
                <div class="col-md-6">
                <h1><strong>PTI</strong></h1>
                    <p>
                        Dinas Pengembangan Teknologi Informasi adalah dinas yang mengutamakan pengembangan teknologi tepat guna untuk BEM KM Fasilkom yang lebih maju.
                    </p>
                </div>                
            </div>
        </div>
    </section>

    <!-- Sosmas  Section -->
    <section id="Sosmas" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%;">
                <div class="col-md-4 gambar" style="margin: 0 auto;">
                    <img src="<?= base_url('assets/img/dinas/sosmas.png') ?>">
                </div>                
                <div class="col-md-8">
                <h1><strong>Sosmas</strong></h1>
                    <p>
                        Departemen Sosial Masyarakat [SOSMAS] adalah departemen yang berfokus melakukan pengabdian dan pelayanan kepada masyarakat, serta melakukan aktivitas sosial yang berkesinambungan dan melakukan kontribusi nyata kepada masyarakat.
                        <br>
                        Fungsi : <br>
                        Sosmas BEM KM Fasilkom 2017 memiliki fungsi sebagai wadah bagi masyarakat, khususnya mahasiswa Fasilkom untuk bergerak dalam gerakan basis. 
                        <br>
                        Tujuan:<br> 
                        Tujuan utama Sosmas adalah memberi kebermanfaatan seluas-luasnya bagi masyarakat. Baik melalui program kerja, maupun Kegiatan-kegiatan taktis lainnya

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Senbut Section -->
    <section id="Senbut" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%; margin-bottom: 5%;">
                <div class="col-md-6 gambar">
                    <img src="<?= base_url('assets/img/dinas/senor.png') ?>">
                </div>  
                <div class="col-md-6">
                <h1><strong>Seni dan Olahraga</strong></h1>
                    <p>
                        Seni dan Olahraga merupakan dinas yang berperan sebagai wadah minat dan bakat bagi para mahasiswa khususnya di bidang seni dan olahraga. Kemudian juga memiliki tugas utk membentuk suatu kegiatan yang berpacu pada inovasi / kreatifitas yang di dasari pada bidang seni dan olahraga.
                    </p>
                </div>              
            </div>
        </div>
    </section>

    <!-- KWU Section -->
    <section id="kwu" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%; min-height: 450px;">
                <div class="col-md-4 gambar" style="margin: 0 auto;">
                    <img src="<?= base_url('assets/img/dinas/kwu.png') ?>">
                </div>                
                <div class="col-md-8">
                <h1><strong>KWU</strong></h1>
                    <p>
                        Dinas Kewirausahaan merupakan dinas intrnal dalam BEM KM Fasilkom yang mempunyai fungsi sebagai media bagi civitas akademika fasilkom unsri dalam mengembangankan kemampuan berwirausaha. dinas kewirausahaan juga menjadi ujung tombak bem km fasilkom dalam mencari pendanaan secara mandiri. dinas keuwirausahaan memiliki tantangan yang dihadapi berupa dunia bisnis dimana kgiatan kewirausahaan dapat berhubungan dengan kegiatan kemahasiswaan atau tidak sama skali. dalam kegiatannya, diberikan kebebasan dalam pengaturan konsep dan eksekusi kegiatan yang tetap berada dalam jalur yang ada dan berlaku. diharapkan pengembangan diri soft skill, hard skill dan pengalaman dalam dinas kewirausahaan akan menghasilkan kader yang ideal terutama dalam bidang entrepreneurship.

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Akademik Section -->  
    <section id="akademik" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%;">
                <div class="col-md-3 gambar" style="margin: 0 auto;">
                   <img src="<?= base_url('assets/img/dinas/akademik.png') ?>">
                </div> 
                <div class="col-md-7 col-md-offset-1">
                <h1><strong>Akademik</strong></h1>
                    <p>
                        Dinas Akademik merupakan salah satu dinas yang ada di dalam kepengurusan Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer Universitas  Sriwijaya periode 2017 yang berfokus pada kegiatan-kegiatan yang bersifat akademik untuk memudahkan pemberian informasi akademik dan menjamin kesejahteraan bagi mahasiswa Fakultas Ilmu Komputer Universitas  Sriwijaya.<br>
                        Fungsi Dinas :
                        <ol style="text-align: left; font-size: 16px;">
                            <li>mampu untuk mengkaji dan menganalisis permasalahan serta isu-isu sosial, politik, ekenomi, ilmu komunikasi, dan teknologi baik dalam skala kampus Universitas Sriwijaya, regional, nasional maupun internasional.</li>
                            <li>meningkatkan peran dan partisipasi aktif dari civitas akademika.</li>
                            <li>mampu untuk mengupayakan pendidikan dan tata kelola organisasi kepada mahasiswa pada umumnya dan organisatoris/lembaga kemahasiswaan pada khususnya</li>
                        </ol>
                    </p>
                </div>               
            </div>
        </div>
    </section>

    <!-- Kastrad Section -->
    <section id="Kastrad" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%; margin-bottom: 5%;">
                <div class="col-md-4 gambar" style="margin: 0 auto;">
                   <img src="<?= base_url('assets/img/dinas/kastrad.png') ?>">
                </div>                
                <div class="col-md-8">
                <h1><strong>Kajian Strategis dan Advokasi</strong></h1>
                    <p>
                       Dinas Kajian Strategis dan advokasi (Kastrad) adalah pusat kajian isu strategis dan advokasi kampus . Kastrad memiliki 2 divisi sekaligus 2 fungsi yaitu:
                       <ol style="text-align: left; font-size: 16px;">
                            <li>
                                Polkrat: merumuskan kajian isu yang ada di fasilkom unsri dan melakukan studi gerakan terhadap isu-isu yang ada di kampus Unsri bahkan sampai ke isu-isu nasional.
                            </li>
                            <li>
                                Adkam:  betugas menjaring aspirasi mahasiswa dan memperjuangkan hak hak mahasiwa yang belum terpenuhi.    
                            </li>
                       </ol>

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Polstrad Section -->
    <section id="Polstrad" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%;">
                <div class="col-md-8 col-md-offset-2">
                <h1><strong>Politik dan Strategi</strong></h1>
                    <p>
                        Dinas polstrad meruskan sebuah dinas yang berperan sebagai motor pergerakan dalam pergerakan mahasiswa Fasilkom Unsri.<br>Divisi ini berorientasi pada kajian yang kreatif dalam membumikan isu, serta responsif dalam gerakan dan tindakan nyata sebaga bentuk kontribusi serta penyikapan terhadap isu politik yang terjadi dalam tigkat universitas , nasional, maupun international.

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Adkam Section -->
    <section id="Adkam" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%;">      
                <div class="col-md-8 col-md-offset-2">
                <h1><strong>Advokasi Kampus</strong></h1>
                    <p>
                       Advokasi kampus adalah media utama penghubung antara mahasiswa dengan pihak kampus, melalui advokasi mahasiswa bisa memberikan aspirasi-aspirasi mereka tentang kampus baik sarana prasarana maupun akademik. Yang tentunya akan di kaji dan di cari tahu solusinya dengan cara rasional logis dan tegas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Medinfo Section -->
    <section id="Medinfo" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%;">
                <div class="col-md-3 gambar" style="margin: 0 auto;">
                    <img src="<?= base_url('assets/img/dinas/medinfo.png') ?>">
                </div> 
                <div class="col-md-6 col-md-offset-1">
                <h1><strong>Media dan Informasi</strong></h1>
                    <p>
                        Media dan Informasi (Medinfo) adalah salah satu dinas di BEM KM Fasilkom Unsri yang mana bertanggung jawab mengenai informasi dan dokumentasi. Dinas ini merupakan dinas yang mendukung BEM KM Fasilkom Unsri dalam menjalankan Visi dan Misinya dari belakang layar agar dapat terlaksana dengan baik. Komunikatif, Informatif, Kreatif dan Apresiatif merupakan hal yang diusung oleh Dinas Medinfo.<br>

                        Struktural Dinas Media dan Informasi terbagi menjadi dua divisi, yaitu Divisi Hubungan Masyarakat dan Divisi Multimedia.<br>
                    </p>
                </div>               
            </div>
        </div>
    </section>

    <!-- Humas Section -->
    <section id="Humas" class="container content-section text-center"  >
        <div class="row box2">
            <div style="margin-top: 5%;">                
                <div class="col-md-8 col-md-offset-2">
                <h1><strong>Hubungan Masyarakat</strong></h1>
                    <p>
                        Divisi Hubungan Masyarakat :
                        <ol style="text-align: left; font-size: 18px;">
                            <li>Bertanggung jawab dalam informasi yang ada di Fakultas maupun diluar Fakultas agar dapat sampai ke Civitas Akademika Fasilkom Unsri</li>
                            <li>Membangun komunikasi antara BEM dan Civitas Akademika Fakultas maupun luar Fakultas</li>
                        </ol>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mulmed Section -->
    <section id="Mulmed" class="container content-section text-center"  >
        <div class="row box">
            <div style="margin-top: 5%;">
                <div class="col-md-8 col-md-offset-2">
                <h1><strong>Multimedia</strong></h1>
                    <p>
                         Divisi multimedia :
                        <ol style="text-align: left; font-size: 16px;">
                            <li>Bertanggung jawab dalam dokumentasi kegiatan</li>
                            <li>Mendukung Divisi Humas dalam mengolah informasi dengan tampilan yang menarik</li>
                        </ol>
                    </p>
                </div>             
            </div>
        </div>
    </section>



    <style type="text/css">
         #footer2 {
            border-color: #FD7F04;
            color: #FFFFFF;
            height: 6%;
            padding-top: 3%;
            padding-bottom: 2%;
            margin-top: 20%;
        }
    </style>

    <!-- Footer -->
    <footer class="text-center" id="footer2">
        <!-- <div class="footer-above" style="background: #FD7F04;">
            <div class="container" style="margin-top: -5%; margin-bottom: -3%;">
                <div class="row" style="font-size: 30px;">
                    <div class="footer-col col-md-4 col-md-offset-4">
                        <h3>Kontak</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/bemilkomunsri/?ref=ts&fref=ts" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/search?q=BEM%20KM%20Fasilkom&src=typd" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="footer-below" style="background-color: #FF5105;">
            <div class="container">
                <div class="row">
                    <div class="pull-left">     
                        &copy; BEM KM Fasilkom Unsri 2016
                    </div>
                    <div class="pull-right">
                        Created by PTI BEM KM Fasilkom Unsri
                    </div>  
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Contact Form JavaScript -->
    <script src="<?= base_url('assets/js/jqBootstrapValidation.js') ?>"></script>
    <script src="<?= base_url('assets/js/contact_me.js') ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/js/classie.js') ?>"></script>
    <script src="<?= base_url('assets/js/cbpAnimatedHeader.js') ?>"></script>

    <!-- Theme Grayscale JavaScript -->
    <script src="<?= base_url('assets/js/grayscale.min.js') ?>"></script>

    <!-- Theme Freelancer JavaScript -->
    <script src="<?= base_url('assets/js/freelancer.min.js') ?>"></script>

    <script type="text/javascript">
        function validAngka(a)
        {
            if(!/^[0-9.]+$/.test(a.value))
            {
            a.value = a.value.substring(0,a.value.length-1000);
            }
        }
    </script>

</body>
</html>
