@extends('AdminDashboard.master')
  @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row justify-content-center">
        <div class="col-md-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Welcome <span class="fw-semibold  mb-1">{{ session('userName') }}</span>

                  </h5>
                  <p class="mb-4">
                    <span class="fw-bold"> </span> 
                    {{ session('role') == 3 ? 'Branch Manager' : 'Super Admin' }}
          
                  </p>

                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="../assets/img/illustrations/man-with-laptop-light.png"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      
          <div class="row px-0">
            <div class="col-md-4 animation mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded"
                      />
                    </div>
                    
                  </div>
                  <h3 class="card-title mb-2">Cash Deposit</h3>
                  <span class="fw-semibold d-block mb-1">Securely deposit cash</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 animation mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/wallet-info.png"
                        alt="Credit Card"
                        class="rounded"
                      />
                    </div>
                    
                  </div>
                  <div class="option-card">
                  <h3 class="card-title text-nowrap mb-2">Cash Withdrawal</h3>
                  <span class="d-block mb-1">Withdraw cash with ease.</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 animation mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />

                    </div>
                  </div>
                  <h3 class="card-title text-nowrap mb-2">Cash Billpayement</h3>
                  <span class="d-block mb-1">Pay bills swiftly and securely.</span>
                </div>
              </div>
            </div>
            
          </div>
      
      
      
      
      </div>
      <div class="row">
        <!-- Total Revenue -->
          <div class=" col-md-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-8">
                  <h5 class="card-header m-0 me-2 pb-3">Trasnsaction</h5>
                  <h5 class="card-header m-0 me-2 pb-3 gradient-text">The data will be displayed dynamically in the future.</h5>
                  <div id="totalRevenueChart" class="px-2"></div>
                </div>
                <div class="col-md-4">
                  <div class="card-body">
                    <div class="text-center">
                     
                    </div>
                  </div>
                  <div id="growthChart"></div>
                  <div class="text-center fw-semibold pt-3 mb-2">62% Transaction </div>

                  <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2022</small>
                        <h6 class="mb-0">325.5k</h6>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2021</small>
                        <h6 class="mb-0">410.2k</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--/ Total Revenue -->
      </div>
    

    </div>
  @endsection

