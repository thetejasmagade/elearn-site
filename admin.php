<!DOCTYPE html>
<html lang="en">

<head>
    <title>शाळा</title>
    <link rel="shortcut icon" href="./images/logo/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.5/cssfontawesomemincss" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="admin">
        <a href="#" class="signinbutton" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter">Login</a
      >
    </div>

    <!-- Start Admin Login Modal -->
    <div
      class="modal fade"
      id="adminLoginModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="adminLoginModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="adminLoginModalCenterTitle">
              Admin Login
            </h5>
            <button
              type="button"
              class="close btn-danger btn-lg"
              data-dismiss="modal"
              aria-label="Close"
              onClick="clearAdminLoginWithStatus()"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" id="adminLoginForm">
              <div class="form-group text-white">
                <i class="fas fa-envelope"></i
                ><label for="adminLogEmail" class="pl-2 font-weight-bold"
                  >Email</label
                ><input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  name="adminLogEmail"
                  id="adminLogEmail"
                  style="font-size: 14px; padding: 10px 3px"
                />
              </div>
              <div class="form-group text-white">
                <i class="fas fa-key"></i
                ><label for="adminLogPass" class="pl-2 font-weight-bold"
                  >Password</label
                ><input
                  type="password"
                  class="form-control"
                  placeholder="Password"
                  name="adminLogPass"
                  id="adminLogPass"
                  style="font-size: 14px; padding: 10px 3px"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <small id="statusAdminLogMsg"></small>
            <button
              type="button"
              class="signinbutton"
              id="adminLoginBtn"
              onclick="checkAdminLogin()"
            >
              Login
            </button>
            <button
              type="button"
              class="btn btn-danger btn-lg"
              data-dismiss="modal"
              onClick="clearAdminLoginWithStatus()"
            >
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Admin Login Modal -->

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>

    <!-- admindent Ajax Call JavaScript -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>

    <!-- Admin Ajax Call JavaScript -->
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>
  </body>
</html>