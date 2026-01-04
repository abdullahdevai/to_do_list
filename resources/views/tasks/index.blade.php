<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>


<table class="table-auto">
  <thead>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>is_active</th>
    </tr>
  </thead>
  <tbody>
@foreach ($tasks ?? [] as $task )
<tr>
      <td>  {{ $task['id'] }} </td>
      <td> {{ $task['title'] }} </td>
      <td> {{ $task['is_completed'] }} </td>
    </tr>
@endforeach

  </tbody>
</table>
</body>
</html>
