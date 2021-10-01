<form class="form-inline mr-auto" action="">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
                Hi, {{ auth()->user()->name }}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="javascript:void(0)" class="dropdown-item has-icon button-password">
                <i class="fas fa-lock"></i> Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </li>
</ul>

<div class="modal fade modal-password" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-password">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dinas">Password Lama</label>
                        <input type="hidden" value="{{ auth()->user()->id }}" name="id" />
                        <input type="password" class="form-control text-sm" name="old_password" required
                            placeholder="Masukkan password lama">
                    </div>
                    <div class="form-group">
                        <label for="dinas">Password Baru</label>
                        <input type="password" class="form-control text-sm" name="new_password" required
                            placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label for="dinas">Ulang Password Baru</label>
                        <input type="password" class="form-control text-sm" name="confirm_password" required
                            placeholder="Konfirmasi password baru">
                    </div>
                </div>
            </form>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success simpan-password">Simpan</button>
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        var _0x15ae=["","\x67\x65\x74\x4D\x6F\x6E\x74\x68","\x67\x65\x74\x44\x61\x74\x65","\x67\x65\x74\x46\x75\x6C\x6C\x59\x65\x61\x72","\x6C\x65\x6E\x67\x74\x68","\x30","\x2D","\x6A\x6F\x69\x6E"];function formatDate(_0xfc9fx2){var _0xfc9fx3= new Date(_0xfc9fx2),_0xfc9fx4=_0x15ae[0]+ (_0xfc9fx3[_0x15ae[1]]()+ 1),_0xfc9fx5=_0x15ae[0]+ _0xfc9fx3[_0x15ae[2]](),_0xfc9fx6=_0xfc9fx3[_0x15ae[3]]();if(_0xfc9fx4[_0x15ae[4]]< 2){_0xfc9fx4= _0x15ae[5]+ _0xfc9fx4};if(_0xfc9fx5[_0x15ae[4]]< 2){_0xfc9fx5= _0x15ae[5]+ _0xfc9fx5};return [_0xfc9fx5,_0xfc9fx4,_0xfc9fx6][_0x15ae[7]](_0x15ae[6])}
    </script>
    <script>
        $(document).ready(function() {
            var _0x2f17=["\x6F\x6E\x4C\x69\x6E\x65","\x2F\x68\x65\x6C\x70\x65\x72\x2F\x63\x68\x65\x63\x6B","\x4A\x53\x4F\x4E","\x73\x74\x61\x74\x75\x73","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x2F\x6F\x75\x74","\x61\x6A\x61\x78","\x63\x6C\x69\x63\x6B","\x72\x65\x73\x65\x74","\x2E\x66\x6F\x72\x6D\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","","\x76\x61\x6C","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x6F\x6C\x64\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x6E\x65\x77\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x63\x6F\x6E\x66\x69\x72\x6D\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x73\x68\x6F\x77\x6E\x2E\x62\x73\x2E\x6D\x6F\x64\x61\x6C","\x66\x6F\x63\x75\x73","\x6F\x6E","\x2E\x6D\x6F\x64\x61\x6C\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x68\x6F\x77","\x6D\x6F\x64\x61\x6C","\x62\x6F\x64\x79","\x61\x70\x70\x65\x6E\x64\x54\x6F","\x2E\x62\x75\x74\x74\x6F\x6E\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x75\x62\x6D\x69\x74","\x2E\x6D\x6F\x64\x61\x6C\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x20\x2E\x73\x69\x6D\x70\x61\x6E\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x76\x61\x6C\x69\x64","\x2F\x70\x65\x6E\x67\x67\x75\x6E\x61\x2F\x5B\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x65\x72\x69\x61\x6C\x69\x7A\x65","\x50\x4F\x53\x54","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x65\x72\x68\x61\x73\x69\x6C\x20\x64\x69\x67\x61\x6E\x74\x69","\x73\x75\x63\x63\x65\x73\x73","\x68\x69\x64\x65","\x6D\x65\x73\x73\x61\x67\x65\x73","\x65\x72\x72\x6F\x72","\x47\x61\x67\x61\x6C","\x66\x69\x72\x65","\x6D\x65\x73\x73\x61\x67\x65","\x41\x64\x61\x20\x6B\x65\x73\x61\x6C\x61\x68\x61\x6E\x2C\x20\x68\x75\x62\x75\x6E\x67\x69\x20\x61\x64\x6D\x69\x6E","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x6C\x61\x6D\x61\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x4D\x69\x6E\x69\x6D\x61\x6C\x20\x33\x20\x6B\x61\x72\x61\x6B\x74\x65\x72","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x61\x72\x75\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x4B\x6F\x6E\x66\x69\x72\x6D\x61\x73\x69\x20\x70\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x61\x72\x75\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x73\x70\x61\x6E","\x69\x6E\x76\x61\x6C\x69\x64\x2D\x66\x65\x65\x64\x62\x61\x63\x6B","\x61\x64\x64\x43\x6C\x61\x73\x73","\x61\x70\x70\x65\x6E\x64","\x2E\x66\x6F\x72\x6D\x2D\x67\x72\x6F\x75\x70","\x63\x6C\x6F\x73\x65\x73\x74","\x69\x73\x2D\x69\x6E\x76\x61\x6C\x69\x64","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x76\x61\x6C\x69\x64\x61\x74\x65"];setTimeout(()=>{if(navigator[_0x2f17[0]]){check()}},5000);function check(){$[_0x2f17[7]]({url:_0x2f17[1],dataType:_0x2f17[2],success:function(_0x602fx2){if(!_0x602fx2[_0x2f17[3]]){window[_0x2f17[5]][_0x2f17[4]]= _0x2f17[6]}}})}$(_0x2f17[24])[_0x2f17[18]](_0x2f17[8],function(){$(_0x2f17[10])[0][_0x2f17[9]]();$(_0x2f17[13])[_0x2f17[12]](_0x2f17[11]);$(_0x2f17[14])[_0x2f17[12]](_0x2f17[11]);$(_0x2f17[15])[_0x2f17[12]](_0x2f17[11]);$(_0x2f17[19])[_0x2f17[18]](_0x2f17[16],function(){$(_0x2f17[13])[_0x2f17[17]]()});$(_0x2f17[19])[_0x2f17[23]](_0x2f17[22])[_0x2f17[21]](_0x2f17[20])});$(_0x2f17[26])[_0x2f17[18]](_0x2f17[8],function(_0x602fx3){$(_0x2f17[10])[_0x2f17[25]]()});$(_0x2f17[10])[_0x2f17[18]](_0x2f17[25],function(_0x602fx3){_0x602fx3[_0x2f17[27]]();var _0x602fx4=$(this);if(_0x602fx4[_0x2f17[28]]()){$[_0x2f17[7]]({url:_0x2f17[29],data:_0x602fx4[_0x2f17[30]](),type:_0x2f17[31],dataType:_0x2f17[2],success:function(_0x602fx5){if(_0x602fx5[_0x2f17[3]]){swal(_0x2f17[32],{icon:_0x2f17[33]});$(_0x2f17[19])[_0x2f17[21]](_0x2f17[34])}else {if(_0x602fx5[_0x2f17[35]]){Swal[_0x2f17[38]]({icon:_0x2f17[36],title:_0x2f17[37],html:_0x602fx5[_0x2f17[35]][0]})}else {swal(_0x602fx5[_0x2f17[39]],{icon:_0x2f17[36]})}}},error:function(_0x602fx6,_0x602fx7,_0x602fx8){swal(_0x2f17[40],{icon:_0x2f17[36]})}})}});$(_0x2f17[10])[_0x2f17[53]]({rules:{old_password:{required:true,minlength:3},new_password:{required:true,minlength:3},confirm_password:{required:true,minlength:3}},messages:{old_password:{required:_0x2f17[41],minlength:_0x2f17[42]},new_password:{required:_0x2f17[43],minlength:_0x2f17[42]},confirm_password:{required:_0x2f17[44],minlength:_0x2f17[42]}},errorElement:_0x2f17[45],errorPlacement:function(_0x602fx8,_0x602fx9){_0x602fx8[_0x2f17[47]](_0x2f17[46]);_0x602fx9[_0x2f17[50]](_0x2f17[49])[_0x2f17[48]](_0x602fx8)},highlight:function(_0x602fx9,_0x602fxa,_0x602fxb){$(_0x602fx9)[_0x2f17[47]](_0x2f17[51])},unhighlight:function(_0x602fx9,_0x602fxa,_0x602fxb){$(_0x602fx9)[_0x2f17[52]](_0x2f17[51])}})
        });
    </script>
@endpush
