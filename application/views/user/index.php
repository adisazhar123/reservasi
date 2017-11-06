  <body>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
    </header>

    <!-- Page Content -->
    <div class="container">
    <br>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a>Home</a>
        </li>
      </ol>

      <h1 class="my-4" style="text-align: center">Welcome to RPL PC Reservation</h1>
      <div class="row" style="justify-content: center">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Book Now!</h4>
            <div class="card-body">
              <p class="card-text">If you would liked to book a PC in RPL Lab, click below.</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url();?>Services" class="btn btn-primary">Take me there</a>
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
