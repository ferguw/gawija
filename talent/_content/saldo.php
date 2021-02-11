<?php 

    $idj = 17;
    $job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj`='$idj'"));
    $job_req_query = mysqli_query($con, "SELECT * FROM job_req WHERE `idj`='$idj'");
?>

    <p>grand total : <?= $job['grandtotal'] ?></p>
    <table>
    <?php 
        while($data_job_req = mysqli_fetch_assoc($job_req_query)){
    ?>
                <tr>
                    <td>Type talent</td>
                    <td>:</td>
                    <td><?= $data_job_req['type'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Yang diperlukan</td>
                    <td>:</td>
                    <td><?= $data_job_req['numtalent'] ?></td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td>:</td>
                    <td><?= $data_job_req['salary'] ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
        <?php }?>
            </table>

    