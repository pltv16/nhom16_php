@extends('layouts.master')

@section('title','Dash Board')

@section('content')
    <div class="row">
     <div class="col-lg-6 col-md-6 order-1">
                              <div class="row">
                                
                                <div class="col-lg-6 col-md-12 col-10 mb-10">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                          <img
                                            src="../admin/assets/img/icons/unicons/chart-success.png"
                                            alt="chart success"
                                            class="rounded"
                                          />
                                        </div>
                                        <div class="dropdown">
                                          <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt3"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                          >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                          </div>
                                        </div>
                                      </div>
                                      <span class="fw-semibold d-block mb-1">Tài khoản
                                      </span>
                                      <?php
                                      $con = mysqli_connect("localhost","root","","doan_timdo");
                                      $dash_user_query = "SELECT * from users";
                                      $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                      if($user_total=mysqli_num_rows($dash_user_query_run))
                                      {
                                        echo '<h3 class="card-title mb-2"> '.$user_total.'</h3>';
                                      }
                                      else 
                                        {
                                          echo '<h3 class="card-title mb-2"> No Data</h3>';
                                        }
                                      
                                      ?>
                                      
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                          <img
                                            src="../admin/assets/img/icons/unicons/wallet-info.png"
                                            alt="Credit Card"
                                            class="rounded"
                                          />
                                        </div>
                                        <div class="dropdown">
                                          <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt6"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                          >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                          </div>
                                        </div>
                                      </div>
                                      <span>Danh mục</span>
                                      <?php
                                      $con = mysqli_connect("localhost","root","","doan_timdo");
                                      $dash_category_query = "SELECT * from categories";
                                      $dash_category_query_run = mysqli_query($con, $dash_category_query);

                                      if($category_total=mysqli_num_rows($dash_category_query_run))
                                      {
                                        echo '<h3 class="card-title mb-2"> '.$category_total.'</h3>';
                                      }
                                      else 
                                        {
                                          echo '<h3 class="card-title mb-2"> No Data</h3>';
                                        }
                                      
                                      ?>
                                    </div>
                                  </div>
                                </div>


                                {{-- <div class="col-lg-6 col-md-12 col-6 mb-4">
                                  <div class="card">
                                      <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                            <img src="../admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                          </div>
                                          <div class="dropdown">
                                            <button
                                              class="btn p-0"
                                              type="button"
                                              id="cardOpt4"
                                              data-bs-toggle="dropdown"
                                              aria-haspopup="true"
                                              aria-expanded="false"
                                            >
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                          </div>
                                        </div>
                                        <span class="d-block mb-1">Bài viết</span>
                                        <?php
                                      $con = mysqli_connect("localhost","root","","doan_timdo");
                                      $dash_post_query = "SELECT * from posts";
                                      $dash_post_query_run = mysqli_query($con, $dash_post_query);

                                      if($post_total=mysqli_num_rows($dash_post_query_run))
                                      {
                                        echo '<h3 class="card-title mb-2"> '.$post_total.'</h3>';
                                      }
                                      else 
                                        {
                                          echo '<h3 class="card-title mb-2"> No Data</h3>';
                                        }
                                      
                                      ?>
                                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                                      </div>
                                    </div>
                                </div> --}}



                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                              <img src="../admin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                            </div>
                                            <div class="dropdown">
                                              <button
                                                class="btn p-0"
                                                type="button"
                                                id="cardOpt1"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                              >
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                              </div>
                                            </div>
                                          </div>
                                          <span class="d-block mb-1">Bài viết</span>
                                        <?php
                                      $con = mysqli_connect("localhost","root","","doan_timdo");
                                      $dash_post_query = "SELECT * from posts";
                                      $dash_post_query_run = mysqli_query($con, $dash_post_query);

                                      if($post_total=mysqli_num_rows($dash_post_query_run))
                                      {
                                        echo '<h3 class="card-title mb-2"> '.$post_total.'</h3>';
                                      }
                                      else 
                                        {
                                          echo '<h3 class="card-title mb-2"> No Data</h3>';
                                        }
                                      
                                      ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection