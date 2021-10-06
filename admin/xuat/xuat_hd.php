<div   onload="window.print()" id="wr
apper" style="min-height:900px;margin:0 auto; width:700px; background: white; border-radius: 5px; margin-top: 50px;">
  <?php if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
  ?>
  <div style="padding: 0px 20px;">
  <div class="header">
        <div class="logo">
          <img style="margin: 0px auto;"src="img/logo.png " width="150px"  />
        </div>
        <table style="margin: 0px auto;">
          <!--DWLayoutTable-->
          <tr>
            <th colspan="2">Cửa hàng ô tô số 1 Việt Nam</th>
          </tr>
          <tr>
            <td >Địa chỉ</td>
            <td>:76 Vĩnh Hưng - Hoàng Mai - Hà Nội</td>
          </tr> 
          <tr>
            <td >Tel</td>
            <td>:0344651871</td>
          </tr>
          <tr>
            <td >Di động</td>
            <td>:0338080399</td>
          </tr> 
          <tr>
            <td>Email</td>
            <td>:dolap08031999@gmail.com</td>
          </tr>
        </table>
  </div>
 <!--  Hoá Đơn -->
  <div class="title">
         <td width="562" height="25" valign="top">
           <hr>
             <strong style="text-align: center;"><font color="#FF0000" size="+2">HÓA ĐƠN</font></strong>
          </td>
        <br/>
<?php
    $sql1="SELECT * FROM hoa_don WHERE id_hoadon='$id'";
// echo $mahd;
$rows1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($rows1);
    
    
    
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                      
               <div class="block copyblock"> 
                  <p style="text-align: left; font-size: 16px;">THÔNG TIN KHÁCH HÀNG</p>
                 <form action="" method="post">
                    <table class="form">          
                        <tr>
                            <td>Tên khách hàng</td>
                            <td>: </td>
                            <td>
                                <?php echo $row1['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>: </td>
                            <td>
                               <?php echo $row1['phone']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>: </td>
                            <td>
                               <?php echo $row1['address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: </td>
                            <td>
                                <?php echo $row1['email']; ?>
                            </td>
                        </tr>  
                        <tr>
                            <td>Ghi chú</td>
                            <td>: </td>
                            <td>
                                <?php echo $row1['note']; ?>
                            </td>
                        </tr>
                        
            
                    </table>
                    </form>
                </div>
            </div>
        </div>
  </div>
     <?php    
                $sql2="SELECT * FROM order_product WhERE id_hoadon='$id'";
                $rows2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($rows2);
                
                ?>
                 <span class="style3"><B>Thông tin về đơn đặt hàng : </B></span>
                          <table width="100%" style="border-collapse:collapse;">
                            <tr>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">STT</div></td>
                              <td width="30%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tên hàng</div></td>
                              <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giá</div></td>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Số lượng</div></td>
                              <!-- <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Khuyến mại</div></td> -->
                              <td width="25%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tổng cộng</div></td>
                            </tr>
                          <?php
   $stt=1;
  $tong=0;
  $sql="SELECT * FROM order_product WhERE id_hoadon='$id'";
  $rows=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($rows))
  {
    $thanhtien=$row['price']*$row['quantity'];
  $tong+=$thanhtien;
  
  
  ?>
        <tr>
        <td align="left" style="border:1px solid green;"><?php echo  $stt++?></td>
          <td  align="left" style="border:1px solid green;"><div align="center"><?php echo $row['name_product']?></div></td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($row['price'],"0",",",".")?> VNĐ</td>
          <td align="center"  align="left" style="border:1px solid green;"><?php echo $row['quantity']?></td>
          
          <!-- <td align="center"  align="left" style="border:1px solid green;"><?php echo number_format($tongkm); ?></td> -->

          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($thanhtien,"0",",",".")?> VNĐ</td>
        </tr>
    <?php } ?>   
        <tr style="border:1px solid green;">
          <!-- <td></td> -->
          <td colspan="4" align="left"><div align="right">Tổng giá trị đơn hàng:</div></td>
          <td align="right" ><b><?php echo number_format($tong,"0",",",".") ?> VNĐ</b></td>
        </tr>     
    
      </table>
      <button onclick="window.print()" type="button" class="btn btn-primary">In đơn hàng</button>
      <table width="452" border="0" align="right">
                            <tr>
                              <td colspan="3"><div align="right"> Ngày <?php echo date("d/m/Y");?></div></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><div align="center"><strong>Khách hàng</strong></div></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td height="23"><div align="center"><?php echo $row1['name'];?></div></td>
                            </tr>
                            <tr>
                              <td height="73">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                           
                          </table>
                  
</div>
<?php } ?>
</div>
<script>
window.close();
</script>