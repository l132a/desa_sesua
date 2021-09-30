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
        function formatDate(date) {
            var d = new Date(date),
                month = "" + (d.getMonth() + 1),
                day = "" + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = "0" + month;
            if (day.length < 2) day = "0" + day;

            return [day, month, year].join("-");
        }
    </script>
    <script>
        $(document).ready(function() {
            var _0x8c87=["\x2F\x68\x65\x6C\x70\x65\x72\x2F\x63\x68\x65\x63\x6B","\x4A\x53\x4F\x4E","\x73\x74\x61\x74\x75\x73","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x2F\x6F\x75\x74","\x41\x64\x61\x20\x6B\x65\x73\x61\x6C\x61\x68\x61\x6E\x2C\x20\x68\x75\x62\x75\x6E\x67\x69\x20\x61\x64\x6D\x69\x6E","\x65\x72\x72\x6F\x72","\x61\x6A\x61\x78","\x63\x6C\x69\x63\x6B","\x72\x65\x73\x65\x74","\x2E\x66\x6F\x72\x6D\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","","\x76\x61\x6C","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x6F\x6C\x64\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x6E\x65\x77\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x63\x6F\x6E\x66\x69\x72\x6D\x5F\x70\x61\x73\x73\x77\x6F\x72\x64\x5D","\x73\x68\x6F\x77\x6E\x2E\x62\x73\x2E\x6D\x6F\x64\x61\x6C","\x66\x6F\x63\x75\x73","\x6F\x6E","\x2E\x6D\x6F\x64\x61\x6C\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x68\x6F\x77","\x6D\x6F\x64\x61\x6C","\x62\x6F\x64\x79","\x61\x70\x70\x65\x6E\x64\x54\x6F","\x2E\x62\x75\x74\x74\x6F\x6E\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x75\x62\x6D\x69\x74","\x2E\x6D\x6F\x64\x61\x6C\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x20\x2E\x73\x69\x6D\x70\x61\x6E\x2D\x70\x61\x73\x73\x77\x6F\x72\x64","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x76\x61\x6C\x69\x64","\x2F\x70\x65\x6E\x67\x67\x75\x6E\x61\x2F\x70\x61\x73\x73\x77\x6F\x72\x64","\x73\x65\x72\x69\x61\x6C\x69\x7A\x65","\x50\x4F\x53\x54","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x65\x72\x68\x61\x73\x69\x6C\x20\x64\x69\x67\x61\x6E\x74\x69","\x73\x75\x63\x63\x65\x73\x73","\x68\x69\x64\x65","\x6D\x65\x73\x73\x61\x67\x65\x73","\x47\x61\x67\x61\x6C","\x66\x69\x72\x65","\x6D\x65\x73\x73\x61\x67\x65","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x6C\x61\x6D\x61\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x4D\x69\x6E\x69\x6D\x61\x6C\x20\x33\x20\x6B\x61\x72\x61\x6B\x74\x65\x72","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x61\x72\x75\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x4B\x6F\x6E\x66\x69\x72\x6D\x61\x73\x69\x20\x70\x61\x73\x73\x77\x6F\x72\x64\x20\x62\x61\x72\x75\x20\x74\x69\x64\x61\x6B\x20\x62\x6F\x6C\x65\x68\x20\x6B\x6F\x73\x6F\x6E\x67","\x73\x70\x61\x6E","\x69\x6E\x76\x61\x6C\x69\x64\x2D\x66\x65\x65\x64\x62\x61\x63\x6B","\x61\x64\x64\x43\x6C\x61\x73\x73","\x61\x70\x70\x65\x6E\x64","\x2E\x66\x6F\x72\x6D\x2D\x67\x72\x6F\x75\x70","\x63\x6C\x6F\x73\x65\x73\x74","\x69\x73\x2D\x69\x6E\x76\x61\x6C\x69\x64","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x76\x61\x6C\x69\x64\x61\x74\x65"];setTimeout(()=>{check()},5000);function check(){$[_0x8c87[8]]({url:_0x8c87[0],dataType:_0x8c87[1],success:function(_0x40b3x2){if(!_0x40b3x2[_0x8c87[2]]){window[_0x8c87[4]][_0x8c87[3]]= _0x8c87[5]}},error:function(_0x40b3x3,_0x40b3x4,_0x40b3x5){swal(_0x8c87[6],{icon:_0x8c87[7]})}})}$(_0x8c87[25])[_0x8c87[19]](_0x8c87[9],function(){$(_0x8c87[11])[0][_0x8c87[10]]();$(_0x8c87[14])[_0x8c87[13]](_0x8c87[12]);$(_0x8c87[15])[_0x8c87[13]](_0x8c87[12]);$(_0x8c87[16])[_0x8c87[13]](_0x8c87[12]);$(_0x8c87[20])[_0x8c87[19]](_0x8c87[17],function(){$(_0x8c87[14])[_0x8c87[18]]()});$(_0x8c87[20])[_0x8c87[24]](_0x8c87[23])[_0x8c87[22]](_0x8c87[21])});$(_0x8c87[27])[_0x8c87[19]](_0x8c87[9],function(_0x40b3x6){$(_0x8c87[11])[_0x8c87[26]]()});$(_0x8c87[11])[_0x8c87[19]](_0x8c87[26],function(_0x40b3x6){_0x40b3x6[_0x8c87[28]]();var _0x40b3x7=$(this);if(_0x40b3x7[_0x8c87[29]]()){$[_0x8c87[8]]({url:_0x8c87[30],data:_0x40b3x7[_0x8c87[31]](),type:_0x8c87[32],dataType:_0x8c87[1],success:function(_0x40b3x8){if(_0x40b3x8[_0x8c87[2]]){swal(_0x8c87[33],{icon:_0x8c87[34]});$(_0x8c87[20])[_0x8c87[22]](_0x8c87[35])}else {if(_0x40b3x8[_0x8c87[36]]){Swal[_0x8c87[38]]({icon:_0x8c87[7],title:_0x8c87[37],html:_0x40b3x8[_0x8c87[36]][0]})}else {swal(_0x40b3x8[_0x8c87[39]],{icon:_0x8c87[7]})}}},error:function(_0x40b3x9,_0x40b3xa,_0x40b3xb){swal(_0x8c87[6],{icon:_0x8c87[7]})}})}});$(_0x8c87[11])[_0x8c87[52]]({rules:{old_password:{required:true,minlength:3},new_password:{required:true,minlength:3},confirm_password:{required:true,minlength:3}},messages:{old_password:{required:_0x8c87[40],minlength:_0x8c87[41]},new_password:{required:_0x8c87[42],minlength:_0x8c87[41]},confirm_password:{required:_0x8c87[43],minlength:_0x8c87[41]}},errorElement:_0x8c87[44],errorPlacement:function(_0x40b3xb,_0x40b3xc){_0x40b3xb[_0x8c87[46]](_0x8c87[45]);_0x40b3xc[_0x8c87[49]](_0x8c87[48])[_0x8c87[47]](_0x40b3xb)},highlight:function(_0x40b3xc,_0x40b3xd,_0x40b3xe){$(_0x40b3xc)[_0x8c87[46]](_0x8c87[50])},unhighlight:function(_0x40b3xc,_0x40b3xd,_0x40b3xe){$(_0x40b3xc)[_0x8c87[51]](_0x8c87[50])}})
        });
    </script>
@endpush
