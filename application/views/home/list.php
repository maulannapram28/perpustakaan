      <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

<?php $i=1; foreach($slider as $slider) { ?>


        <div class="item <?php if($i==1) { echo "active"; } ?>">
          <img class="first-slide" src="<?php echo base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?php echo $slider->judul_berita ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $slider->judul_berita ?></h1>
              <p><?php echo character_limiter($slider->isi,100) ?></p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url('berita/read/'.$slider->slug_berita) ?>" role="button">Read more</a></p>
            </div>
          </div>
        </div>

<?php $i++; } ?>        

      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-7">
          <div class="panel 
          panel-default">
             <div class="panel-body">
              <div class="row">
                <div class="col-md-2"></div>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-responsive img-thumbnail">
                </div>
                <div class="col-md-8 posting">
                   <h2><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a></h2>
                    <p><?php echo character_limiter($berita->isi,200) ?></p>
                    <p><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">Baca detail...</a></p>
                  </div>
               </div>
            </div>
            </div>


      <div class="panel-default">
             <div class="panel-body">
          <h2>Pencarian Buku</h2>

            <p class="alert alert-success">
              <i class="glyphicon glyphicon-warning-sign"></i> Ketik kata kunci
            </p>

         <form action="" method="post" class="form-inline text-center">
          <input type="text" name="cari" class="form-control" placeholder="Kata kunci" required>
          <input type="submit" name="submit" class="btn btn-success" value="Cari buku">
           
         </form>
        </div>
      </div>

      <div class="panel-default">
             <div class="panel-body">
              <h2>Link Perpustakaan</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione qui officia, neque molestias similique dignissimos error porro illo explicabo. Atque facilis commodi odio illo dolorem esse blanditiis quibusdam nulla rerum!</p>
            </div>
          </div>
        </div>

          <div class="row buku"></div>
          <div class="col-lg-5">
          <div class="panel-default">
          <div class="panel-body">
              <h2>Buku Baru</h2>

           <?php $a=1; foreach($buku as $buku) { ?>
          <!-- Buku <?php echo $a ?> -->
          <div class="row">
            <div class="col-md-4">
              <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>">
              <img class="img-thumbnail img-rounded" src="<?php if($buku->cover_buku=="") { echo base_url('assets/perpus/image/gambar.png'); }else{ echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku);} ?>" alt="<?php echo $buku->judul_buku ?>">
            </a>
            </div>
            <div class="col-md-8">
              <h4><a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a></h4>
              <p><?php echo character_limiter($buku->ringkasan,60) ?> </p>
            </div>
            <div class="clearfix"></div>
            <hr>
          </div>

           <!-- End Buku <?php echo $a ?> -->
           <?php $a++; } ?>
            <p>
              <a href="<?php echo base_url('katalog') ?>" class="btn btn-primary btn-block">
              <i class="glyphicon glyphicon-book"></i>Lihat Semua Koleksi</a>
            </p>



        </div>
        </div>
      </div>
    </div>
