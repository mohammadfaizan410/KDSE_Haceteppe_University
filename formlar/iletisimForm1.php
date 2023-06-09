<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
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
<html lang="en">

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

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">İLETİŞİM KURMA GEREKSİNİMİ</h1>



            <div class="input-section d-flex">
                <p class="usernamelabel">İletişim kurmasına engel olan herhangi bir durum</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IletisimEngeli" id="IletisimEngeli" value="Yok">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IletisimEngeli" id="IletisimEngeli" value="Var">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="IletisimEngeliDiger" id="IletisimEngeliDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Refakatçisi</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="refakatci" id="refakatci" value="Yok">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="refakatci" id="refakatci" value="Var">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="refakatciDiger" id="refakatciDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Yakınlarına ulaşmada sıkıntısı</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="UlasmaSikinti" id="UlasmaSikinti" value="Yok">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="UlasmaSikinti" id="UlasmaSikinti" value="Var">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="UlasmaSikintiDiger" id="UlasmaSikintiDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sağlık personeli ile iletişime geçmede sorun</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PersonelleIletisim" id="PersonelleIletisim" value="Yok">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PersonelleIletisim" id="PersonelleIletisim" value="Var">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="PersonelleIletisimDiger" id="PersonelleIletisimDiger">
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section d-flex">

                <p class="usernamelabel">Bakıma katılma </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BakımaKatılma" id="BakımaKatılma" value="Katılmıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header">Katılmıyor </span>
                            </label>

                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="İstekli1" value="İstekli">
                                                <label class="form-check-label" for="İstekli1">İstekli </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="İsteksiz1" value="İsteksiz">
                                                <label class="form-check-label" for="İsteksiz1">İsteksiz </label>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BakımaKatılma" id="BakımaKatılma" value="Katılıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header"> Katılıyor</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="İstekli" value="İstekli">
                                                <label class="form-check-label" for="İstekli">İstekli</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="İsteksiz" value="İsteksiz">
                                                <label class="form-check-label" for="İsteksiz">İsteksiz </label>
                                            </div>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Tedaviyi kabullenme </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TedaviyiKabullenme " id="TedaviyiKabullenme " value="Kabul ediyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul ediyor </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TedaviyiKabullenme " id="TedaviyiKabullenme " value="Kabul etmiyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul etmiyor (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="TedaviyiKabullenmeDiger " id="TedaviyiKabullenmeDiger ">
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


                        var valid = this.form.checkValidity();

                        if (valid) {
                            var id = <?php

                                        $userid = $_SESSION['userlogin']['id'];
                                        echo $userid
                                        ?>;
                            let IletisimEngeli = $("input[name='IletisimEngeli']:checked").val();
                            let IletisimEngeliDiger = $("input[type='radio'][name='IletisimEngeliDiger']").val();
                            let refakatci = $("input[type='radio'][name='refakatci']:checked").val();
                            let refakatciDiger = $("input[type='radio'][name='refakatciDiger']").val();
                            let UlasmaSikinti = $("input[type='radio'][name='UlasmaSikinti']:checked").val();
                            let UlasmaSikintiDiger = $("input[type='radio'][name='UlasmaSikintiDiger']").val();
                            let PersonelleIletisim = $("input[type='radio'][name='PersonelleIletisim']:checked").val();
                            let PersonelleIletisimDiger = $("input[type='radio'][name='PersonelleIletisimDiger']").val();
                            let BakımaKatılma = $("input[type='radio'][name='BakımaKatılma']:checked").val();
                            let İstekli1 = $("input[type='radio'][name='İstekli1']").val();
                            let İsteksiz1 = $("input[type='radio'][name='İsteksiz1']").val();
                            let İstekli = $("input[type='radio'][name='İstekli']").val();
                            let İsteksiz = $("input[type='radio'][name='İsteksiz']").val();
                            let TedaviyiKabullenme = $("input[type='radio'][name='TedaviyiKabullenme']:checked").val();
                            let TedaviyiKabullenmeDiger = $("input[type='radio'][name='TedaviyiKabullenmeDiger']").val();




                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: 'student-patient.php',
                                data: {
                                    IletisimEngeli: IletisimEngeli,
                                    IletisimEngeliDiger: IletisimEngeliDiger,
                                    refakatci: refakatci,
                                    refakatciDiger: refakatciDiger,
                                    UlasmaSikinti: UlasmaSikinti,
                                    UlasmaSikintiDiger: UlasmaSikintiDiger,
                                    PersonelleIletisim: PersonelleIletisim,
                                    PersonelleIletisimDiger: PersonelleIletisimDiger,
                                    BakımaKatılma: BakımaKatılma,
                                    İstekli1: İstekli1,
                                    İsteksiz1: İsteksiz1,
                                    İstekli: İstekli,
                                    İsteksiz: İsteksiz,
                                    TedaviyiKabullenme: TedaviyiKabullenme,
                                    TedaviyiKabullenmeDiger: TedaviyiKabullenmeDiger,

                                },
                                success: function(data) {
                                    alert("Success");
                                    location.reload(true)
                                },
                                error: function(data) {
                                    Swal.fire({
                                        'title': 'Errors',
                                        'text': 'There were errors',
                                        'type': 'error'
                                    })
                                }
                            })



                        }
                    })

                });
            </script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>
