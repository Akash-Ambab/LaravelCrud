<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <title>Laravel Crud</title>
</head>

<body>
    
<div class="formContainer">
    <h3>Laravel Crud</h3>
    
    <form action="/student/{{$record->id}}/update" id="updateInfo" method="POST">
        @csrf
        <table id="formTable">
            <tr>
                <td class="lable">Student Name <span>*</span></td>
                <td class="control">
                    <input type="text" id="name" name="name" value="{{$record->name}}">
                    <p id="nameError"></p>
                </td>
            </tr>
            <tr>
                <td class="lable">Phone Number <span>*</span></td>
                <td class="control">
                    <input type="tel" id="contact" name="contact" value="{{$record->contact}}">
                    <p id="contactError"></p>
                </td>
            </tr>
            <tr>
                <td class="lable">Class <span>*</span></td>
                <td class="control">
                    <select id="class" name="class">
                        <option value="">Select Class</option>
                        <option value="BSc">BSc</option>
                        <option value="BSc IT">BSc IT</option>
                        <option value="BCom">BCom</option>
                        <option value="BBA">BBA</option>
                        <option value="BAF">BAF</option>
                    </select>
                    <p id="classError"></p>
                </td>
            </tr>
            <tr>
                <td class="lable">Course <span>*</span></td>
                <td class="control">
                    <select id="course" name="course">
                        <option value="">Select Course</option>
                        <option value="PHP">PHP</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="DBMS">DBMS</option>
                        <option value="C++">C++</option>
                    </select>
                    <p id="courseError"></p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="control"><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
    <h1 id="success">Form Submitted Successfully</h1>
    <script src="{{asset('js/action.js')}}"></script>
</div>
</body>
</html>