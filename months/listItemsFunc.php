<?php session_start(); ?>
<form id="sub" action="months/includes/write_comm.php" method="post">
  <textarea id="inittext" name='message'></textarea>
  <?php
  $stat=0;
  $mnum=0;
  echo '<input type="hidden" name="status" value='.$stat.'>';?>
  <input type="hidden" name="uid" value="<?php echo $_SESSION['u_uname'];?>">
  <?php echo '<input type="hidden" name="m_number" value='.$mnum.'>';?>
  <input class="LoginSu_button" type="submit" value="submit" name="submit1">
</form>
  <!-- Trigger/Open The Modal -->
<input id="myBtn" class="LoginSu_button" type="button" value="content">
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
      <div class="modal-body">
        <?php
        $sql="SELECT * FROM comments WHERE MONTH(date) = MONTH(CURDATE());";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          if ($row['status']==0) {
          ?>
          <?php echo "<span>Cid:#".$row['cid']."</span>"; ?>
          <?php echo "<div>".$row['date']."</div>"; ?>
          <?php echo "<div>".$row['uid']."</div>"; ?>
          <?php
          $mess=$row['message'];
          $val=$row['cid'];
          $stat=1;
          echo '<form action="months/includes/write_comm.php" method="post">
            <input type="hidden" name="uid" value='.$_SESSION['u_uname'].'>
            <textarea id="editedmes" name="message">'.$mess.'</textarea><br>
            <input type="hidden" name="cid" value='.$val.'>
            <input type="hidden" name="status" value='.$stat.'>
            <input id="updateb" class="LoginSu_button" type="submit" value="Update" name="submit2">
          </form>';
          echo "<br><br><br><br>";
        }} ?>
      </div>
    </div>

  </div>
