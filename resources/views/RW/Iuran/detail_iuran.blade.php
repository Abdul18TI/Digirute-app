@extends('layouts.main')

@section('container')
{{-- tableEdit --}}
{{-- @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
@endpush --}}
{{-- @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endpush --}}

<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">{{ $iuran->judul_iuran }}</h5>
                        <h6 class="text-center">Iuran {{ $iuran->jenis_iurans->nama_jenis_iuran }}</h6>
                            @if ($iuran->jumlah_iuran !== null)
                            <h6 class="text-center mb-3">0/Rp.{{ $iuran->jumlah_iuran }}</h6>
                            @else
                            <h6 class="text-center mb-3">Total terkumpul : Rp.{{ number_format("0",0,".","."); }}</h6>
                            @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="editable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nominal</th>
                                        <th>Status pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($warga as $w)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $w->nama_lengkap }}</td>
                                        <td>{{ $w->alamat }}</td>
                                        <td>
                                            @if ($iuran->target_iuran === null)
                                            Masukkan nominal
                                            @else
                                            Rp.{{ number_format("$iuran->target_iuran",0,".","."); }}
                                            @endif
                                            {{-- {{ $w->jumlah_bayar }} --}}
                                        </td>
                                        <td class="text-center"><div class="checkbox checkbox-solid-primary">
                                            @csrf
                                            <input id="name_aja" class="get_value" value="{{ $iuran->target_iuran }}" type="text" />
                                            <input id="{{ $loop->iteration }}" class="get_value" value="{{ $iuran->target_iuran }}" type="checkbox" />
                                            <label for="{{ $loop->iteration }}">&nbsp;</label>{{ route('rw.pembayaran.store') }}
                                        </div></td>
                                    </tr>
                                    @endforeach
                                    <button type="button" name="submit" id="submit">Simpan</button>
                                </tbody>
                            </table>
                            <h4 id="result"></h4>
                        <form action="{{ route('rw.pembayaran.store') }}" method="post">
                            @csrf
                            <input type="text" name="coba" value="coba">
                            <button type="submit" id="submit">Simpan</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#submit').on('click', function() {
                // var name = $('#name').val();
                var name = $("input[name=_token]").val();;
                var insert = [];
                $('.get_value').each(function() {
                    if ($(this).is(":checked")) {
                        insert.push($(this).val());
                    }
                });
                console.log(insert);
                $.ajax({
                method: "POST",
                url: `{{ route('rw.pembayaran.store') }}`,
                data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
                success: function (data) {
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
                });
            });

            
        //     $.ajax({
        //       url: "/userData",
        //       type: "POST",
        //       data: {
        //           _token: $("#csrf").val(),
        //           type: 1,
        //           name: name,
        //           email: email,
        //           phone: phone,
        //           city: city
        //       },
        //       cache: false,
        //       success: function(dataResult){
        //           console.log(dataResult);
                  
        //           var dataResult = JSON.parse(dataResult);
        //           if(dataResult.statusCode==200){
        //             window.location = "/userData";				
        //           }
        //           else if(dataResult.statusCode==201){
        //              alert("Error occured !");
        //           }
                  
        //       }
        //   });

            // $('#submit').click(function() {
            //     var insert = [];
            //     $('.get_value').each(function() {
            //         if ($(this).is(":checked")) {
            //             insert.push($(this).val());
            //         }
            //     });
            //     $.ajax({
            //         url: "route('pembayaran.store')",
            //         type: "POST",
            //         data: {
            //              "_token" : "{{ csrf_token() }}",
            //             insert: insert
            //         },
            //         success: function(data) {
            //             $('#result').html(data);
            //         }
            //     });
            // });
        });
    </script>
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
                identifier:[1, 'id_pembayaran'],
                editable:[4, 'jumlah_bayar']
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });
    });
</script> --}}
<!-- Zero Configuration  Ends-->
@endsection