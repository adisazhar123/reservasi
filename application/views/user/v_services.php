<body>
    <div class="container">
      <br>
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
        <div class="col-md-4">
       <?php echo form_open('Services/create', array('id'=>'reservation'));?>
        PC No: <br>
        <select name="CompId" id="CompId">
          <option style="display:none">
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
          <br>
          Comments:<br>  
          <textarea formid="reservation" rows="2" cols="25">
Keperluan penggunaan dan aplikasi yang dibutuhkan</textarea> 
          <input type="submit" name="submit" value="Create reservation">
          <?php echo validation_errors();?>
        </form>
        </div>
      
          <div class="col-md-4">
          <br><br>
          <textarea formid="reservation" rows="2" cols="25">
Keperluan penggunaan dan aplikasi yang dibutuhkan</textarea> 
          </div>

        <div class="col-md-4 ">
          <div class="card h-70">
            <h5 class="card-header">Specs</h5>
            <div class="card-body">
              <div class="card-text" id="specsParagraph">
               
              </div>
            </div>
          </div>
          </div>
        </div>        
        
        <?php echo $msg;?>
        <?php echo $this->session->flashdata('success'); ?>

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
