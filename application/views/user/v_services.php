<body>
    <div class="container">
      <br>
      <form name="Tick" style="text-align: right">
      <input align="left" style="text-align: center" type="text" size="10" name="Clock" readonly>
      </form>
      
      <h1>Services
        <small>- Reserve a PC</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url();?>Welcome">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>
      
      <!--connect to database to show available pc -->

      <div class="row" style="justify-content: center">

       <?php echo form_open('Services/create');?>
        PC No: <br>
        <select name="CompId" id="CompId">
          <?php foreach($computers as $comp){
            if ($comp->status == 1)
              echo '<option value="'.$comp->CompId.'">' . $comp->CompId . "</option>";
            } ?>
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
          <?php echo validation_errors();?>
        </form>

        <div class="col-lg-6 mb-5">
          <div class="card h-100">
            <h5 class="card-header">Specs</h5>
            <div class="card-body">
              <div class="card-text" id="specsParagraph">
               
              </div>
            </div>
          </div>
          </div>      
        </div>        
        
        <?php echo $msg;?>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#CompId').on('change', function(){
              var CompId = $(this).val();

                $.ajax({
                  url:"<?php echo base_url() ?>Services/GetSpecs",
                  type: "POST",
                  data: {'CompId' : CompId},
                  dataType: 'json',
                  success: function(data){
                    $('#specsParagraph').html(data);
                  },
                  error: function(){
                    alert('Error...');
                  }
                });
            });
          });

      </script>

        



  </body>
</html>
