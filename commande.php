
      <?php include_once('include/menu.php'); ?>


      <style media="screen">
      .confirm {
        width: 125px;
        height: 125px;
        background-color: #3c8eb9;
        position: fixed;
        border-radius: 50%;
        border: 15px solid #efefef;
        bottom: 25px;
        right: 25px;
        z-index: 5000;
        background-image: url('img/valid.png');
        background-position: center;
        background-size: 50%;
        background-repeat: no-repeat;
        cursor: pointer;
        -moz-box-shadow: 1px 1px 5px 2px #cfcfcf;
        -webkit-box-shadow: 1px 1px 5px 2px #cfcfcf;
        -o-box-shadow: 1px 1px 5px 2px #cfcfcf;
        box-shadow: 1px 1px 5px 2px #cfcfcf;
        filter:progid:DXImageTransform.Microsoft.Shadow(color=#cfcfcf, Direction=134, Strength=5);
      }
      </style>

      <div class="main-wrap">
          <!-- Ouvrir / Fermer le menu sidebar catégories roduits -->
          <input id="slide-sidebar" type="checkbox" role="button" />
          <label for="slide-sidebar"></label>

          <!-- Menu sidebar catégories roduits -->
          <div class="sidebar">

            <ul>
              <?php
              $categ=$servicerestaurant->getAllProductsCategories();
              foreach($categ as $cat)
              {
                  $categorie=new Categorie($db);
                  $categorie->fetch($cat);
                  echo "<a class=\"chercher\" href=\"#\" name=\"$categorie->label\"><li>$categorie->label</li></a>";
              }
              ?>
            </ul>
          </div>

          <!-- Bouton de confirmation en bas a droite-->
          <div class="confirm">

          </div>

          <!-- Titre -->
          <div class="main-container">
            <h2 class="text-center">
              Comande n°1<br>
              <span class="fa-stack ">
                  <i class="fa fa-angle-down fa-stack-2x faa-float animated blue"></i>
              </span>
            </h2>
            <div id="allProducts" >

            </div> <!-- All Products -->
            <?php
            foreach($categ as $cat)
            {
                $categorie->fetch($cat);
                if($_GET['cat'] == "$categorie->label") {
                  $subCat=$servicerestaurant->getAllProductByCategorie($cat);
                  foreach($subCat as $subC)
                  {
                      $product=new Product($db);
                      $product->fetch($subC);
                      ?>
                      <section id="section"class="col-lg-12 col-sm-12 produits" style="height: auto; margin-bottom: 50px; background-color: #d1d5d8; padding-top: 20px; padding-left: 10px; padding-right: 10px; padding-bottom: 20px;">
                        <div class="col-lg-4 col-sm-12">
                          <h3 style="margin: 0px;"><?php echo $product->label; ?></h3>
                          <p><?php echo $product->description; ?></p>
                          <p><br><b>Stock disponible : <input type="text" name="stock" value="<?php echo substr($product->price,0,5); ?>" style="background-color: rgba(255,255,255,0); border: none;"></b></p>
                        </div>
                        <div class="col-lg-4 col-sm-12" style="height: 120px;">
                          <textarea style="margin: 0px; height: 120px; width: 100%; border: none; padding: 15px;" class="col-lg-12 infos-sup" name="name" rows="8" cols="80" placeholder="Ajouter des informations complémentaires"></textarea>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                          <div class="col-lg-4 col-sm-4 moins" style="cursor: pointer; background-color: #3c8eb9; height: 120px; font-size: 5vmin; text-align: center; vertical-align: middle; line-height: 120px;">
                            -
                          </div>
                          <div class="col-lg-4 col-sm-4 count" style="background-color: white; height: 120px; font-size: 5vmin; text-align: center; vertical-align: middle; line-height: 120px;">
                            0
                          </div>
                          <div class="col-lg-4 col-sm-4 plus" style="cursor: pointer; background-color: #3c8eb9; height: 120px; font-size: 5vmin; text-align: center; vertical-align: middle; line-height: 120px;">
                            +
                          </div>
                        </div>
                      </section>
                      <?php
                  }
                }
            }
            ?>


          </div>
      </div>

      <script src="less/dist/less.js" type="text/javascript"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
      <script src="js/color.js"></script>
      <script src="js/cat.js"></script>


  </body>
</html>
