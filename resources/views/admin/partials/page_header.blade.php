  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">{{ __('custom.dashboard.dashboard') }}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      @isset($page_title_1)
                          <li class="breadcrumb-item"><a href="#">{{ $page_title_1}}</a></li>
                      @endisset
                      @isset($page_title_2)
                          <li class="breadcrumb-item active">{{$page_title_2}}</li>
                      @endisset
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
