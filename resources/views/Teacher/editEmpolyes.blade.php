<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
@extends('Layuots.master')
@section('cont')
    <div class="adstudent">
        <form     enctype="multipart/form-data" {{ method_field('PUT') }}
       action="test/{30}" value="PUT" method="PUT" name="teacherForm">
            @csrf

            <br>
            <label for="fname">Name:</label>
            <input type="text" id="fname" name="first_name" value="{{$teacher->first_name}}" style="margin-left: 52px;">

            <label for="faname">Last Name:</label>
            <input type="text" id="laaname" name="last_name"  value="{{$teacher->last_name}}">

            <label for="faname">Father Name:</label>
            <input type="text" id="faname" name="father" value="{{$teacher->father}}">


            <br><br>
            <label for="maname">Mather Name:</label>
            <input type="text" id="maname" name="mother" value="{{$teacher->mother}}">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address"  value="{{$teacher->address}}" style="margin-left: 23px;">

            <label for="birth">BirthDay:</label>
            <input type="date" id="birth" name="birthday"  value="{{$teacher->birthday}}" style="margin-left: 22px;">

            <br><br>
            <label for="numpar">Number:</label>
            <input type="number" id="numpar" name="number" value="{{$teacher->number}}"style="margin-left: 42px;">

            <label for="experience">Experience:</label>
            <input type="text" id="experience" name="experince" value="{{$teacher->experince}}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  value="{{$teacher->email}}" style="margin-left: 44px;">

            <br><br>
            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary"  value="{{$teacher->salary}}" style="margin-left: 54px;">
            <label for="gender">gender:</label>
            <select id="gender" name="sex" style="margin-left: 30px;">
                <option value="mail">mail</option>
                <option value="femail">femail</option>
            </select>

            <input type="file" id="inputGroupFile02" enctype="multipart/form-data" multiple name="image"
                style="margin-left: 110px;width: 112px;">
            <br><br><br>
            <h3 style="margin-left: 15px">Choose a subject</h3>
            @foreach ($subject as $sub)
                <input type="checkbox" id="sybject" name="subject_id[]" value="{{ $sub->id }}">
                <label for="">{{ $sub->name }}</label>
            @endforeach
            <br><br>
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
