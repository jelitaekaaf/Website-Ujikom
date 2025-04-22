<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Inventera</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #f5f7fa;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 0 40px rgba(0,0,0,0.1);
      overflow: hidden;
      max-width: 1000px;
      width: 100%;
    }

    .left {
      width: 50%;
      background: #e0f7ff;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .left img {
      max-width: 100%;
      height: auto;
      margin-bottom: 30px;
    }

    .left h3 {
      font-size: 20px;
      font-weight: 500;
      color: #333;
    }

    .right {
      width: 50%;
      padding: 40px 50px;
    }

    .right h2 {
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .social-login {
      display: flex;
      gap: 12px;
      margin-bottom: 20px;
    }

    .social-btn {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
      cursor: pointer;
      font-size: 14px;
      background-color: #fff;
      transition: all 0.3s ease;
    }

    .social-btn:hover {
      background-color: #f0f0f0;
    }

    .divider {
      text-align: center;
      color: #aaa;
      font-size: 13px;
      margin: 20px 0;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background-color: #45c6cf;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn-submit:hover {
      background-color: #378454;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 14px;
      text-align: center;
      color: #555;
    }

    .footer-text a {
      color: #378454;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left, .right {
        width: 100%;
        padding: 30px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side -->
    <div class="left">
      <img src="{{ asset('assets/images/bglog.png') }}" alt="Ilustrasi Login" />

    </div>

    <!-- Right Side (Form) -->
    <div class="right">
      <h2>Create Account</h2>


      <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="text" name="name" class="form-control" placeholder="Full Name" required />
        <input type="email" name="email" class="form-control" placeholder="Email Address" required />
        <input type="password" name="password" class="form-control" placeholder="Password" required />

        <button type="submit" class="btn-submit">Create Account</button>

        <div class="footer-text">
          Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
