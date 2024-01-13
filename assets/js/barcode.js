navigator.mediaDevices.getUserMedia({
    video: true
});
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
                "code_128_reader",
                "ean_reader",
                "ean_8_reader",
                "code_39_reader",
                "code_39_vin_reader",
                "codabar_reader",
                "upc_reader",
                "upc_e_reader",
                "i2of5_reader"
            ]
        }
    }
}, function (err) {
    if (err) {
        console.error(err);
        return;
    }
    Quagga.start();
});

Quagga.onDetected(function (data) {
    document.querySelector('#barcode-result').textContent = data.codeResult.code;
    document.querySelector('#scanner-container').style.display = 'none';
    // Optionally, you can make an AJAX request to your server here
    Quagga.stop();
});
