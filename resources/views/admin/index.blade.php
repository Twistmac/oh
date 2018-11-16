@extends ('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{{ count($residences) }}</h3>

                                    <p>Residential homes</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-home"></i>
                                </div>
                                <a href="{{ route('admin.gestion-residences') }}" class="small-box-footer">See <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ count($residents) }}</h3>

                                    <p>Resident Accounts</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="{{ route('admin.gestion-residents') }}" class="small-box-footer">See <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-purple-gradient">
                                <div class="inner">
                                    <h3>{{ count($partenaires) }}</h3>

                                    <p>Partner Accounts</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('admin.gestion-partenaires') }}" class="small-box-footer">See <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3> 0 </h3>

                                    <p>MotorBikes</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-flash"></i>
                                </div>
                                <a href="" class="small-box-footer">See <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{{ $annonces }}</h3>

                                    <p>Ads</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calendar"></i>
                                </div>
                                <a href="{{ route('admin.gestion-annonces') }}" class="small-box-footer">See <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection