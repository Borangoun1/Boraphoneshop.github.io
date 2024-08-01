<?php
$con = new mysqli("localhost", "root","root", "db_phone_shop");
?>
<?php
$user_name = $_POST['name'];
$user_pass = $_POST['password'];
$user_type = $_POST['type'];
$user_gmail = $_POST['gmail'];
$user_adress = $_POST['adress'];
$user_phone = $_POST['phonenumber'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Crop Image Before Upload using CropperJS with PHP</title>
	<link rel="stylesheet" href="./Reiges.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
	<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
	<script src="https://unpkg.com/dropzone"></script>
	<script src="https://unpkg.com/cropperjs"></script>

</head>

<body>
	<form method="post">
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Name of Item" value="<?php echo $user_name; ?>" id="name">
		</div>
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Number" value="<?php echo $user_pass; ?>" id="pass">
		</div>
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Name of Item" value="<?php echo $user_type; ?>" id="utype">
		</div>
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Number" value="<?php echo $user_gmail; ?>" id="gmail">
		</div>
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Name of Item" value="<?php echo $user_adress; ?>" id="adress">
		</div>
		<div class="input-group my-2">
			<input type="text" class="form-control" placeholder="Number" value="<?php echo $user_phone; ?>" id="phone">
		</div>
	</form>

	<div class="container" align="center">
		<br />
		<h3 align="center">Please Select image Profile</h3>
		<br />
		<div class="row">
			<div class="col-md-4">&nbsp;</div>
			<div class="col-md-4">
				<div class="image_area">
					<form method="post">
						<label for="upload_image">
							<img src="./allimage//imagecontain/my-account-icon.png" id="uploaded_image" class="img-responsive" />
							<div class="overlay">
								<div class="text kh-ui" style="padding-bottom: 86px;">Click to Change Profile Image</div>
							</div>
							<input type="file" name="image" class="image" id="upload_image" style="display:none">
						</label>
					</form>
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
		</div>
		<div><br>
			<input class="btn button-5 btn-lg" type="button" name="submit" value="Skip">
			<input class="btn button-submit btn-lg" type="button" name="submit" value="save" id="saveImage">
</body>

</html>
<script>
	$(document).ready(function() {

		var $modal = $('#modal');
		var image = document.getElementById('sample_image');
		var cropper;

		//$("body").on("change", ".image", function(e){
		$('#upload_image').change(function(event) {
			var files = event.target.files;
			var done = function(url) {
				image.src = url;
				$modal.modal('show');
			};
			//var reader;
			//var file;
			//var url;

			if (files && files.length > 0) {
				/*file = files[0];
      		if(URL)
      		{
        		done(URL.createObjectURL(file));
      		}
      		else if(FileReader)
      		{*/
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
				// aspectRatio: 1,
				viewMode: 1,
				preview: '.preview'
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		var reader;
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
					$('#uploaded_image').attr('src', url);
				}
			});
			$modal.modal('hide');
		});

		function saveimage() {	
			var base64data = reader.result;
			$.ajax({
				url: "uploadimagelogin.php",
				method: "POST",
				data: {
					image: base64data,
					name: $('#name').val(),
					password: $('#pass').val(),
					usertype: $('#utype').val(),
					gmail: $('#gmail').val(),
					adress: $('#adress').val(),
					phonenumber: $('#phone').val(),
				},
				success: function(data) {
					console.log(data);

					location.href = './login.php'

				}
			});
		}
		$('#saveImage').click(function() {
			saveimage();
		});
	});
</script>