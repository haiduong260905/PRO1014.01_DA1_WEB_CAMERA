<?php
session_start();
include "../../../model/pdo.php";
include "../../../model/binhluan.php";
if(!isset($_REQUEST['idsp'])){
    exit("Missing product ID.");//th idsp ko ton tai
}
$idsp = $_REQUEST['idsp'];
//ktra lay gtri tu session 'tensp'
$tensp=isset($_SESSION['tensp'])? $_SESSION['tensp']:'';
//lay gtri tu session user
$tendn=isset($_SESSION['user']['tendn'])? $_SESSION['user']['tendn']:'';
//load tca cac bl
$dsbl = loadall_binhluan($idsp);
?>
<style>
      .form-group {
        position: relative;
    }

    .input-comment {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="hidden"] {
        display: none;
    }

    input[name="guibinhluan"] {
        background-color: #ff8c00;
        /* Orange color */
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates">
    <meta name="keywords" content="ecommerce website templates, online store">
    <title>9-camera</title>
    <!-- Bootstrap -->

    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="../../../css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl-carousel -->
    <link href="../../../css/owl.carousel.css" rel="stylesheet">
    <link href="../../../css/owl.theme.default.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div id="des-details3" class="tab-pane">
        <div class="rattings-wrapper">

        </div>
        <div id="review">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="review-form">
                                    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                                        <div class="form-group">
                                            <textarea name="noidung" placeholder="thêm nhận xét của bạn" class="input-comment"></textarea>
                                            <input type="hidden" name="idsp" value="<?=$idsp?>">
                                            <input type="hidden" name="tensp" value="<?=$tensp?>">
                                            <input type="submit" name="guibinhluan" value="bình luận">
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['guibinhluan'])){
                                        $noidung=$_POST['noidung'];
                                        $tendn=$_SESSION['user']['tendn'];
                                        $idsp=$_POST['idsp'];
                                        $tensp=$_POST['tensp'];
                                        $ngaybinhluan=date('d/m/Y');
                                        insert_binhluan($noidung,$tendn,$idsp,$tensp,$ngaybinhluan);
                                        header("Location:".$_SERVER['HTTP_REFERER']);

                                    }
                                    ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="divider-line"></div>
                                </div> 
                                <div class="row review-box">
                                    <div class="customer-reviews">
                                        <?php
                                        foreach($dsbl as $bl){
                                            extract($bl);
                                            echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="review-text"><span class="text-default">Người dùng:'.$tendn.'</span></p>
                                            <p>'.$noidung.'</p>
                                            <span style="font-size: 15px;" class="post-time">' . $ngaybinhluan . '</span>
                                            </div>';
                                            
                                        }
                                        ?>
                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="divider-line"></div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<!-- all js here -->

<script src="../../../js/jquery.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../js/jquery.desoslide.js"></script>

<script type="text/javascript">
    // Sử dụng jQuery để chọn phần tử có id 'slideshow' và áp dụng plugin desoSlide
    $('#slideshow').desoSlide({
        // Cấu hình các tùy chọn cho plugin
        thumbs: $('div.slideshow_thumbs div > a'), // Chọn hình nhỏ cho bảng trình chiếu từ thẻ div
        effect: {
            provider: 'animate', // Sử dụng nhà cung cấp hiệu ứng 'animate'
            name: 'fade' // Đặt hiệu ứng 'fade'
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="link_to_your_desoSlide_plugin.js"></script>

<script type="text/javascript">
    $(function() {
        $("#rateYo").rateYo({
            rating: 3.6,
            starWidth: "25px"
        });

    });
</script>



<script>
    function dcQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty > 1) {
            result.value--;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    };

    function icQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty < 10) {
            result.value++;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    }
</script>

<script>
    $(document).ready(function() {
        $('.less-evaluation').click(function() {
            $('.content-desc').css('height', '1180px');
            $(this).css('display', 'none');
            $('.more-evaluation').css('display', 'block');
        })
    })

    $(document).ready(function() {
        $('.more-evaluation').click(function() {
            $('.content-desc').css('height', 'auto');
            $(this).css('display', 'none');
            $('.less-evaluation').css('display', 'block');
        })
    })

    $(document).ready(function() {
        $('.page-scroll').click(function() {
            $('.page-scroll').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>