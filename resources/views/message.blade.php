<html>
<title>Send message</title>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</head>

<body style="padding: 2%">
    <h1 style="text-align: center; color: red">Send message form</h1>
    <form action='{{ route('sendMessage') }}' method='post'>
        @csrf
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
        @endif

        @if (session('success'))
            {{ session('success') }}
        @endif

        <h1>Phone numbers (seperate with a comma [,])</h1>
        {{-- <input type='text' name='numbers' /> --}}
        <textarea name="numbers" id="" cols="200" rows="10"
            placeholder="Enter phone number seperated with comma,"></textarea>

        <h1>Message</h1>
        <textarea name='message' id="" cols="50" rows="20" placeholder="Type message here,"></textarea>

        <button type='submit' class="btn btn-success">Send!</button>
    </form>
</body>

</html>
