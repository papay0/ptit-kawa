<section id="slider-wrapper" class="layer-slider-wrapper">
    <div id="layerslider" style="width:100%;height:500px;">
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <!-- slide background -->
            <img src="vues/images/slider/fw-1.jpg" class="ls-bg" alt="Slide background"/>

            <!-- Right Image -->
            <img src="vues/images/prv/logoPK.png" class="ls-l" style="top:58%; left:70%;" data-ls="offsetxin:0;offsetyin:250;durationin:950;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" alt="Image layer">

            <!-- Left Text -->
            <h3 class="ls-l title" style="width: 500px; top: 79px; left: 160px; height: auto; font-size: 36px; line-height: 46px; padding: 0px; border-width: 0px; margin-left: 0px; margin-top: 0px; -webkit-transform-origin: 50% 50% 0px; -webkit-transform: matrix3d(1.2, 0, 0, 0, 0, 1.2, 0, 0, 0, 0, 1, -0.002, 0, -8, 0, 1); opacity: 1; visibility: hidden; filter: none;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                Le site du P’tit Kawa !
            </h3>
            <h3 class="ls-l subtitle" style="top:40%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:1500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">PK 2014-2015</h3>
            <p class="ls-l text-standard" style="width:500px; top:55%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:2500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                Le PK est un club rattaché à l’Amicale de l’INSA de Toulouse. Pour en savoir plus sur le PK, rends-toi dans la rubrique About Us.
            </p>
            <a href="index.php?page=about" class="btn btn-two btn-lg ls-l" style="top:75%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:3500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" target="_blank">About Us</a>
        </div>

        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <img src="vues/images/slider/fw-1.jpg" class="ls-bg" alt="Slide background"/>
            <img class="ls-l" style="top:157px;left:284px;white-space: nowrap;" data-ls="offsetxin:300;durationin:2000;offsetxout:-300;parallaxlevel:-1;" src="vues/images/slider/l1.png" alt="">
            <img class="ls-l" style="top:20px;left:50%;white-space: nowrap;" data-ls="offsetxin:600;durationin:2000;offsetxout:-600;parallaxlevel:1;" src="vues/images/slider/l2.png" alt="">
            <img class="ls-l" style="top:37px;left:564px;white-space: nowrap;" data-ls="offsetxin:900;durationin:2000;offsetxout:-900;parallaxlevel:4;" src="vues/images/slider/l3.png" alt="">
            <p class="ls-l" style="top:170px;left:174px;font-weight: 300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;color:#ffffff;background:#f04705;border-radius:3px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:10;">
                <?php
                global $bdd;
                $reponse = $bdd->query('SELECT (phrase_biereDuMois) FROM `phrases`');
                $donnees = $reponse->fetch()
                ?>
                <?php echo $donnees['phrase_biereDuMois']; ?>
            </p>
            <br/>
            <br/>
            <p class="ls-l" style="top:210px;left:183px;font-family:'Indie Flower';font-size:31px;color:#f04705;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:2000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% top 0;offsetxout:-400;parallaxlevel:8;">
                Bière du mois !
            </p>

        </div>

        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <!-- slide background -->
            <img src="vues/images/slider/fw-1.jpg" class="ls-bg" alt="Slide background"/>

            <!-- Right Image -->
            <!-- <img src="images/prv/human-img-4.png" class="ls-l" style="top:48%; left:70%;" data-ls="offsetxin:0;offsetyin:250;durationin:950;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" alt="Image layer"> -->

            <!-- Left Text -->
            <h3 class="ls-l title" style="width:500px; top:15%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">Le PK, bien plus qu’un bar ! </h3>
            <h3 class="ls-l list-item" style="top:28%; left:80px;" data-ls="offsetxin: left; rotatein: 90;durationin:1000;delayin:1500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                <i class="fa fa-check-circle-o"></i> Une équipe toujours là pour te servir
            </h3>
            <h3 class="ls-l list-item" style="top:35%; left:80px;" data-ls="offsetxin: left; rotatein: 90;durationin:1000;durationin:1000;delayin:2000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                <i class="fa fa-check-circle-o"></i> Des soirées endiablées
            </h3>
            <h3 class="ls-l list-item" style="top:42%; left:80px;" data-ls="offsetxin: left; rotatein: 90;durationin:1000;durationin:1000;delayin:2500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                <i class="fa fa-check-circle-o"></i> Des semaines à thèmes
            </h3>
            <h3 class="ls-l list-item" style="top:49%; left:80px;" data-ls="offsetxin: left; rotatein: 90;durationin:1000;durationin:1000;delayin:3000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                <i class="fa fa-check-circle-o"></i> Des tournois et évènements sportifs retransmis
            </h3>
            <p class="ls-l text-standard" style="width:500px; top:65%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:3500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                Si tu ne l’as pas encore fait, pense à venir acheter au bar la carte softs+cafés, ou encore le t-shirt du bar, ou bien tout simplement le pack, qui réunit les deux !
            </p>
            <a href="index.php?page=vetements" class="btn btn-two btn-lg ls-l" style="top:84%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:4000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" target="_blank">T-shirt</a>
            <a href="index.php?page=boissons" class="btn btn-two btn-lg ls-l" style="top:84%; left:320px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:4000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" target="_blank">Carte</a>
        </div>
    </div>
</section>
<section class="slice bg-2 p-15">
    <div class="cta-wr">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    global $bdd;
                    $reponse = $bdd->query('SELECT (phrase_slider) FROM `phrases`');
                    $donnees = $reponse->fetch()
                    ?>

                    <h1>
                        <?php echo $donnees['phrase_slider']; ?>
                    </h1>
                </div>
                <div class="col-md-4">
                    <a href="albumPhoto/albumPhoto.php" class="btn btn-one btn-lg pull-right" title="" href="" target="blank">
                        <i class="fa fa-hand-o-right"></i> PHOTOS
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>