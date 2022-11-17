<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Trang chủ</a>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.php" class="nav-link">Liên hệ</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
          <a class="nav-link" href="profile.php">
                <i class="fas fa-user"></i><span class="text-secondary"> Thông tin cá nhân</span>  
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt "></i><span class="text-secondary">Đăng xuất</span>  
          </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-light" >
      <img src="photo/logo.png" alt="Logo" class="brand-image" style="opacity: .8">
      <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="photo/user.png" class="img-square rounded elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Ngành học
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm ngành mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý thông tin ngành</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tác giả
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_author.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm tác giả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_author.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý tác giả</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Đầu sách
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_book.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_book.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sách</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Bạn đọc
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm bạn đọc</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý bạn đọc</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-retweet"></i>
              <p>
                Hoạt động mượn trả
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage_accept.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý yêu cầu mượn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_borrow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sách đang mượn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_return.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sách đã trả</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Thống kê
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tksach_dm.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê sách-danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tksachmuon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê sách mượn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tkmuontra.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê lượt mượn-trả</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
