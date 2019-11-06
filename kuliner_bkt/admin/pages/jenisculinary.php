  

              <div class="col-lg-15 ds" id="hide2"> 
                       
          
              <div class="box-body">
              <div class="btn-group pull-left" style="width:100px;">
            <a href="?page=culinary<?php echo $id ?>" class="btn btn-theme"><i class="fa fa-chevron-left"></i> Back</a>  </div>
              
    <div class="btn-group pull-right" style="width:90px;">
    <a href="?page=formjnskul" class="btn btn-theme">Add <i class="fa fa-plus"></i></a><br><br><br>
    </div>
    </div>
              <table id="" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
     <!--  <th>ID Jenis Industri</th> -->
      <th>Culinary Type</th>
      <th>Action</th>

      </tr>
    </thead>
    <tbody>
    
<?php
    include '../connect.php';
    //$id = $_GET['id'];
    $querysearch  ="SELECT culinary.id, culinary.name FROM culinary order by id ASC ";
             
    $result=mysqli_query($conn, $querysearch);
    while($baris = mysqli_fetch_array($result))
    {
          $id=$baris['id'];
          $name=$baris['name'];
          
          
          $dataarray[]=array('id'=>$id,'name'=>$name);
?>
    <tr>
      
      <td><?php echo "$name" ?></td>
       <td><div class="btn-group">

      
      <a href="?page=editjnskul&id=<?php echo $id; ?>" class="btn btn-round btn-default" title='Edit'><i class="fa fa-edit"></i> Edit</a>
      </div>
      
    </tr>
<?php
    }
//echo json_encode ($dataarray);
?>

    </tbody>
    </table>


  </div><!-- /.box-body -->
              </div>
              

