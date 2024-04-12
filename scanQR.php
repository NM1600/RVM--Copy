<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
            </div>
            <div class="col-md-6">
                <label>SCAN QR CODE</label>
                <form id="qrForm" method="post">
                    <textarea name="text" id="text" readonly placeholder="Scanned QR Data" class="form-control" rows="5"></textarea>
                    <input type="submit" value="Save QR details" class="btn">
                </form>
            </div>
        </div>
        <form action="adminDashboard.php" method="post">
            <input type="submit" value="Back to Dashboard" class="btn">
        </form>
    </div>

    <script>
        // Check for mobile device and getUserMedia support
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Initialize Instascan scanner
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('No Cameras Found');
                }
            }).catch(function (e) {
                console.error(e);
            });

            // Add event listener for scanning QR code
            scanner.addListener('scan', function (content) {
                // Set the scanned content to the text area
                document.getElementById('text').value = content;
            });
        } else if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
            // Alternative approach using MediaDevices API
            navigator.mediaDevices.enumerateDevices()
                .then(function (devices) {
                    const videoDevices = devices.filter(device => device.kind === 'videoinput');
                    if (videoDevices.length > 0) {
                        navigator.mediaDevices.getUserMedia({ video: true })
                            .then(function (stream) {
                                document.getElementById('preview').srcObject = stream;
                            })
                            .catch(function (error) {
                                console.error('Error accessing camera:', error);
                            });
                    } else {
                        alert('No Cameras Found');
                    }
                })
                .catch(function (error) {
                    console.error('Error enumerating devices:', error);
                });
        } else {
            // Handle the case where getUserMedia and enumerateDevices are not supported
            alert('Camera access is not supported on this device');
        }
    </script>
</body>
</html>
