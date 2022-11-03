<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main_admin.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="{{route('logout')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('admin/images/admin.png')}}" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name">{{ Auth::user()->name }}<b></b></p>
          <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
      <hr>
      <ul class="app-menu">
          <li><a class="app-menu__item {{ request()->is('admin/trang-chu') ? 'haha' : '' }}"
                 href="{{url('admin/trang-chu')}}"><i class='app-menu__icon bx bx-cart-alt'></i>
                  <span class="app-menu__label">Trang chủ</span></a></li>
          <li><a class="app-menu__item" href="{{url('admin/doanh-thu')}}"><i
                      class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
          </li>
          <li><a class="app-menu__item {{ request()->is('admin/thuong-hieu') ? 'haha' : '' }}"
                 href="{{url('admin/thuong-hieu')}}"><i
                      class='app-menu__icon bx bx-purchase-tag-alt'></i><span
                      class="app-menu__label">Danh sách hãng</span></a>
          </li>
          <li><a class="app-menu__item {{ request()->is('admin/danh-muc') ? 'haha' : '' }}"
                 href="{{url('admin/danh-muc')}}"><i
                      class='app-menu__icon bx bx-purchase-tag-alt'></i><span
                      class="app-menu__label">Danh mục sản phẩm</span></a>
          </li>
          <li><a class="app-menu__item {{ request()->is('admin/thuoc-tinh') ? 'haha' : '' }}"
                 href="{{url('admin/thuoc-tinh')}}"><i
                      class='app-menu__icon bx bx-purchase-tag-alt'></i><span
                      class="app-menu__label">Danh sách thuộc tính</span></a>
          </li>
          <li><a class="app-menu__item {{ request()->is('admin/san-pham') ? 'haha' : '' }}"
                 href="{{url('admin/san-pham')}}"><i
                      class='app-menu__icon bx bx-purchase-tag-alt'></i><span
                      class="app-menu__label">Danh sách sản phẩm</span></a>
          </li>
          <li><a class="app-menu__item {{ request()->is('admin/don-dat-hang') ? 'haha' : '' }}" href="{{url('admin/don-dat-hang')}}"><i
                      class='app-menu__icon bx bx-task'></i><span
                      class="app-menu__label">Quản lý đơn hàng</span></a></li>
          <li><a class="app-menu__item {{ request()->is('admin/quan-li-nguoi-dung') ? 'haha' : '' }}"
                 href="{{url('admin/quan-li-nguoi-dung')}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                      class="app-menu__label">Quản lý khách hàng</span></a></li>
      </ul>
  </aside>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="content">
      @yield('main')
  </div>
    <div class="text-center" style="font-size: 13px">
      <p><b>Copyright
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Phần mềm quản lý bán hàng | PHP2203LM
        </b></p>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('admin/js/main.js')}}"></script>
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>

  <script language="JavaScript" type="text/javascript">
      $('.add-attr').click(function (e){
          e.preventDefault();
          var attr_1 = $('#attr_1').html();
          $('#attr_2').append(attr_1);
          console.log(attr_1);
      });
      $(document).on('click','.remove-attr',function (e) {
         e.preventDefault();
          var parent = $(this).closest('.row-attr');
         parent.remove();
      });
  </script>
</body>

</html>
