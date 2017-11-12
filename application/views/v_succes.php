<body>

    <!-- Page Content -->
    <div class="container">
      <br>
      <form name="Tick" style="text-align: right">
      <input align="left" style="text-align: center" type="text" size="10" name="Clock">
      </form>
      <script>
        function show(){
        var Digital=new Date()
        var hours=Digital.getHours()
        var minutes=Digital.getMinutes()
        var seconds=Digital.getSeconds()
        var dn="AM"
        if (hours>12){
        dn="PM"
        hours=hours-12
        }
        if (hours==0)
        hours=12
        if (minutes<=9)
        minutes="0"+minutes
        if (seconds<=9)
        seconds="0"+seconds
        document.Tick.Clock.value=hours+":"+minutes+":"
        +seconds+" "+dn
        setTimeout("show()",1000)
        }
        show()
      </script>
      <!-- Page Heading/Breadcrumbs -->
      <h1>Services
        <small>- Reserve a PC</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url();?>Home">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

        <!--connect to database to show available pc -->

      <div class="row" style="justify-content: center">

       <?php echo form_open('Services/create');?>
        PC No: <br>
        <select name="id">
         
          <?php
            $link = mysqli_connect("localhost", "root", "", "db_test");
            $sql = mysqli_query($link, "SELECT * from computer");
              while ($row = $sql->fetch_assoc()){
                  if ($row['status']=== "1")
                      echo '<option value="'.$row['ID'].'">' . $row['ID'] . "</option>";        
              }
          ?>
          </select> <br>
          Name:<br>
          <input type="text" name="name">
          <br>
          NRP:<br>
          <input type="text" name="nrp">
          <br>
          NO. HP:<br>
          <input type="text" name="no_hp">
          <br>
          Email:<br>
          <input type="text" name="email">
          <p>*By submitting you have <br>read and understood the procedures and rules.
          Click<a href="index.html"> here</a> to read.</p>  
          <input type="submit" name="submit" value="Create reservation">
        </form>

        <div class="col-lg-5 mb-5">
          <div class="card h-100">
            <h6 class="card-header">Specs</h6>
            <div class="card-body">
              <div class="card-text"
              
                <p>Processor:<br>RAM:<br>
                Harddisk:<br>Graphics Card:<br>
                Monitor:<br>
                </p>
              </div>
            </div>
          </div>
          </div>      
        </div>
         <p>Reservation pending. Thank you for filling in the request. You will be emailed regarding the
        status of your confirmation. Please ask any of the admins for help.</p> 
        <?php echo $msg; ?>
  </body>
</html>
