<html>
    <head>

    </head>
    <body>
        
        <form action="postdata" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="nama">
            @if($errors->has('nama'))
                <p style="color:red;">{{ $errors->first('nama') }}</p>
            @endif
            <br>

            <input type="email" name="email" placeholder="email"><br>
            @if($errors->has('email'))
                <p style="color:red;">{{ $errors->first('email') }}</p>
            @endif

            <input type="text" name="nohp" placeholder="nohp" maxlength="13"><br>
            @if($errors->has('nohp'))
                <p style="color:red;">{{ $errors->first('nohp') }}</p>
            @endif
            <input type="submit" value="submit">
        </form>
    </body>
</html>
