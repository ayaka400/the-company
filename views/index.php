<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <title>Login</title>
</head>
<body class="bg-light">

    <div style="height: 100vh">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                  <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login-action.php" method="post">
                        <input type="text" name="username" id="username" class="form-control mb-2" placeholder="USERNAME" autofocus required>
                        <input type="password" name="password" id="password" class="form-control mb-5" placeholder="PASSWORD" required>

                        <button type="submit" class="btn btn-primary w-100">Login</button>

                    </form>
                    <p class="text-center mt-3 small"><a href="register.php">Create Account</a></p>
                </div>
            </div>
        </div>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
