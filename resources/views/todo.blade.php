<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
        }
        form input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form button {
            padding: 10px 15px;
            border: none;
            background: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            background: #eee;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        a{
            text-decoration: none;
            color: #333;
        }
        a:hover {
            color: #007bff;
        }
        .actions {
            float: right;
        }
        .actions i {
            margin-left: 10px;
            cursor: pointer;
        }
        .done {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My To-Do List</h1>
        @if(session('success'))
            <p style="color: #28a745">{{ session('success') }}</p>
        @endif
        <!-- Add Task Form -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="/add-task">
            @csrf
            <input type="text" name="task" placeholder="Enter new task" required>
            <button type="submit">Add</button>
        </form>

        <!-- Task List -->
        <ul>
            @if($todos->isEmpty())
                <li>No tasks available.</li>
            @else
                @foreach ($todos as $todo)
                <li class="{{ $todo->is_done ? 'done' : '' }}">
                    {{ $todo->task }}
                    <span class="actions">
                        @if(!$todo->is_done)
                        <a href="/mark-done/{{ $todo->id }}"><i class="fa fa-check" title="Mark as done"></i></a>
                        @endif
                        <a href="/delete/{{$todo->id}}"><i class="fa fa-trash" title="Delete"></i></a>
                    </span>
                </li>
                @endforeach
            @endif
        </ul>

    </div>
</body>
</html>

