<html lang="en">

<head>
    @include('website.partials.metadata')
    @include('website.partials.styles')
    
    <link rel="icon" type="png/jpg" sizes="16x16" href="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}">
</head>

<body>
    @include('website.partials.content')
    @include('website.partials.scripts')
    <div id="corporate-about"></div>
</body>

</html>
