<div class="box-right">
    <div class="title-page">
        <p>Bình luận</p>
    </div>
    <div class="form-search">
        <form action="index.php?act=listbl" method="post">
            <input type="text" name="kyw" placeholder="nhập từ khóa">
            <input type="text" name="timkiembl" value="tìm kiếm ">
        </form>
    </div>
    <div class="row form-content">
        <table>
            <tr>
                <th>Mã bình luận</th>
                <th>Nội dung</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Ngày bình luận</th>
                <th class="text-center">Thao tác</th>
            </tr>
            <?php
            foreach ($listbinhluan as $binhluan) {//duyệt qua dsach binh luan
                extract($binhluan); // tách các ptu mảng thành biến riêng lẻ
                $xoabl = "index.php?act=xoabl&id=" . $id; // tạo url xóa bl theo id
                ?>
                <tr>
                    <td>BL-<?php echo $id; ?></td> 
                    <td class="noidungbl"><?php echo $noidung; ?></td> 
                    <td><?php echo $tendn; ?></td>
                    <td><?php echo $tensp; ?></td>
                    <td><?php echo $ngaybinhluan; ?></td>
                    <td class="text-center">
                        <a href="<?php echo $xoabl; ?>" class="deleteLink" data-id="<?php echo $id; ?>"><input type="button" value="xóa" class="btn-delete"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
//gắn sự kiện lắng ngje cho tất cả các ptu có class deletelink
const deleteLinks = document.querySelectorAll('.deleteLink');//lấy tất cả ptu

deleteLinks.forEach(link=>{
    link.addEventListener('click',function(event){//gan su kien click cho tung link
        event.preventDefault();//ngan can hanh dong chuyen trang
        const id = this.getAttribute('data-id');//lay id tu thuoc tinh data-id
        const xoabl= "index.php?act=xoabl&id=" + id;//taao url xoa tuong ung
        Swal.fire({
            title:"xac nhan xoa ?",//tieu de hop thoai
            icon:"warning",//icon 
            showCanceButton: true,//nut huy
            confirmButtonColor:"#3085d6";//mau nut xac nhan
            cancelButtonColor:"#d33",//mau nut huy
            confirmButtonText:"xac nhan"//noi dung xac nhan
        }).then((result)=>{
            if(result.isConfirmed){// neu nguoi dung xac nhan xoa
                Swal.fire({
                    title:"da xoa",//hthi tbao da xoa
                    icon: "success"//icon xoa thanh cong
                }).then(()=>{
                    window.location.href=xoabl;//dieu huong den url xoa bl
                });

            }
        });

    });
});

</script>