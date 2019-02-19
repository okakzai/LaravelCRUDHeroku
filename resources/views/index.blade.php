<!-- index.blade.php -->
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List Employee</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
	<br />
	<p align="center">
		<a href="{{action('EmployeeController@create')}}" class="btn btn-success">Add Employee</a>
	</p>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div>
	 <br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
		<th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
 
      @foreach($employees as $employee)
      <tr>
        <td>{{$employee['id']}}</td>
        <td>{{$employee['name']}}</td>
 
        <td><a href="{{action('EmployeeController@edit', $employee['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('EmployeeController@destroy', $employee['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>