<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Buy Tokens</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content {
      margin-left: 270px;
      /* space for sidebar */
      padding: 30px;
    }
  </style>
</head>

<body>

  <div class="content">
    <h3 class="mb-4">💬 Purchase Chat Tokens</h3>

    <div class="card p-4 shadow-sm" style="max-width: 600px;">
      <div class="mb-3">
        <label for="tokenAmount" class="form-label">Number of Tokens</label>
        <input type="number" id="tokenAmount" class="form-control" placeholder="e.g. 2" min="1" value="1">
      </div>

      <div class="mb-3">
        <p class="mb-1">💲 <strong>Total:</strong> <span id="totalPrice">$3</span></p>
        <small class="text-muted">1 token = $3 = 50 messages</small>
      </div>

      <button class="btn btn-primary w-100" id="dummyPayBtn">💳 Simulate Payment</button>

      <div class="alert alert-success mt-3 d-none" id="successAlert">
        ✅ Tokens added successfully! (Placeholder)
      </div>
    </div>
  </div>

  <script>
    const tokenInput = document.getElementById("tokenAmount");
    const totalPrice = document.getElementById("totalPrice");
    const dummyPayBtn = document.getElementById("dummyPayBtn");
    const successAlert = document.getElementById("successAlert");

    tokenInput.addEventListener("input", () => {
      const tokens = parseInt(tokenInput.value) || 1;
      totalPrice.textContent = "$" + (tokens * 3);
    });

    dummyPayBtn.addEventListener("click", () => {
      const tokens = parseInt(tokenInput.value) || 1;
      alert(`🔁 Simulating payment for ${tokens} token(s) = $${tokens * 3}`);
      successAlert.classList.remove("d-none");
    });
  </script>

</body>

</html>