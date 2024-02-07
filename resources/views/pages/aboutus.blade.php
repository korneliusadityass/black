@extends('layouts.app', ['page' => __('About Us'), 'pageSlug' => 'aboutus'])

@section('content')
<div class="row">
  <div class="col-md-8 ml-auto mr-auto">
    <div class="card card-upgrade">
      <div class="card-header text-center">
        <h4 class="card-title">About US</h3>
          <h4 class="card-category">Yayasan Santa Maria Lourdes Larantuka, Rumah Sakit Bunda Pengharapan</h4>
          <p class="card-category">Need help? Contact Our Social Media </p>
      </div>
      <div class="card-body">
        <div class="table-responsive table-upgrade">
          <table class="table">
            <tbody>
                <tr>
                  <td><h3 class="text-primary mb-0 mt-3">Instagram</h3></td>
                  <td class="text-center">
                        <a href="https://www.instagram.com/rsbundapengharapan" target="_blank">
                            <i class="fab fa-instagram text-info"></i>
                            rsbundapengharapan
                        </a>
                    </td>
                  </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="text-primary mb-0 mt-3">Contact</h3>
                    </td>
                    <td class="text-center">
                        <i class="fas fa-phone-alt"></i> <a href="tel:0821 9957 2930 / 0971 325906" class="text-primary">0821 9957 2930 / 0971 325906</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="text-primary mb-0 mt-3">Email</h3>
                    </td>
                    <td class="text-center">
                        <!-- <a href="Gmailto:rs.bunda.pengharapan@gmail.com" class="text-info"> -->
                        <a href="Gmailto:rs.bunda.pengharapan@gmail.com" class="text-primary">rs.bunda.pengharapan@gmail.com</a>
                            <i class="fas fa-envelope"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="text-primary mb-0 mt-3">Alamat</h3>
                    </td>
                    <td class="text-center">
                        <span>
                            Jln tujuh wali-wali RT 020 RW 004, kamundu, Distrik Merauke, Kabupaten Merauke, Papua Selatan
                        </span>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
