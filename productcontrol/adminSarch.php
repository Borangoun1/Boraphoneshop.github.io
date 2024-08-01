<?php
$conn = new mysqli("localhost", "root", "root", "db_phone_shop");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
  <script src="https://unpkg.com/cropperjs"></script>
</head>
<style>
  .mystyle {
    display: none;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <form class="d-flex" action="?" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-light" type="submit" name="submit">Search</button>
</form>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertmodal">Add Product
</button>

    </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row mt-1">
      <div class="col">
        <form action="?" method="POST">
        </form>
      </div>
      <div class="card-body">
        <table class="table table-bordered text-center">
          <tr class="bg-secondary text-white">
            <td>ID</td>
            <td>image</td>
            <td>Product_name</td>
            <td>Deteil_Product</td>
            <td>Price</td>
            <td>Option</td>
          </tr>

          <?php
if (isset($_POST['submit'])) {
    $search = $_POST['name'];
    $sql = "SELECT * FROM tbl_product WHERE p_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr id="<?php echo $row['id'] ?>">
                    <td><?php echo $row['id']; ?></td>
                    <td><img class="box" src="../allimage/imageproduct/<?php echo $row['pro_img']; ?>" alt="" style="max-height: 157px;margin: 0px 10px;transition: 1s;object-fit: contain;">
                    </td>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['d_product']; ?></td>
                    <td>$<?php echo $row['price_p']; ?></td>
                    <td style="display:flex;">
                      <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>">Edit</button>
                      <a class="btn btn-danger" onclick="delateproduct(<?php echo $row['id'] ?>)">Delate</a>
                    </td>
                  </tr>
                  <!-- Modal1 -->
                  <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <center>
                            <img class="uploaded_image" id="model<?php echo $row['id'] ?>" src="../allimage/imageuser_login/<?php echo $row['u_img']; ?>" alt="" style="max-height: 157px;margin: 0px 10px;transition: 1s;object-fit: contain;"><br />
                            <div class="container" align="center">
                              <div class="row">
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-4">
                                  <div class="image_area">
                                    <form method="post">
                                      <label for="upload_image">
                                        <input type="file" name="image" class="image upload_image" data-id="<?php echo $row['id'] ?>">
                                      </label>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <div><br>
                          </center>

                          <form method="post">
                            <input id="imageid" type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class=" input-group my-2">
                              <span class="input-group-text bg-info">Product_Name</span>
                              <input type="text" class="form-control inputName" placeholder="Name of Item" name="name" value="<?php echo $row['p_name']; ?>">
                            </div>
                            <div class="input-group my-2">
                              <span class="input-group-text bg-info">Deteil</span>
                              <input id="sbgory" type="text" class="form-control inputDetail" placeholder="ប្រភេទទំនិញ" name="deteil_product" value="<?php echo $row['d_product']; ?>">
                            </div>
                            <div class="input-group my-2">
                              <span class="input-group-text bg-info">Price</span>
                              <input type="text" class="form-control inputPrice" placeholder="Number" name="price_p" value="<?php echo $row['price_p']; ?>">
                            </div>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          <input data-id="<?php echo $row['id'] ?>" type="button" value="Update" class="btn btn-primary btnUpdate" name="submit" data-bs-dismiss="modal">
                        </div>
                      </div>
                    </div>
                  </div>

                <?php
}
        } else {
            ?>
                <p class="text-danger">No result</p>

          <?php
}
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }
}
?>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <img src="" id="sample_image" />
              </div>
              <div class="col-md-4">
                <div class="preview"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div>
      </div>
    </div>
  </div>

   <!-- Modalinsert -->
 <div class="modal fade" id="insertmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                <img class="uploaded_imagecrop" id="model" src="../allimage/imageproduct/<?php echo $row['pro_img']; ?>" alt="" style="max-height: 157px;margin: 0px 10px;transition: 1s;object-fit: contain;"><br />
                <div class="container" align="center">
                    <div class="row">
                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-4">
                        <div class="image_area">
                        <form method="post">
                            <label for="upload_cropimage">
                            <input type="file" name="image" class="image upload_cropimage">
                            </label>
                        </form>
                        </div>
                    </div>
                    </div>
                    <div><br>
                </center>

                <form method="post">
                <div class=" input-group my-2">
                    <span class="input-group-text bg-info">Product_Name</span>
                    <input type="text" class="form-control pname" placeholder="Name Product" name="name">
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text bg-info">Deteil</span>
                    <input id="sbgory" type="text" class="form-control pdetail" placeholder="deteil product" name="deteil_product">
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text bg-info">Price</span>
                    <input type="text" class="form-control pprice" placeholder="Price" name="price_p">
                </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="button" value="Update" class="btn btn-primary btnAdd" name="submit" data-bs-dismiss="modal">
            </div>
        </div>
    </div>
