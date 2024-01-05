<?php
session_start();
if (!isset($_SESSION['cuid'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['cuid_role'] === "default") {
    header('Location: ../index.php');
    exit();
}
?>
<?php include("../templates/header.php"); ?>
<title>home</title>
</head>

<body>
    <h2 class="fs-2">harvscan</h2>
    <p>Scan a barcode to begin</p>
    <main>
        <div id="scanner-container"></div>
        <p id="barcode-result"></p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
    <script>
        navigator.mediaDevices.getUserMedia({
            video: true
        })
        // Initialize QuaggaJS
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#scanner-container'),
                constraints: {
                    facingMode: "environment" // use the rear camera
                }
            },
            decoder: {
                decoder: {
                    readers: [
                        "code_128_reader"
                    ]
                }
            }
        }, function(err) {
            if (err) {
                console.error(err);
                return;
            }
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            document.querySelector('#barcode-result').textContent = data.codeResult.code;
            document.querySelector('#scanner-container').style.display = 'none';
            // Optionally, you can make an AJAX request to your server here
            Quagga.stop();
        });
    </script>
    <?php include("../templates/footer.php"); ?>
</body>