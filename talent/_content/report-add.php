<?php

$idj = $_GET["idj"];
$timezone = "Asia/Makassar";
date_default_timezone_set($timezone);
$time = date("Hi");
$date = date("dmy");
$date2 = date("Y-m-d");

function compress($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}

if (isset($_POST['submit'])) {

    // //create folder upload
    $tempdir = "../assets/images/report/";
    // if (!file_exists($tempdir)) mkdir($tempdir, 0755);
    
    //target file
    $target_path = $tempdir . basename($_FILES['uploadimg']['name']);

    $source_img = $_FILES['uploadimg']['tmp_name'];

    $filename = $_FILES['uploadimg']['name'];
    $filetype = pathinfo($_FILES['uploadimg']['name']);
    $filetype = $filetype['extension'];

    $destination_img = $target_path;

    //panggil fungsi compress,
    compress($source_img, $destination_img, 65);

    //Rename File
    $newname = $idj . '-' . $idt . '-' . $time . '-' . $date . '.' . $filetype;
    rename($tempdir . $filename, $tempdir . $newname);

    $desk_rp = $_POST["desk_rp"];
    $query = mysqli_query($con, "INSERT INTO `report`(`idj`, `idt`, `tgl`, `desk_rp`, `photo`) VALUES ('$idj','$idt','$date2','$desk_rp','$newname')");
    // header("location:");
    echo "<script>window.location.replace('?p=report-job&id-job=$idj');</script>";
}
?>
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h4 align="center">Add New Report</h4><br>
        <form method="POST" enctype='multipart/form-data' id="form1" runat="server">
            <div class="form-group">
                <label for="imgInp">
                    <h5>Upload Image :</h5>
                </label><br>
                <input type='file' accept=".png,.jpeg,.jpg" name="uploadimg" id="imgInp" />
            </div>
            <hr>
            <div class="form-group" id="showimg"></div>
            <div class="form-group">
                <label for="deskripsi">Description Report :</label>
                <textarea class="form-control" rows="4" cols="50" id="deskripsi" name="desk_rp" aria-label="With textarea"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var html = "<img id='blah' width='300px' src='#'>";
                html += "<hr>";
                $('#showimg').append(html);
                $('#blah').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>