@extends('master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h6 class="m-t-0">Contacts</h6>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr>
                        <th style="min-width: 95px;">
                            <div class="checkbox checkbox-primary checkbox-single m-r-15">
                                <input id="action-checkbox" type="checkbox">
                                <label for="action-checkbox"></label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Products</th>
                        <th>Start Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox2" type="checkbox">
                                <label for="checkbox2"></label>
                            </div>

                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Tomaslau
                        </td>

                        <td>
                            <a href="#" class="text-muted">tomaslau@dummy.com</a>
                        </td>

                        <td>
                            <b><a href="" class="text-dark"><b>356</b></a> </b>
                        </td>

                        <td>
                            01/11/2003
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1"></label>
                            </div>

                            <img src="assets/images/users/avatar-1.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Chadengle
                        </td>

                        <td>
                            <a href="#" class="text-muted">chadengle@dummy.com</a>
                        </td>

                        <td>
                            <b><a href="" class="text-dark"><b>568</b></a> </b>
                        </td>

                        <td>
                            01/11/2003
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox3" type="checkbox">
                                <label for="checkbox3"></label>
                            </div>

                            <img src="assets/images/users/avatar-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Stillnotdavid
                        </td>

                        <td>
                            <a href="#" class="text-muted">stillnotdavid@dummy.com</a>
                        </td>
                        <td>
                            <b><a href="" class="text-dark"><b>201</b></a> </b>
                        </td>

                        <td>
                            12/11/2003
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4"></label>
                            </div>

                            <img src="assets/images/users/avatar-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Kurafire
                        </td>

                        <td>
                            <a href="#" class="text-muted">kurafire@dummy.com</a>
                        </td>

                        <td>
                            <b><a href="" class="text-dark"><b>56</b></a> </b>
                        </td>

                        <td>
                            14/11/2003
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox5" type="checkbox">
                                <label for="checkbox5"></label>
                            </div>

                            <img src="assets/images/users/avatar-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Shahedk
                        </td>

                        <td>
                            <a href="#" class="text-muted">shahedk@dummy.com</a>
                        </td>

                        <td>
                            <b><a href="" class="text-dark"><b>356</b></a> </b>
                        </td>

                        <td>
                            20/11/2003
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15">
                                <input id="checkbox6" type="checkbox">
                                <label for="checkbox6"></label>
                            </div>

                            <img src="assets/images/users/avatar-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            Adhamdannaway
                        </td>

                        <td>
                            <a href="#" class="text-muted">adhamdannaway@dummy.com</a>
                        </td>

                        <td>
                            <b><a href="" class="text-dark"><b>956</b></a> </b>
                        </td>

                        <td>
                            24/11/2003
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection