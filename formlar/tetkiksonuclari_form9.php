<?php
session_start();
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>e-BYRYS-KKDS</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
<!-- Customized Bootstrap Stylesheet -->
<link href="bootstrap.min.css" rel="stylesheet">
<!-- Template Stylesheet -->
<link href="style.css" rel="stylesheet">
   <style>
		table {
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid black;
			padding: 10px;
		}
		th {
			background-color: #eee;
		}
    h1 {
            text-align: center;
    }
    tr, td{
      width: 200px;
    }
	</style>
  		<body>
		  <div class="container-fluid pt-4 px-4">
            <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">TETKİK SONUÇLARI GİRİŞİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                    <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Date:</p>
                            <input type="date" class="form-control" required name="date" id="diger" placeholder="Patient ID">
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Tetkik adı </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Tıbbi Biyokimya*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tıbbi Biyokimya*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Mikrobiyoloji*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Mikrobiyoloji*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Radyoloji Bulguları">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Radyoloji Bulguları</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Tomografi-Mr">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tomografi-Mr</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Ultrason-Doppler">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ultrason-Doppler</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Girişimsel Radyoloji">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Girişimsel Radyoloji</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti" value="Kan Merkezi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Kan Merkezi</span>
                                    </label>
                                </div>
                            </div>
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Tetkik Sonucu :</p>
                            <input type="text" class="form-control" required name="examination_result" id="diger" placeholder="Tetkik Sonucu">
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Referans Değeri  :</p>
                            <input type="text" class="form-control" required name="referance_value" id="diger" placeholder="Referans Değeri">
                        </div>
							<input class="form-control submit" name="submit" id="submit" value="Done">
                    </form>
                </div>
            </div>
        </div>

	
    </div>
    <script>
      $(function() {
          $('#closeBtn').click(function(e) {
              $("#content").load("formlar-student.php");

          })
      });
  </script>
<script>
      $(function() {
          $('#submit').click(function(e) {
              e.preventDefault()
              console.log("clicked")
              var valid = this.form.checkValidity();

              if (valid) {
                  var id = <?php
                  $userid = $_SESSION['userlogin']['id'];
                  echo $userid
                  ?>;
                  var name = $('#name').val();
                  var surname = $('#surname').val();
                  var age = $('#age').val();
                  var not = $('#not').val();
                  let form_num = 9;
                  let patient_name = $("input[name='patient_name']").val();
                  let patient_id = parseInt($("input[name='patient_id']").val());
                  let yourDate = new Date()
                  let creationDate = yourDate.toISOString().split('T')[0];
                  let updateDate = yourDate.toISOString().split('T')[0];
                  let date = $("input[name='date']").val();
                  let examination_type =  $("input[type='radio'][name='examination_type']:checked").val()
                  let examination_result = $("input[name='tektikOption']").val();
                  let referance_value = $("input[name='referance_value']").val();
                  console.log("values initiated")

                  $.ajax({
                      type: 'POST',
                      url: 'http://18.159.134.238/Hacettepe-KDSE-BPYS/submitOrUpdateTektik_form9.php',
                      data: {
                          id: id,
                          name: name,
                          surname: surname,
                          age: age,
                          not: not,
                          form_num:form_num,
                          patient_id:patient_id,
                          patient_name:patient_name,
                          creation_date:creationDate,
                          update_date :updateDate,
                          date :date,
                          examination_type: examination_type,
                          examination_result:examination_result,
                          referance_value:referance_value
                      },
                      success: function(data) {
                          console.log(data);
                          alert("Success");
                      },
                      error: function(data) {
                          console.log(data)
                      }
                  })



              }
          })

      });
  </script>
      <script src=""></script>
      </body>

     </html>