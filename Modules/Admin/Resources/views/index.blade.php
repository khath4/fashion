@extends('admin::layouts.master')

@section('content')
        <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 text-uppercase">Trang Tổng Quan</h1>
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Biểu Đồ Doanh Thu Năm Nay</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                    <form action="">
                      <input type="hidden" id="day" name="day" value="{{ $moneyDay }}">
                      <input type="hidden" id="month" name="month" value="{{ $moneyMonth }}">
                      <input type="hidden" id="year" name="year" value="{{ $moneyYear }}">
                      <input type="hidden" id="day_online" name="day_online" value="{{ $moneyDay_online }}">
                      <input type="hidden" id="month_online" name="month_online" value="{{ $moneyMonth_online }}">
                      <input type="hidden" id="year_online" name="year_online" value="{{ $moneyYear_online }}">
                    </form>
                  </div>
                  <hr>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-2">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng Doanh Thu Thanh Toán Online</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{format_price($total_online)}}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow mb-2">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Doanh Thu Thanh Toán Thường</div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{format_price($total)}}</div>
                            </div>
                            
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow mb-2">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow mb-2">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow mb-4">
                </div>
            </div>
          </div>

        <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary"><a target="_blank" href="{{ route('admin.get.list.transaction') }}"><i>Đơn Hàng</i></a> <c class="badge badge-pill badge-danger">Mới nhất</c></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Tên Khách Hàng</th>        
                        <th>Tổng Tiền</th>
                        <th>Ghi Chú</th>
                        <th>Ngày</th>
                        <th>Trạng Thái</th>
                     </tr>
                  </thead>
                <tbody>
                   @if(isset($transactionNews))
                     @foreach($transactionNews as $transaction)
                       <tr>
                          <td>{{ $transaction->id }}</td>
                          <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]'  }}</td>
                          <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                          <td>{{ $transaction->tr_note }}</td>
                          <td>{{ $transaction->created_at->format('H:i d-m-Y')}}</td>
                          <td>
                            @if($transaction->tr_status == 1) 
                              <a href="#" class="badge badge-pill badge-success">Đã xữ lý</a>
                            @else
                               <a href="{{ route('admin.get.action.transaction',['status',$transaction->id]) }}" class="badge badge-pill badge-secondary">Chờ xữ lý</a>
                            @endif
                          </td>
                       </tr>
                     @endforeach
                   @endif
                  </tbody>
              </table>
            </div>
        </div>
      </div>
       <!-- Content Row -->
        <div class="card shadow mb-4">
          <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary"><a target="_blank" href="{{ route('admin.get.list.contact') }}"><i>Liên Hệ</i></a> <c class="badge badge-pill badge-danger">Mới nhất</c></h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu Đề</th>
                            <th>Họ Tên</th>
                            <th>Nội Dung</th>
                            <th>Trạng Thái</th>
                        </tr>
                      </thead>
                  <tbody>
                     @if(isset($contacts))
                       @foreach($contacts as $contact)
                         <tr>
                              <td>{{ $contact->id }}</td>
                              <td>{{ $contact->ct_title }}</td>
                              <td>{{ $contact->ct_name }}</td>
                              <td>{{ $contact->ct_content }}</td>
                              <td>
                                <a href="{{ route('admin.get.action.contact',['status',$contact->id]) }}" class="badge badge-pill {{ $contact->getStatus($contact->ct_status)['class'] }}">{{ $contact->getStatus($contact->ct_status)['name'] }}</a>
                              </td>
                              
                          </tr>
                        @endforeach
                      @endif
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

        <div class="card shadow mb-4">
    <div class="card-header py-2">
        <h6 class="m-0 font-weight-bold text-primary"><a target="_blank" href="{{ route('admin.get.list.ratings') }}"><i>Đánh Giá</i></a> <c class="badge badge-pill badge-danger">Mới nhất</c></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Tên TV</th>
                    <th>Sản Phẩm</th>                 
                    <th>Ratings</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($ratings))
                 @foreach($ratings as $rating)
                   <tr>
                      <td>{{ $rating->id }}</td>
                      <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                      <td><a href="{{ route('get.detail.product',[$rating->product->pro_slug,$rating->product->id]) }}">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a></td>
                      <td>
                        <span class="ratings">
                            @for($i=1 ;$i<= $rating->rt_number ;$i++ )
                                <i class="fa fa-star active"></i>
                            @endfor
                        </span>
                      </td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{ asset('theme_admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('theme_admin/js/demo/chart-bar-demo.js') }}"></script>
@stop