<html>
<head>
    <link rel="stylesheet" href="/public/stylesheets/app.css">
</head>

<form enctype="multipart/form-data" action="/calculate/procces" method="POST" id="form">

    Please select a File: <input name="fupload" type="file" id="ufile"><br>

   <br> Please select Type of:  <select name="type">
        <option value="">Type of operations</option>
        <option value="plus">Plus</option>
        <option value="minus">Minus</option>
        <option value="multiply">Multiply</option>
        <option value="devide">Devide</option>

    </select><br>

<br>
   Start  <input type="submit" value="Proccess">

</form>


</html>