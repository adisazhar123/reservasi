<body>  
        <div class="col-lg-6 mb-5">
          <div class="card h-100">
            <h6 class="card-header">Specs</h6>
            <div class="card-body">
              <div class="card-text" id="txtHint">
                <?php
                $q = intval($_GET['q']);
                $con = mysqli_connect("localhost", "root", "", "db_test");
                if (!$con){
                  die('Could not connect: ' . mysqli_error($con));
                }
                
                mysqli_select_db($con,"db_test");
                $sql="SELECT * FROM computer WHERE id = '".$q."'";
                $result = mysqli_query($con,$sql);
                
                echo "<table>
                <tr>
                <th>Processor</th>
                <th>RAM</th>
                <th>Harddisk</th>
                <th>Graphics Card</th>
                <th>Monitor</th>
                </tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>". $row['PROCESSOR'] . "</td>";
                    echo "<td>" . $row['RAM'] . "</td>";
                    echo "<td>" . $row['HARDDISK'] . "</td>";
                    echo "<td>" . $row['GRAPHICS_CARD'] . "</td>";
                    echo "<td>" . $row['MONITOR'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($con);
                ?>
                </p>
              </div>
            </div>
          </div>
          </div>      
        </div>
        <?php echo $msg;?>
  </body>
</html>