</div>

<div class="modal fade cropimage" id="modalcrop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                <img src="" id="image" />
                </div>
                <div class="col-md-4">
                <div class="preview"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="croper">Crop</button>
        </div>
        </div>
    </div>
</div>

  <script>
    // edite product and image
    $(document).ready(function() {
      var reader;
      $('body').on('click', '.btnUpdate', function() {
        var closedModalEle = $(this).closest('.modal');
        var productId = $(this).data('id');

        var postData = {
          id: productId,
            name: closedModalEle.find('.inputName').val(),
            deteil_product: closedModalEle.find('.inputDetail').val(),
            price_p: closedModalEle.find('.inputPrice').val(),
        };
        if(typeof reader !== 'undefined'){
          var base64data = reader.result;
          postData.image = base64data;
        }
        $.ajax({
          method: "POST",
          url: "./editeproduct.php",
          data: postData,
          success: function(data) {
            const modalElement = document.getElementById('exampleModal' + productId);
            const modal = bootstrap.Modal.getInstance(modalElement);
            $('#CompanyProfile').modal('hide');
          }
        });
      });

      var $modal = $('#modal');

      var image = document.getElementById('sample_image');
      var cropper;

      $('.upload_image').change(function(event) {
        var files = event.target.files;
        var done = function(url) {
          image.src = url;
          $modal.modal('show');
        };

        if (files && files.length > 0) {
          reader = new FileReader();
          reader.onload = function(event) {
            done(reader.result);
          };
          reader.readAsDataURL(files[0]);
          //}
        }
      });

      $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
          viewMode: 1,
          preview: '.preview'
        });
      }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
      });


      $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
          width: 400,
          height: 400,
        });
        canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          reader = new FileReader();
          reader.readAsDataURL(blob);
          reader.onloadend = function() {
            $('.uploaded_image').attr('src', url);

          }
        });
        $modal.modal('hide');
      });
    });
    
  //delate
  function delateproduct(productid) {
        $.ajax({
          url: "./addmindelate.php",
          method: "POST",
          data: {
            id: productid,
            image: $('#img_product').val(), 
          },
          success: function(data) {
            console.log(productid);
            console.log( document.getElementById(productid));
            document.getElementById(productid).remove();
          }
        });
      }

       //  insertproduct
    $(document).ready(function() {
      var reader;
      $('body').on('click', '.btnAdd', function() {
        var closedModalEle = $(this).closest('#insertmodal'); //parerent ('.cropimage')
        var productId = $(this).data('id');
       
        var postData = {
          product_name: closedModalEle.find('.pname').val(),
          d_product: closedModalEle.find('.pdetail').val(),
          p_price: closedModalEle.find('.pprice').val(),
        };
        if(typeof reader !== 'undefined'){
          var base64data = reader.result;
          postData.image = base64data;
        }
        console.log(postData);
        $.ajax({
          method: "POST",
          url: "/srvc/admin-dashboard-main/admininsertproduct.php",
          data: postData,
          success: function(data) {
            const modalElement = document.getElementById('insertmodal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            $('#CompanyProfile').modal('hide');
          }
        });
      });
      var $modal = $('#modalcrop');

      var image = document.getElementById('image');
      var cropper;

      $('.upload_cropimage').change(function(event) {
        var files = event.target.files;
        var done = function(url) {
          image.src = url;
          $modal.modal('show');
        };

        if (files && files.length > 0) {
          reader = new FileReader();
          reader.onload = function(event) {
            done(reader.result);
          };
          reader.readAsDataURL(files[0]);
          //}
        }
      });
      $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
          viewMode: 1,
          preview: '.preview'
        });
      }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
      });


      $("#croper").click(function() {
        canvas = cropper.getCroppedCanvas({
          width: 400,
          height: 400,
        });
        canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          reader = new FileReader();
          reader.readAsDataURL(blob);
          reader.onloadend = function() {
            $('.uploaded_imagecrop').attr('src', url);

          }
        });
        $modal.modal('hide');
      });
    });

  </script>



</body>

</html>