<?php require('header.php') ?>
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-4">
                  <div class="text-bg">
                     <h1><?= $se['tulisan1']?> <br>
                        <?= $se['tulisan2']?> <br>
                         <span style="font-weight: 800; color: #ff822e;"><?= $se['tulisan3']?>  </span>
                        <?= $se['tulisan4']?><br>
                       
                     </h1>
                     <!-- <a href="#contact">Contact Us</a> -->
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="text-img">
                     <figure><img src="images/<?= $se['gambar1'] ?>" /></figure>
                  </div>
                  <div class="text-img1">
                     <figure><img src="images/<?= $se['gambar2'] ?>" alt="#"/></figure>
                  </div>
                  <div class="text-img">
                     <figure><img src="images/<?= $se['gambar3'] ?>" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- end asked -->
<?php require('footer.php') ?>