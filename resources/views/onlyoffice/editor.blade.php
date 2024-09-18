<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLYOFFICE Editor</title>
    {{-- <script src="http://127.0.0.1:8000/web-apps/apps/api/documents/api.js"></script> --}}
</head>
<body>
    <div id="placeholder"></div>
    {{-- <script type="text/javascript" src="{{ config('app.onlyoffice_url') }}/web-apps/apps/api/documents/api.js"></script> --}}
    <script src="http://127.0.0.1:8000/web-apps/apps/api/documents/api.js"></script>
    <script type="text/javascript">
        var config = @json($config);
        var docEditor = new DocsAPI.DocEditor("placeholder", config);
    </script>
</body>
</html>
