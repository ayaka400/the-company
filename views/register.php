<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <title>Register</title>
</head>
<body class="bg-light">

    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Register</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/register-action.php" method="post" autocomplete="off">
                        <div class="mb-3">
                              <label for="first-name" class="form-label">Firstname</label>
                              <input type="text" name="first_name" id="first-name" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3"> 
                            <label for="last-name" class="form-label">Lastname</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" required>
                        </div>

                        <!-- Bold for emphasis -->
                          <div class="mb-3">
                              <label for="username" class="form-label fw-bold">Username</label>
                              <input type="text" name="username" id="username" class="form-control" maxlength="15" required>
                          </div>

                          <div class="mb-5">
                              <label for="password" class="form-label fw-bold">Password</label>
                              <input type="password" name="password" id="password" class="form-control" minlength="8" required aria-describedBy="password-info">
                              <div class="form-text" id="password-info">
                                  Password must be atleast 8 characters long.
                              </div>
                          </div>

                          <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>
                    <p class="text-center small mt-3">Registered aready? <a href="../views">Login</a></p>
                    <p class="text-center small mt-3">Copyright ` Kredo 2024</p>
                </div>
            </div>
        </div>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
