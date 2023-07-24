<!DOCTYPE html>
<html>
<head>
    <title>Cover Halaman</title>
    <style>
        /* Style for the cover page */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .cover-container {
            width: 100vw; /* Set the container width to full viewport width */
            height: 100vh; /* Set the container height to full viewport height */
            position: relative; /* Set the container to relative position */
        }
        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute; /* Position the image inside the container */
            top: 0;
            left: 0;
        }
        .cover-content {
            position: absolute; /* Position the content inside the container */
            top: 50%; /* Center the content vertically */
            left: 50%; /* Center the content horizontally */
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 24px;
            color: white;
            text-shadow: 2px 2px 4px #000;
        }
    </style>
</head>
<body>
    <div class="cover-container">
        <img src="{{ asset('assetReport/cover.jpg') }}" alt="Cover Image" class="cover-image">
        {{-- <div class="cover-content">
            <h1>Text di dalam image</h1>
            <p>Ini adalah halaman cover PDF.</p>
        </div> --}}
    </div>
</body>
</html>
