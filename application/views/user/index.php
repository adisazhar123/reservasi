  <body>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url(<?php echo base_url('img/lab.jpg'); ?>)">
          <img src="" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(<?php echo base_url('img/raphael.jpg'); ?>)">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4" style="text-align: center">Welcome to RPL PC Reservation</h1>

      <!-- Marketing Icons Section -->
      <div class="row" style="justify-content: center">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Book Now!</h4>
            <div class="card-body">
              <p class="card-text">If you would liked to book a PC in RPL Lab, click below.</p>
            </div>
            <div class="card-footer">
              <a href="services.html" class="btn btn-primary">Take me there</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Procedures and Rules</h4>
            <div class="card-body">
              <ol>
                <li>Student have to fill in required information.</li>
                <li>Reservation status will be pending. Data will be directed to administrators of the lab.</li>
                <li>Status of the reservation will be decided regarding time and availability of the PC.</li>
                <li>Confirmation of reservation status will be given through email or SMS.</li>
              </ol>
              <hr>
              <ul>
                <li>The current user of the pc (the borrower) will be responsible of the wellbeing of the PC.
                  Any damage done will be in the expense of the user.
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      </div>
  </body>

</html>
