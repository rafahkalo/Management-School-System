<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
@extends('Layuots.master')
@section('cont')

    <div class="adstudent">
        <form method="POST"  enctype="multipart/form-data" action="{{url('teacher\insert')}}" onsubmit="return validateFormTeacher()">
      @csrf
<br>
            <label for="fname">Name:</label>
            <input type="text" id="fname" name="first_name" placeholder="name..." style="margin-left: 32px;">

            <label for="faname">Last Name:</label>
            <input type="text" id="faname" name="last_name" placeholder="Last Name...">

            <label for="faname">Father Name:</label>
            <input type="text" id="faname" name="father" placeholder="Father Name...">


            <label for="maname">Mather Name:</label>
            <input type="text" id="maname" name="mother" placeholder="Mather Name...">

            <br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Address..." style="margin-left: 20px;">

            <label for="birth">BirthDay:</label>
            <input type="date" id="birth" name="birthday" placeholder="Birth Day..." style="margin-left: 28px;">

            <label for="numpar">Number:</label>
            <input type="text" id="numpar" name="number" placeholder="Number..." style="margin-left: 41px;">
            <br><br>
            <label for="experience">Experience:</label>
            <input type="text" id="experience" name="experince" placeholder="Experience...">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email..." style="margin-left: 45px;">

            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" placeholder="Salary..." style="margin-left: 55px;">
            <br><br>
            <label for="gender">gender:</label>
            <select id="gender" name="sex" style="margin-left: 30px;">
                <option value="mail">mail</option>
                <option value="femail">femail</option>
            </select>

            <input type="file" id="inputGroupFile02" enctype="multipart/form-data" multiple name="image" style="margin-left: 110px;width: 102px;">
            <br><br><br>
            <h3 style="margin-left: 15px">Choose a material</h3>
            
            @foreach($subject as $sub)
            <input type="checkbox" id="is"  name="subject_id[]" value="{{$sub->id}}">
            <label for="is" >{{$sub->name}}</label>
           @endforeach
           
  
            <button class="but" type="submit" value="Send" style="width: 25%; margin-left: 350px; height: 50px;">
                <h5 style="margin-top: -1px">
                    Send
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </h5>
            </button>
        </form>

        <script src="{{ url('js/javaScript.js') }}"></script>
    </div>
@endsection
