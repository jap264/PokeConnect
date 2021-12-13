<nav id="nav">
  <ul>
    <li><div class="dropdown">
      <a href="dashboard.php"><button class="dropbtn"><img src="images/home.png" height=25px> Home</button></a>
  </div></li>
  <li><div class="dropdown">
    <a href="threadcreate.php"><button class="dropbtn"><img src="images/report.png" height=25px> Create New Thread</button></a>

</div></li>












            <li></div>
              <div class="dropdown" style="float:right;">
                <button class="dropbtn"><img src="images/dashico.png" alt="Avatar" style="width:30px; border-radius: 50%;">
                  <?php echo "Hi, "; echo htmlspecialchars($_SESSION["username"]); ?></button>
                  <div class="dropdown-content">
                    <a href="aprofile.php">Account Settings</a>
                      <hr style="margin: 0px; padding: 0px;">
                      <a href="signout.php"><img src="images/signout.png" height=20px>Signout</a>
                    </div>
                  </div></li>
            </ul>
</nav>
