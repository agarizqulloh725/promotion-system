<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Data dari API</h1>
    <div id="api-data"></div>

    <script src="{{ asset('utils.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async function(event) {
            const token = getCookieValue('access_token');
            const apiDataDiv = document.getElementById('api-data');

            if (token) {
                try {
                    const data = await fetchPageData('/api/v1/me', token, 'GET');
                    apiDataDiv.innerText = JSON.stringify(data, null, 2);
                    console.log('Data berhasil diambil:', data);
                } catch (error) {
                    apiDataDiv.innerText = 'Gagal mengambil data dari API.';
                    console.error('Kesalahan saat mengambil data:', error);
                }

            } else {
                apiDataDiv.innerText = 'Token tidak ditemukan di dalam cookie.';
                console.log('Token tidak ditemukan di dalam cookie');
            }
        });
    </script>
</body>
</html>
