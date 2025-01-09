<?php
include "header.php";
include "sidebar.php";

$idmanu = $_GET['id_manu'];

$manu = $manufacture->HienThiMotManu($idmanu);

?>

<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom current">
                <i class="icon-home"></i> Home
            </a>
        </div>
        <h1>Edit Manufacturer</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> 
                        <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Manufacturer Info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="./xulyCRUD_admin/xulySuaManu.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="text" class="span11" name="id" value="<?php echo $manu['id_manu']; ?>" readonly style="display:none;" /> 

                            <div class="control-group">
                                <label class="control-label">Manufacturer Name</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" value="<?php echo $manu['name_manu']; ?>" required /> *
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success">Update Manufacturer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php"; ?>

<script>
// Preview selected image
function showFileName() {
    var fileInput = document.getElementById('fileUpload');
    var file = fileInput.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}
</script>
