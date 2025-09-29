  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white" >Alexander Pierce</a>
        </div>
      </div>

<!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="./dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <li class="nav-header">Manage</li>
        <li class="nav-item">
            <a href="./classes.php" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Classes
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subjects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="subject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assign_subject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subjects</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assign_student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Students</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Exam
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="exam.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Exam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="exam_subject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Subject</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="exam_subject_question.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Questions</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-header">Manage Users</li>
            <li class="nav-item">
            <a href="./user.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>