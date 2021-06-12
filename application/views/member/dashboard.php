<center><b><h1>SUMBANGAN TI USU</h1></b></center>
<center><b><h2>Halaman Member</h2></b></center>
<br><div class="col-md-8 col-md-offset-2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>       
            </ol>
 
            <!-- deklarasi carousel -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                
            <center>
                <?php $this->load->helper('html'); ?>
                <?php echo img('satu.jpg'); ?>
                </center>
                <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <?php $this->load->helper('html'); ?>
                    <?php echo img('dua.jpg'); ?>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <?php $this->load->helper('html'); ?>
                    <?php echo img('tiga.jpg'); ?>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <?php $this->load->helper('html'); ?>
                    <?php echo img('empat.jpg'); ?>
                    <div class="carousel-caption">
                    </div>
                </div>                   
            </div>
 
            <!-- membuat panah next dan previous -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
   </div>