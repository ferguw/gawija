<link rel="stylesheet" href="../assets/css/form-wizard.css">
<!-- Air DatePicker -->
<link rel="stylesheet" href="../assets/css/datepicker.min.css" type="text/css">
<!-- Air DatePicker -->

<div class="row d-content">
    <div class="col-lg-12 page-content">
        <h3 class="text-center mb-4">Add My Project</h3>
        <form id="regForm" method="GET">
            <!-- One "tab" for each step in the form: -->
            <!-- Tab 1 -->
            <input hidden type="text" name="p" value="job-add-cekout">
            <div class="tab">
                <label for="projN">Project Name</label>
                <input type="text" placeholder="Project Name" oninput="this.className = ''" name="projN">

                <label for="compN">Company Name</label>
                <input type="text" placeholder="Company Name" oninput="this.className = ''" name="compN">
            </div>

            <!-- Tab 2 -->
            <div class="tab">
                <label for="date-proj">Periode Project</label>
                <input type="text" data-range="true" placeholder="Start - End" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" name="date-proj" />

                <label for="workD">Work Day</label>
                <input type="number" placeholder="Work Day" oninput="this.className = ''" name="workD">
            </div>

            <!-- Tab 3 -->
            <div class="tab">
                <div>
                    <div class="col-4 col-lg-1 offset-8 offset-lg-11"><button type="button" id="tambahTalent" class="material-icons btn btn-b2">add</button></div>
                    <label for="date-proj">Talent Type</label>
                    <select class="custom-select mr-sm-2" name="talentType[]" id="inlineFormCustomSelect">
                        <option selected disabled>Choose...</option>
                        <option value="SPG">SPG</option>
                        <option value="SPB">SPB</option>
                    </select>

                    <label for="salaryD">Salary per Day</label>
                    <input type="number" placeholder="Salary Day" oninput="this.className = ''" name="salaryD[]">

                    <label for="amountT">Amount of Talent</label>
                    <input type="number" placeholder="Amount of Talent" oninput="this.className = ''" name="amountT[]">
                </div>
                <div id="talentTypeTambah"></div>
            </div>

            <!-- <div class="tab">
                <label for="totalSalary">Total Salary</label>
                <input type="text" placeholder="Total Salary" oninput="this.className = ''" name="totalSalary">

                <label for="feeGawija">Fee Gawija</label>
                <input type="text" placeholder="Fee Gawija " oninput="this.className = ''" name="feeGawija">

                <label for="ppn">PPN 5%</label>
                <input type="text" placeholder="PPN " oninput="this.className = ''" name="ppn">

                <label for="grandT">Grand Total</label>
                <input type="text" placeholder="Grand Total " oninput="this.className = ''" name="grandT">
            </div> -->

            <div style="overflow:auto;">
                <div id="BtnSend" style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<!-- End Bootstrap -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="../assets/js/form-wizard.js"></script>
<!-- Air DatePicker -->
<script src="../assets/js/date-picker/datepicker.min.js"></script>
<!-- Include English language -->
<script src="../assets/js/date-picker/i18n/datepicker.en.js"></script>
<!-- Air DatePicker -->