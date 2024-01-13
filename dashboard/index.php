<?php
session_start();
if (!isset($_SESSION['cuid'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['cuid_role'] === "default") {
    http_response_code(418);
    header('Location: ../forbidden.php');
    exit();
}
?>
<?php include("../templates/header.php"); ?>
<title>dashboard</title>
</head>

<body>
    <h2 class="fs-2">harvscan</h2>
    <p>Scan a barcode to begin</p>
    <main>
        <div id="scanner-container">
            <canvas class="drawingBuffer" style="display: none;"></canvas>
        </div>
        <p id="barcode-result"></p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
    <script src="../assets/js/barcode.js"></script>
    <?php include("../templates/footer.php"); ?>
</body>