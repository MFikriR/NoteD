<!DOCTYPE html>
<html>
<head>
    <title>Edit Setting</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h2>Edit Setting</h2>
    <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="key">Key:</label>
            <input type="text" class="form-control" id="key" name="key" value="{{ $setting->key }}" readonly>
        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <input type="file" class="form-control" id="value" name="value">
        </div>
        <button type="submit" class="btn btn-primary">Update Setting</button>
    </form>
</div>
</body>
</html>
