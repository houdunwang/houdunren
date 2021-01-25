<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ site()['title'] }}</title>
    <script src="/modules/Edu/vue/app.js" defer></script>
    <link rel="stylesheet" href="/modules/Edu/vue/app.css">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    <script>
        window.module=@json($module);
        window.site = @json($site);
        window.user = @json(Auth::user()??null);
    </script>
</head>

<body>
    <div id="app"></div>
</body>

</html>
