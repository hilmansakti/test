@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        tr > td > input {
            width: 100%;
        }
    </style>
@endsection

@section('content')
<div class="container" id="regis2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Additional Information</div>

                <div class="card-body">                    
                    <form method="POST" action="{{ route('register.two') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <h4>Address</h4>
                        <table id="table-address" class="table">
                            <thead>
                                <tr>                                    
                                    <th scope="col">Jalan</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    
                                    <td><input class="form-control" type="text" id="jalan" ><span></span></td>
                                    <td><input class="form-control" type="text" id="kelurahan"  ><span></span></td>
                                    <td><input class="form-control" type="text" id="kecamatan" ><span></span></td>
                                    <td><input class="form-control" type="text" id="kota" ><span></span></td>
                                    <td><input class="form-control" type="text" id="kode_pos" ><span></span></td>
                                    <td><input class="form-control" type="text" id="provinsi" ><span></span></td>
                                    <td><button type="button" class="btn btn-success" id="add_row"><b>+</b></button></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h4>Additional</h4>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" required >
                                <input type="hidden" id="age">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" class="@error('gender') is-invalid @enderror" value="male" required checked>Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" class="@error('gender') is-invalid @enderror" value="female" require>Female
                                </label>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="membership" class="col-md-4 col-form-label text-md-right">Membership</label>

                            <div class="col-md-6">
                                <!-- <input id="membership" type="text" class="form-control @error('membership') is-invalid @enderror" name="membership" required > -->

                                <select name="membership" id="membership" class="form-control @error('membership') is-invalid @enderror">
                                    <option value="" selected>-- Select Membership --</option>
                                @foreach($membership as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                                </select>

                                @error('membership')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fee" class="col-md-4 col-form-label text-md-right">Membership Fee</label>

                            <div class="col-md-6">
                                <input id="fee" type="text" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ old('fee') }}" required autofocus readonly>

                                @error('fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">Membership Vat</label>

                            <div class="col-md-2">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autofocus readonly>

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h4>Credit Card</h4>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">CC Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">CC Type</label>

                            <div class="col-md-6">
                                <select name="type" id="membership" class="form-control @error('type') is-invalid @enderror">
                                    <option value="visa" selected>Visa</option>                                
                                    <option value="master" selected>Master</option>                                
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exp_date" class="col-md-4 col-form-label text-md-right">Exp. Date</label>

                            <div class="col-md-6">
                                <input id="exp_date" type="text" class="form-control @error('exp_date') is-invalid @enderror" name="exp_date" required >
                                
                                @error('exp_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Simpan
                                </button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                this.value = "";
                }
            });
            };
        }(jQuery));
    </script>
    <script> 

        $("#exp_date").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: '0'
        });

        $("#number").inputFilter(function(value) {
            return /^\d*$/.test(value);    // Allow digits only, using a RegExp
        });

        $("#dob").datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: '0',
            onSelect: function(value, ui) {
                console.log(ui.selectedYear)
                var today = new Date(), 
                    dob = new Date(value), 
                    age = today.getTime() - dob.getTime();
                
                age = Math.floor(age / (1000 * 60 * 60 * 24 * 365.25));
                console.log(age);
                $('#age').val(age);
            },
        });
        $("#membership").select2();
        var row = 0;
        var table = $("#table-address");

        $("#membership").change(function() {
            var data = {
                membership_id: $(this).val(),
                gender: $("input[name='gender']:checked").val(),
                age: $("#age").val()
            };
            
           
            $.get("{{ url('get-membership-fee') }}", data, function(data, status) {
                console.log(data);
                $("#fee").val(data.fee);
                $("#vat").val(data.vat);
            });
        });

       
        $("#add_row").click(function(e) {
            e.preventDefault();           
            //field 
            var jalan = $("#jalan").val();
            var kelurahan = $("#kelurahan").val();
            var kecamatan = $("#kecamatan").val();
            var kota = $("#kota").val();
            var kode_pos = $("#kode_pos").val();
            var provinsi = $("#provinsi").val();

            if((jalan != "") && (kelurahan != "") && (kecamatan != "") && (kota != "") && (kode_pos != "") && (provinsi != "") ) {
                table.find('input').each(function() {
                    $(this).val("");
                    $(this).parent().find("span").html("");
                });                 
                var new_row = '<tr>'+                               
                                    '<td> <input type="hidden" name="address['+row+'][jalan]" value="'+jalan+'" >'+jalan+'</td>'+
                                    '<td><input type="hidden" name="address['+row+'][kelurahan]" value="'+kelurahan+'">'+kelurahan+'</td>'+
                                    '<td><input type="hidden" name="address['+row+'][kecamatan]" value="'+kecamatan+'">'+kecamatan+'</td>'+
                                    '<td><input type="hidden" name="address['+row+'][kota]" value="'+kota+'">'+kota+'</td>'+
                                    '<td><input type="hidden" name="address['+row+'][kode_pos]" value="'+kode_pos+'">'+kode_pos+'</td>'+
                                    '<td><input type="hidden" name="address['+row+'][provinsi]" value="'+provinsi+'">'+provinsi+'</td>'+
                                    '<td></td>'+
                                '</tr>';

                table.find('tbody').append(new_row);                
                row++;            
            } else {
                alert("please fill all input");
                table.find('input').each(function() {
                    if($(this).val() == "") {
                        console.log('ini')
                        $(this).parent().find("span").html("required");
                    }
                    
                });   
            }

        });

    

    </script> 
@endsection


