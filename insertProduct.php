<!DOCTYPE HTML>
<html>

<head>
</head>
<link rel="stylesheet" href="./sarech.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
    <center class="border border-primary mt-3 py-5 w-50 mx-auto">
        <h2 style="color: #FF0000; " class="pb-4">Insert Product</h2>

        <form method="POST" id="form" enctype="multipart/form-data" action="./insertimageproduct.php">
            
            <div class="input-group mb-3" style="width: 290px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info kh-ui" id="inputGroup-sizing-default">Product_Name:</span>
                </div>
                <input type="text" class="form-control kh-ui" name="Product_Name" value="" placeholder="Product_Name" required>
            </div>
            <div class="input-group mb-3" style="width: 290px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info kh-ui" id="inputGroup-sizing-default">Detail:</span>
                </div>
                <input type="text" name="Detail" value="" class="form-control" placeholder="Detail" required>
            </div>
            <div class="input-group mb-3" style="width: 290px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info kh-ui" id="inputGroup-sizing-default">Price:</span>
                </div>
                <input type="text" name="Price" value="" class="form-control" placeholder="Price" required>
            </div>
            <input class="btn btn-primary btn-md w-25" type="submit" name="submit" value="Submit">
        </form>
    </center>
    <!-- <script src="./upload.js"></script> -->
</body>

</html>