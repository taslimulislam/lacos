@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')
<div class="body-content">
    <div class="tile">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mb-3">
                    <div class="col-lg-6 col-xl-4 col-xxl-3 mb-3">
                        <div class="card overflow-hidden gradient-01 btn_info2">
                            <div class="card-body px-3 py-2">
                                <div class="align-items-center row">
                                    <div class="col-8 text-white">
                                        <h6 class="mb-2 fs-18">Assignment Due</h6>
                                        <p class="mb-2 fs-20 fw-bold">3</p>
                                    </div>
                                    <div class="col-4 align-items-center d-flex">
                                        <div class="counter-icon bg-info-gradient box-shadow-primary rounded-circle ms-auto"> <i class="typcn typcn-shopping-cart box_icon2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-xxl-3 mb-3">
                        <div class="card overflow-hidden gradient-02 bg_success2">
                            <div class="card-body px-3 py-2">
                                <div class="align-items-center row">
                                    <div class="col-8 text-white">
                                        <h6 class="mb-2 fs-18">Fees Due (Amount)</h6>
                                        <p class="mb-2 fs-20 fw-bold">800</p>
                                    </div>
                                    <div class="col-4 align-items-center d-flex">
                                        <div class="counter-icon bg-dark-gradient box-shadow-primary rounded-circle ms-auto"> <i class="typcn typcn-calculator box_icon2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-xxl-3 mb-3">
                        <div class="card overflow-hidden gradient-03 bg_warning2">
                            <div class="card-body px-3 py-2">
                                <div class="align-items-center row">
                                    <div class="col-8 text-white">
                                        <h6 class="mb-2 fs-18 text-black">Total Attendance</h6>
                                        <p class="mb-2 fs-20 text-black fw-bold">55</p>
                                    </div>
                                    <div class="col-4 align-items-center d-flex">
                                        <div class="counter-icon bg-success-gradient text-black box-shadow-primary rounded-circle ms-auto"> <i class="typcn typcn-chart-line-outline box_icon2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-xxl-3 mb-3">
                        <div class="card overflow-hidden gradient-04 bg_danger2">
                            <div class="card-body px-3 py-2">
                                <div class="align-items-center row">
                                    <div class="col-8 text-white">
                                        <h6 class="mb-2 fs-18">Recent Exam Marks</h6>
                                        <p class="mb-2 fs-20 fw-bold">55</p>
                                    </div>
                                    <div class="col-4 align-items-center d-flex">
                                        <div class="counter-icon bg-primary-gradient box-shadow-primary rounded-circle ms-auto"> <i class="typcn typcn-chart-line-outline box_icon2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="header-body mb-4 pt-0">
                            <div class="row align-items-end">
                                <div class="col">
                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle text-muted fs-11 fw-bold text-uppercase mb-1">
                                        Overview
                                    </h6>
                                    <!-- Title -->
                                    <h1 class="header-title fs-21 fw-bold">
                                        Performance
                                    </h1>
                                </div>
                                <div class="col-auto">
                                    <!-- Nav -->
                                    <ul class="nav nav-tabs header-tabs">
                                        <li class="nav-item">
                                            <a href="#" id="0" class="nav-link text-center active" data-bs-toggle="tab">
                                                <h6 class="header-pretitle text-muted fs-11 fw-bold text-uppercase mb-1">
                                                    Earnings
                                                </h6>
                                                <h3 class="mb-0 fs-16 fw-bold">
                                                    $19.2k
                                                </h3>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" id="1" class="nav-link text-center" data-bs-toggle="tab">
                                                <h6 class="header-pretitle text-muted fs-11 fw-bold text-uppercase mb-1">
                                                    Sessions
                                                </h6>
                                                <h3 class="mb-0 fs-16 fw-bold">
                                                    92.1k
                                                </h3>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" id="2" class="nav-link text-center" data-bs-toggle="tab">
                                                <h6 class="header-pretitle text-muted fs-11 fw-bold text-uppercase mb-1">
                                                    Bounce
                                                </h6>
                                                <h3 class="mb-0 fs-16 fw-bold">
                                                    50.2%
                                                </h3>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                        <!-- / .header-body -->
                        <div class="chart">
                            <canvas id="forecast" width="300" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Bar chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Radar Chart -->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Rader chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="radarChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Line Chart -->
                    <div class="col-lg-8 d-flex">
                        <div class="card mb-4 flex-fill w-100">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Line chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Pie chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" height="310"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Doughnut Chart -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Doughut chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="doughutChart" height="310"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Polar Chart -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Polar chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="polarChart" height="310"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Single Bar Chart -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">Single Bar Chart</h6>
                                    </div>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="singelBarChart" height="310"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <h6 class="fs-17 fw-semi-bold mb-0">Recent Sales</h6>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-end">
                                            <div class="col-md-6 col-lg-3">
                                                <select class="form-control placeholder-single py-1">
                                                    <option value="AL">Quick Filter</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <select class="form-control placeholder-single py-1">
                                                    <option value="AL">Owner</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <select class="form-control placeholder-single py-1">
                                                    <option value="AL">Client Group</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table display table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>Outlet Name</th>
                                                <th>Unit Qty</th>
                                                <th>Case Qty</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="#" class="btn btn-success-soft btn-sm me-1" data-bs-toggle="tooltip" title="Edit"><i class="ti-edit"></i></a>
                                                    <a href="#" class="btn btn-danger-soft btn-sm" data-bs-toggle="tooltip" title="Delete"><i class="ti-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <h6 class="fs-17 fw-semi-bold mb-0">Contact</h6>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-end">
                                            <div class="col-md-6 col-lg-3">
                                                <select class="form-control placeholder-single py-1">
                                                    <option value="AL">Quick Filter</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered  nowrap bootstrap4-styling">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>All</th>
                                                <th>Image</th>
                                                <th>User Name</th>
                                                <th>Email Address</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger</td>
                                                <td>Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div class="modal fade" id="exampleModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3 mx-0 row">
                            <div class="col-sm-12 pe-0">
                                <div>
                                    <input type="file" name="image" id="image" class="custom-input-file">
                                    <label for="image" class="py-5">
                                        <i class="ti-upload"></i>
                                    <span>Choose File…</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse btn-sm w-100p mb-2 me-1" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-sm w-100p mb-2 me-1">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputFirst" class="col-sm-2 col-form-label lh-1 ps-0">Company name</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputLast" class="col-sm-2 col-form-label lh-1 ps-0">Owner</label>
                            <div class="col-lg-10 pe-0">
                                <select class="form-control py-1 mySelect2">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="aboutUs" class="col-sm-2 col-form-label lh-1 ps-0">Address</label>
                            <div class="col-lg-10 pe-0">
                                <textarea class="form-control py-1" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputFirst" class="col-sm-2 col-form-label lh-1 ps-0">City</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputMail" class="col-sm-2 col-form-label lh-1 ps-0">State</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputPW" class="col-sm-2 col-form-label lh-1 ps-0">Zip</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputPW" class="col-sm-2 col-form-label lh-1 ps-0">Country</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputPW" class="col-sm-2 col-form-label lh-1 ps-0">Phone</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputPW" class="col-sm-2 col-form-label lh-1 ps-0">VAT Number</label>
                            <div class="col-lg-10 pe-0">
                                <input type="text" class="form-control py-1">
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="image" class="col-sm-2 col-form-label lh-1 ps-0">Image</label>
                            <div class="col-sm-10 pe-0">
                                <div>
                                    <input type="file" name="image" id="image" class="custom-input-file py-1">
                                    <label for="image">
                                        <i class="ti-upload"></i>
                                    <span>Choose File…</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-0 row">
                            <label for="inputLast" class="col-sm-2 col-form-label lh-1 ps-0">Currency</label>
                            <div class="col-lg-10 pe-0">
                                <select class="form-control py-1 mySelect2">
                                    <option value="AL">USD</option>
                                    <option value="AR">BDT</option>
                                    <option value="IL">EURO</option>
                                </select>
                            </div>
                        </div>
                        <div class="align-items-center form-group mb-3 mx-0 row">
                            <label for="image" class="col-sm-2 col-form-label lh-1 ps-0">Disable online payment</label>
                            <div class="col-sm-10 pe-0">
                                <div class="d-flex">
                                    <div class="i-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse btn-sm w-100p mb-2 me-1" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-sm w-100p mb-2 me-1">Save & continue</button>
                            <button type="button" class="btn btn-success btn-sm w-100p mb-2 me-1">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
