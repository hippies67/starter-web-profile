@extends('layouts.main', ['web' => $web])
@section('title', 'Tahungoding')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
  integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

<style>
  .dropify-wrapper {
    border: 1px solid #e2e7f1;
    border-radius: .3rem;
    height: 90%;
  }

  #cke_description {
    border: 1px solid #e2e7f1;
    border-width: thin;
  }

  .card {
    border-radius: 10px;
  }

  label.error {
    color: #f1556c;
    font-size: 13px;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 5px;
    padding: 0;
  }

  input.error {
    color: #f1556c;
    border: 1px solid #f1556c;
  }

  textarea.error {
    color: #f1556c;
    border: 1px solid #f1556c;
  }
</style>
@endsection
@section('container')
<section class="section">
  <div class="section-header">
    <h1>Profile Web</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Profile Web</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-xl">
        <div class="card">
          <div class="card-body">
            @if(count($web))
            @foreach ($web as $webs)
            <form action="{{ route('profile-web.update', $webs->id) }}" method="POST" id="editWebForm"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-sm">
                  <label for="primary_color">Primary Color</label>
                  <input type="text" id="color-picker" name="edit_primary_color" class="form-control text-dark"
                    value="{{ $webs->primary_color }}" placeholder="Warna Primer">
                </div>
                <div class="col-sm">
                  <label for="tagLine">Tagline</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(79, 29, 242)"
                        id="inputGroupPrepend3"><i class="fas fa-tags"></i></span>
                    </div>
                    <input type="text" id="tagline" name="edit_tagline"
                      value="{{old('edit_tagline') ?? $webs->tagline}}" class="form-control text-dark"
                      placeholder="Tagline">
                  </div>
                </div>
                <div class="col-sm">
                  <label for="phone">Nomor Hp</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(38, 40, 41)"
                        id="inputGroupPrepend3"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" id="edit_phone" name="edit_phone" value="{{old('edit_phone') ?? $webs->phone}}"
                      class="form-control text-dark" placeholder="Nomor Hp">
                  </div>
                  <label for="edit_phone" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="name">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(235, 196, 21)"
                        id="inputGroupPrepend3"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" id="edit_name" name="edit_name" value="{{old('edit_name') ?? $webs->name}}"
                      class="form-control text-dark" placeholder="Nama">
                  </div>
                  <label for="edit_name" generated="true" class="error" style="display: none;"></label>
                </div>
                <div class="col-sm">
                  <label for="instagram">Instagram</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(225,48,108)"
                        id="inputGroupPrepend3"><i class="fab fa-instagram"></i></span>
                    </div>
                    <input type="text" id="instagram" onkeyup="keyup('instagram')" name="edit_instagram"
                      value="{{old('edit_instagram') ?? $webs->instagram}}" class="form-control text-dark"
                      placeholder="Username instagram">
                  </div>
                  <small>https://instagram.com/<b
                      id="instagramUsername">{{old('edit_instagram') ?? $webs->instagram}}</b></small>
                </div>
                <div class="col-sm">
                  <label for="facebook">Facebook</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info text-white" id="inputGroupPrepend3"><i
                          class="fab fa-facebook-f"></i></span>
                    </div>
                    <input type="text" id="facebook" onkeyup="keyup('facebook')" name="edit_facebook"
                      class="form-control text-dark" value="{{old('edit_facebook') ?? $webs->facebook}}"
                      placeholder="Username facebook">
                  </div>
                  <small>https://facebook.com/<b
                      id="facebookUsername">{{old('edit_facebook') ?? $webs->facebook}}</b></small>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-4">
                  <label for="twitter">Twitter</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(29, 161, 242)"
                        id="inputGroupPrepend3"><i class="fab fa-twitter"></i></span>
                    </div>
                    <input type="text" id="twitter" onkeyup="keyup('twitter')" name="edit_twitter"
                      class="form-control text-dark" value="{{old('edit_twitter') ?? $webs->twitter}}"
                      placeholder="Username twitter">
                  </div>
                  <small>https://twitter.com/<b
                      id="twitterUsername">{{old('edit_twitter') ?? $webs->twitter}}</b></small>
                </div>
                <div class="col-4">
                  <label for="whatsapp">Whatsapp</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(37, 211, 102)"
                        id="inputGroupPrepend3"><i class="fab fa-whatsapp"></i></span>
                    </div>
                    <input type="text" id="whatsapp" onkeyup="keyup('whatsapp')" name="edit_whatsapp"
                      class="form-control text-dark" value="{{old('edit_whatsapp') ?? $webs->whatsapp}}"
                      placeholder="Ganti awalan 0 dengan 62">
                  </div>
                  <small>https://wa.me/<b id="whatsappUsername">{{old('edit_whatsapp') ?? $webs->whatsapp}}</b></small>
                </div>
                <div class="col-4">
                  <label for="youtube">Youtube</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: #FF0000"
                        id="inputGroupPrepend3"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input type="text" id="youtube" onkeyup="keyup('youtube')" name="edit_youtube"
                      class="form-control text-dark" value="{{old('edit_youtube') ?? $webs->youtube}}"
                      placeholder="Username Youtube">
                  </div>
                  <small>https://youtube.com/c/<b
                      id="youtubeUsername">{{old('edit_youtube') ?? $webs->youtube}}</b></small>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger text-white" id="inputGroupPrepend3"><i
                          class="fa fa-envelope"></i> </span>
                    </div>
                    <input type="email" id="edit_email" onkeyup="keyup('email')" name="edit_email"
                      class="form-control text-dark" value="{{old('edit_email') ?? $webs->email}}"
                      placeholder="Alamat email">
                  </div>
                  <small>mailto:<b id="emailUsername">{{old('edit_email') ?? $webs->email}}</b></small>
                  <br>
                  <label for="edit_email" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="email">Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(95, 95, 95); height: 100%;"
                        id="inputGroupPrepend3"><i class="fa fa-info"></i> </span>
                    </div>
                    <textarea name="edit_address" id="edit_address" class="form-control"
                      style="height: 100%;">{{$webs->address}}</textarea>
                  </div>
                  <label for="edit_address" generated="true" class="error" style="display: none;"></label>
                </div>
                <div class="col-sm">
                  <label for="logo">Logo</label>
                  <input type="file" class="form-control dropify" name="edit_logo" id="edit_logo"
                    data-allowed-file-extensions="png jpg jpeg" data-show-remove="false" data-default-file="@if(!empty($webs->logo) &&
                    Storage::exists($webs->logo)){{ Storage::url($webs->logo) }}@endif">
                  <small>Format <b>png,jpg,jpeg</b> (1MB max)</small>
                  <br>
                  <label for="edit_logo" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-sm">
                  <label for="email">Deskripsi</label>
                  <textarea name="edit_description" id="description"
                    class="form-control">{!!$webs->description!!}</textarea>
                  <label for="description" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <button type="button" class="btn btn-md btn-danger text-right" data-toggle="modal"
                    data-target="#deleteProfileWeb"><i class="fas fa-plus-circle"></i>
                    Hapus</button>
                </div>
                <div class="col-sm text-right">
                  <button type="submit" class="btn btn-md btn-primary" id="editButton"><i
                      class="fas fa-plus-circle"></i> Perbaharui</button>
                </div>
              </div>
            </form>
            <form action="{{ route('profile-web.destroy', $webs->id) }}" method="post" id="hapusForm">
              @csrf
              @method('delete')
            </form>
            @endforeach
            @else
            <form action="{{ route('profile-web.store') }}" method="POST" id="tambahWebForm"
              enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm">
                  <label for="primary_color">Primary Color</label>
                  <input type="text" id="color-picker" name="primary_color" class="form-control text-dark"
                    value="#6777ef" placeholder="Warna Primer">
                </div>
                <div class="col-sm">
                  <label for="tagLine">Tagline</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(79, 29, 242)"
                        id="inputGroupPrepend3"><i class="fas fa-tags"></i></span>
                    </div>
                    <input type="text" id="tagline" name="tagline" value="{{old('tagline')}}"
                      class="form-control text-dark" placeholder="Tagline">
                  </div>
                </div>
                <div class="col-sm">
                  <label for="phone">Nomor Hp</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(38, 40, 41)"
                        id="inputGroupPrepend3"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control text-dark"
                      placeholder="Nomor Hp">
                  </div>
                  <label for="phone" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="name">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(235, 196, 21)"
                        id="inputGroupPrepend3"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control text-dark"
                      placeholder="Nama">
                  </div>
                  <label for="name" generated="true" class="error" style="display: none;"></label>
                </div>
                <div class="col-sm">
                  <label for="instagram">Instagram</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(225,48,108)"
                        id="inputGroupPrepend3"><i class="fab fa-instagram"></i></span>
                    </div>
                    <input type="text" id="instagram" onkeyup="keyup('instagram')" name="instagram"
                      value="{{old('instagram')}}" class="form-control text-dark" placeholder="Username instagram">
                  </div>
                  <small>https://instagram.com/<b id="instagramUsername">{{old('instagram')}}</b></small>
                </div>
                <div class="col-sm">
                  <label for="facebook">Facebook</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info text-white" id="inputGroupPrepend3"><i
                          class="fab fa-facebook-f"></i></span>
                    </div>
                    <input type="text" id="facebook" onkeyup="keyup('facebook')" name="facebook"
                      class="form-control text-dark" value="{{old('facebook') }}" placeholder="Username facebook">
                  </div>
                  <small>https://facebook.com/<b id="facebookUsername">{{old('facebook')}}</b></small>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-4">
                  <label for="twitter">Twitter</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(29, 161, 242)"
                        id="inputGroupPrepend3"><i class="fab fa-twitter"></i></span>
                    </div>
                    <input type="text" id="twitter" onkeyup="keyup('twitter')" name="twitter"
                      class="form-control text-dark" value="{{old('twitter')}}" placeholder="Username twitter">
                  </div>
                  <small>https://twitter.com/<b id="twitterUsername">{{old('twitter')}}</b></small>
                </div>
                <div class="col-sm-4">
                  <label for="whatsapp">Whatsapp</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(37, 211, 102)"
                        id="inputGroupPrepend3"><i class="fab fa-whatsapp"></i></span>
                    </div>
                    <input type="text" id="whatsapp" onkeyup="keyup('whatsapp')" name="whatsapp"
                      class="form-control text-dark" value="{{old('whatsapp')}}" placeholder="Ganti awalan 0 dengan 62">
                  </div>
                  <small>https://wa.me/<b id="whatsappUsername">{{old('whatsapp')}}</b></small>
                </div>
                <div class="col-sm-4">
                  <label for="youtube">Youtube</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: #FF0000"
                        id="inputGroupPrepend3"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input type="text" id="youtube" onkeyup="keyup('youtube')" name="youtube"
                      class="form-control text-dark" value="{{old('youtube')}}" placeholder="Username Youtube">
                  </div>
                  <small>https://youtube.com/c/<b id="youtubeUsername">{{old('youtube')}}</b></small>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger text-white" id="inputGroupPrepend3"><i
                          class="fa fa-envelope"></i> </span>
                    </div>
                    <input type="email" id="email" onkeyup="keyup('email')" name="email" class="form-control text-dark"
                      value="{{old('email')}}" placeholder="Alamat email">
                  </div>
                  <small>mailto:<b id="emailUsername">{{old('email')}}</b></small><br>
                  <label for="email" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="address">Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: rgb(95, 95, 95); height: 100%;"
                        id="inputGroupPrepend3"><i class="fa fa-info"></i> </span>
                    </div>
                    <textarea name="address" id="address" class="form-control" style="height: 100%;"></textarea>
                  </div>
                  <label for="address" generated="true" class="error" style="display: none;"></label>
                </div>
                <div class="col-sm">
                  <label for="logo">Logo</label>
                  <input type="file" class="form-control dropify" name="logo" id="logo"
                    data-allowed-file-extensions="png jpg jpeg" data-show-remove="false">
                  <small>Format <b>png,jpg,jpeg</b> (1MB max)</small><br>
                  <label for="logo" generated="true" class="error" style="display: none;"></label>
                </div>

              </div>
              <br><br>
              <div class="row">
                <div class="col-sm">
                  <label for="description">Deskripsi</label>
                  <textarea name="description" id="description" class="form-control"></textarea>
                  <label for="description" generated="true" class="error" style="display: none;"></label>
                </div>
              </div>
              <br>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-md btn-danger text-right" disabled><i
                    class="fas fa-plus-circle"></i>
                  Hapus</button>
                <button type="submit" class="btn btn-md btn-primary" id="tambahButton"><i
                    class="fas fa-plus-circle"></i> Tambahkan</button>
              </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="deleteProfileWeb">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk <b>menghapus profile web</b> ini?
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-primary" id="hapusButton">Ya, Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
  integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  $('#color-picker').spectrum({
  type: "component"
});
$('.dropify').dropify();
</script>
<script>
  $(document).ready(function() {
  $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $("#tambahWebForm").validate({
      ignore: [],
      rules: {
          logo:{
              required: true,
          },
          name:{
              required: true,
          },
          description:{
              required: true,
          },
          address:{
              required: true,
          },
          phone:{
              required: true,
          },
          email:{
              required: true,
              email: true,
          },
      },
      messages: {
          logo: {
                required: "Logo harus di isi"
          },
          name: {
                required: "Nama harus di isi"
          },
          description: {
                  required: "Deskripsi harus di isi"
          },
          address: {
                  required: "Alamat harus di isi"
          },
          phone: {
                  required: "Nomor Hp harus di isi"
          },
          email: {
                  required: "Email harus di isi",
                  email: "Masukkan alamat email yang valid",
          }
      },
      submitHandler: function(form) {
        $("#tambahButton").prop('disabled', true);
            form.submit();
      }
  });

  $("#editWebForm").validate({
      ignore: [],
      rules: {
          edit_name:{
              required: true,
          },
          edit_description:{
              required: true,
          },
          edit_address: {
              required: true,
          },
          edit_phone: {
              required: true,
          },
          edit_email: {
              required: true,
              email: true,
          }
      },
      messages: {
          edit_name: {
                required: "Nama harus di isi"
          },
          edit_description: {
                required: "Deskripsi harus di isi"
          },
          edit_address: {
                required: "Alamat harus di isi"
          },
          edit_phone: {
                required: "Nomor Hp harus di isi"
          },
          edit_email: {
                required: "Email harus di isi",
                email: "Masukkan alamat email yang valid"
          }
      },
      submitHandler: function(form) {
        $("#editButton").prop('disabled', true);
            form.submit();
      }
    });
});

$("#hapusButton").click(function() {
  $("#hapusButton").prop('disabled', true);
  $("#hapusForm").submit();
});

</script>
<script type='text/javascript'>
  function preview_image(event) 
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('imagePreview');
      var dis = document.getElementById('dis');
      output.src = reader.result;
      dis.style.display = "block";
     }
     reader.readAsDataURL(event.target.files[0]);
    }

    function keyup(socmed){
        var socmedVal = document.getElementById(socmed);
        var username = document.getElementById(socmed+'Username');
        username.innerHTML = socmedVal.value;
    }

    const form = document.getElementById('webForm');
    
</script>
<script>
  var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script>
  CKEDITOR.replace('description', options);
</script>

@endsection