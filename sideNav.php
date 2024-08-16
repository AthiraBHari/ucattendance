<!-- Sidebar -->
<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <?php if($_SESSION['access'] == "admin") {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="addBatch.php">';
          echo '<i class="fas fa-fw fa-table"></i>';
          echo '<span>Add Class</span></a>';
          echo '</li>';
        
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="addSubject.php">';
          echo '<i class="fas fa-fw fa-table"></i>';
          echo '<span>Add Subject</span></a>';
          echo '</li>';
        
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="addTeacher.php">';
          echo '<i class="fas fa-fw fa-table"></i>';
          echo '<span>Add Teacher</span></a>';
          echo '</li>';

      }
      if($_SESSION['access'] == "teacher") {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="addStudent.php">';
          echo '<i class="fas fa-fw fa-table"></i>';
          echo '<span>Add Student</span></a>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="addAttendanceBatches.php">';
          echo '<i class="fas fa-fw fa-table"></i>';
          echo '<span>Add Attendance</span></a>';
          echo '</li>';
      }
        ?>
      </ul>