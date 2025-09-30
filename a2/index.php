<?php
include('includes/db_connect.inc')
include('includes/header.inc')
include('includes/nav.inc')
?>


    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>SkillSwap</h1>
                <p>Browse the latest skills shared by our community</p>
            </div>
        </div>
    
        <div class="row">
            <div id="Main" class="carousel slide" data-bs-ride="carousel">
                <button class="carousel-control-prev" type="button" data-bs-target="#Main" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#Main" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/skills/1.png" alt="Guitar" class="d-block w-100">
                        <div class="carousel-caption caption">
                            <h3>Guitar</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/skills/2.png" alt="Guitar2?" class="d-block w-100">
                        <div class="carousel-caption">
                            <h3>Guitar2?</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/skills/3.png" alt="Baking" class="d-block w-100">
                        <div class="carousel-caption">
                            <h3>Baking</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/skills/4.png" alt="Also Baking" class="d-block w-100">
                        <div class="carousel-caption">
                            <h3>Also Baking</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="skillSection col-12 col-sm-6 col-md-3">
                    <p class="skill">Intro to PHP & MySQL</p>
                    <p>Rate: $55.00/HR</p>
                    <button class="btn btn-dark text-light rounded-4 skill"> View Details</button>
                </div>
                <div class="skillSection col-12 col-sm-6 col-md-3">
                    <p class="skill">Intermediate Fingestyle</p>
                    <p>Rate: $45.00/HR</p>
                    <button class="btn btn-dark text-light rounded-4 skill"> View Details</button>
                </div> 
                <div class="skillSection col-12 col-sm-6 col-md-3">
                    <p class="skill">Artisan Bread Baking</p>
                    <p>Rate: $25.00/HR</p>
                    <button class="btn btn-dark text-light rounded-4 skill"> View Details</button>
                </div>
                <div class="skillSection col-12 col-sm-6 col-md-3">
                    <p class="skill">French Pastry Making</p>
                    <p>Rate: $50.00/HR</p>
                    <button class="btn btn-dark text-light rounded-4 skill"> View Details</button>
                </div>
            </div>
        </div>
    </main>
<?php
include('includes/footer.inc')

?>