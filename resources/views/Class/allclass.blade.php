<header>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</header>

@extends('Layuots.master')
@section('cont')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    <table class=" table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">school Fee</th>
                <th scope="col">opration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">threed</td>
                <td>dddsds</td>
                <td>
                    <a href="/class">
                        <button type="button" class="btn btn-primary">
                            View
                            <i class="fa fa-paint-brush"aria-hidden="true">
                            </i>
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td scope="row">threed</td>
                <td>dddsds</td>
                <td>
                    <a href="/class">
                        <button type="button" class="btn btn-primary">
                            View
                            <i class="fa fa-paint-brush"aria-hidden="true">
                            </i>
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td scope="row">threed</td>
                <td>dddsds</td>
                <td>
                    <a href="/class">
                        <button type="button" class="btn btn-primary">
                            View
                            <i class="fa fa-paint-brush"aria-hidden="true">
                            </i>
                        </button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="createClass">
        <h1 style="text-align: center;color: blueviolet">Cerate Class</h1>

        <form name="classForm" action="{{ url('classroom\insert') }}"
            onsubmit="return validateFormclass()" method="POST">
            @csrf
            <br>
            <label for="classname" class="labWork">Name:</label>
            <input type="text" id="classname" name="name" placeholder="Name..." style="width: 45%;margin-left: 39px">
            <br>
            <label for="schoolFee" class="labWork">School Fee:</label>
            <input type="text" id="schoolFee" name="school-free" placeholder="School Fee..." style="width: 45%">
            <br>
            <h5 class="labWork">Choose a material</h5>
            <input type="checkbox" id="Math" name="Math" value="Bike">
            <label for="Math" class="labCheck">Math</label>
            <input type="checkbox" id="Arabic" name="Arabic" value="Car">
            <label for="Arabic" class="labCheck">Arabic</label>
            <br>
            <button class="but" type="submit" style="width: 45%; margin-left: 116px; height: 50px;">
                <h5 style="margin-top: -1px">
                    Send
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </h5>
            </button>
        </form>

        <script src="{{ url('js/javaScript.js') }}"></script>
    </div>
    <script src="{{ url('js/javaScript.js') }}"></script>
@endsection
